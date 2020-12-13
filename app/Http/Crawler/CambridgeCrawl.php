<?php
/**
 * Created by PhpStorm.
 * User: Kai-Tran
 * Date: 12/13/2020
 * Time: 9:38 AM
 */

namespace App\Http\Crawler;

use App\Repositories\Interfaces\CrawlerInterface;
use Illuminate\Support\Facades\Storage;
use Goutte\Client;
use File;
use function Livewire\str;

class CambridgeCrawl implements CrawlerInterface
{
    private $home = "https://dictionary.cambridge.org";

    private $urlGet = "https://dictionary.cambridge.org/dictionary/english/";

    private $word;

    private $generalNote;

    private $node;

    private $dataCrawl = [];

    public function __construct($word)
    {
        $this->word = $word;
        $this->urlGet .= $this->word;
    }

    public function crawlData() {
        $client = new Client();
        $this->generalNote = $client->request('GET', $this->urlGet)->filter('.page > div .entry-body__el');
        $this->crawlWord();
    }

    public function crawlWord() {
        if (count($this->generalNote) == 0) return;
        $this->generalNote->each(function ($node) {
            $word = $node->filter('.di-title > span > span')->text();
            if ($word == $this->word){
                $this->node = $node;
                $this->crawlAudio();
            }
        });

    }

    public function crawlAudio() {
        $audios = [];
        $this->node->filter('.us source')->each(function($source, $index) use(&$audios){
            $this->copyAudio($source, $index);
        });
        $this->node->filter('.uk source')->each(function($source, $index) use(&$audios){
            $this->copyAudio($source, $index);
        });
        $this->dataCrawl['audios'][] = $audios;
    }

    public function copyAudio($source, $index) {
        $linkAudio = $source->attr('src');
        $audios['us'][$index] = str_replace('/', '\\', $linkAudio);
        $tmp = explode('\\', $audios['us'][$index]);
        $fileName = end($tmp);
        $folder = str_replace($fileName, '', $audios['us'][$index]);

        $tempAudio = storage_path('app/temp/'. time());
        copy($this->home. $source->attr('src'), $tempAudio);
        if (! File::exists(storage_path('app\public'.$folder)) ) {
            File::makeDirectory(storage_path('app\public'.$folder), $mode = 0777, true, true);
        }
        File::copy($tempAudio, storage_path('app\public'.$audios['us'][$index]));
        unlink($tempAudio);
    }

    public function crawlPronunciation() {

    }
}