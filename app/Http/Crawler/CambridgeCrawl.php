<?php
/**
 * Created by PhpStorm.
 * User: Kai-Tran
 * Date: 12/13/2020
 * Time: 9:38 AM
 */

namespace App\Http\Crawler;

use App\Repositories\Interfaces\CrawlerInterface;
use Goutte\Client;
use File;

class CambridgeCrawl implements CrawlerInterface
{
    private $home = "https://dictionary.cambridge.org";

    private $urlGet = "https://dictionary.cambridge.org/dictionary/english/";

    private $word;

    private $generalNote;

    private $node;

    public $dataCrawl = [];

    private $block;

    public function __construct($word)
    {
        $this->word = $word;
        $this->urlGet .= $this->word;
        $this->crawlData();
    }

    public function crawlData()
    {
        $client = new Client();
        $this->generalNote = $client->request('GET', $this->urlGet)->filter('.page > div .entry-body__el');
        $this->crawlWord();
    }

    public function crawlWord()
    {
        if (count($this->generalNote) == 0) return;
        $this->generalNote->each(function ($node, $index) {
            $word = $node->filter('.di-title > span > span')->text();

            if ($word == $this->word) {
                $this->node = $node;
                $this->block = $index;

                $this->dataCrawl[$this->block] = [];
                $this->dataCrawl[$this->block]['audio'] = [];
                $this->dataCrawl[$this->block]['ipa'] = [];
                $this->dataCrawl[$this->block]['example'] = [];
                $this->dataCrawl[$this->block]['describe'] = '';
                $this->dataCrawl[$this->block]['typeWord'] = '';

                $this->crawlAudio();
            }



        });


    }


    public function crawlAudio()
    {
        $this->node->filter('.us source')->each(function ($source, $index) {
            $this->copyAudio($source, $index, 'us');
        });
        $this->node->filter('.uk source')->each(function ($source, $index) {
            $this->copyAudio($source, $index, 'uk');
        });
        $this->crawlPronunciation();
        $this->crawlDescribe();
        $this->crawlExample();
        $this->crawlType();
    }

    public function crawlType() {
        $typeWord = $this->node->filter('.dpos')->text();
        $this->dataCrawl[$this->block]['typeWord'] = $typeWord;
    }

    public function copyAudio($source, $index, $type)
    {
        $linkAudio = $source->attr('src');
        if (!empty($linkAudio)) {
            //$audios = str_replace('/', '\\', $linkAudio);
            $tmp = explode('/', $linkAudio);
            $fileName = end($tmp);
            $folder = str_replace($fileName, '', $linkAudio);

            $tempAudio = storage_path('app/temp/' . time());
            if (!File::exists(storage_path('app/temp/'))) {
                File::makeDirectory(storage_path('app/temp/'), $mode = 0755, true, true);
            }
            copy($this->home . $source->attr('src'), $tempAudio);

            if (!File::exists(storage_path('app/public' . $folder))) {
                File::makeDirectory(storage_path('app/public' . $folder), $mode = 0755, true, true);
            }
            File::copy($tempAudio, storage_path('app/public' . $linkAudio));
            unlink($tempAudio);
            $this->dataCrawl[$this->block]['audio'][$type][$index] = $linkAudio;
        }
    }

    public function crawlPronunciation()
    {
        $spanIpaUk = $this->node->filter('.uk .ipa');
        $ipa = [];
        if(count($spanIpaUk) > 0) $ipa['uk'] = $spanIpaUk->html();
        $spanIpaUs = $this->node->filter('.us .ipa');
        if(count($spanIpaUs) > 0) $ipa['us'] = $spanIpaUs->html();
        if (count($spanIpaUs) > 0 || count($spanIpaUk) > 0)  $this->dataCrawl[$this->block]['ipa'] = $ipa;
    }

    public function crawlDescribe() {
        $describeDiv = $this->node->filter('.ddef_d');
        if (count($describeDiv) > 0) $this->dataCrawl[$this->block]['describe'] = $describeDiv->text();
    }

    public function crawlExample() {
        $this->node->filter('.examp .deg')->each(function ($spam, $index) {
            $this->dataCrawl[$this->block]['example'][$index] = $spam->text();
        });
    }
}
