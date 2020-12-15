<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\Models\SentenceExample;
use App\Models\Describe;
use App\Models\Type;
use App\Models\Word;
use App\Http\Crawler\WordCraw;
use App\Http\Crawler\CambridgeCrawl;
use App\Models\Pronunciation;
use Illuminate\Support\Str;

class ImportDictionary implements ToCollection
{
    /**
    * @param array $row
    *
    */
    public function collection(Collection $rows)
    {
        $language_id = 1;
        foreach ($rows as $row)
        {
            $wordImport = Str::lower($row[0]);

            $word = Word::firstOrCreate([
                'language_id' => $language_id,
                'name' => $wordImport,
            ]);

            $wordSearch = str_replace(' ', '-', $wordImport);
            $wordCrawl = new WordCraw(new CambridgeCrawl($wordSearch));
            $dataCrawl = $wordCrawl->cambridgeCrawl->dataCrawl;
            foreach($dataCrawl as $item) {
                if(empty($item['typeWord'])) continue;
                $type = Type::where('name', $item['typeWord'])->first();

                $describeInsert = [
                    'word_id' => $word->id,
                    'type_id' => $type->id,
                    'content' => $item['describe'],
                ];
                if(empty($item['describe'])) continue;
                $describe = Describe::firstOrCreate($describeInsert);

                $pronunciation = Pronunciation::firstOrCreate([
                    'describe_id' => $describe->id,
                    'uk_ipa' => !empty($item['ipa']['us'])? $item['ipa']['us']: null,
                    'us_ipa' => !empty($item['ipa']['uk'])? $item['ipa']['uk']: null,
                    'mp3_uk' => !empty($item['audio']['uk'])? $this->audioChecking($item['audio']['uk'], 'uk', 'mp3'):null,
                    'ogg_uk' => !empty($item['audio']['uk'])? $this->audioChecking($item['audio']['uk'], 'uk', 'ogg'):null,
                    'mp3_us' => !empty($item['audio']['us'])? $this->audioChecking($item['audio']['us'], 'us', 'mp3'):null,
                    'ogg_us' => !empty($item['audio']['us'])? $this->audioChecking($item['audio']['us'], 'us', 'ogg'):null,
                ]);

                if(empty($item['example'])) continue;

                foreach($item['example'] as $sentence) {
                    $sentenceExample = SentenceExample::firstOrCreate([
                        'describe_id' => $describe->id,
                        'content' => $sentence,
                    ]);
                }
            }
        }


    }

    function audioChecking($indexLinks, $type){
        foreach($indexLinks as $link ) {
            $tmp = explode('/', $link);
            $fileName = end($tmp);
            if (strpos($fileName, $type) !== false) {
                return $link;
                break;
            }
        }
    }
}
