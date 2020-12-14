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
            $type = Type::where('name', $row['1'])->first();

            $wordImport = Str::lower($row[0]);

            $word = Word::firstOrCreate([
                'language_id' => $language_id,
                'name' => $wordImport,
            ]);

            $describe = Describe::firstOrCreate([
                'word_id' => $word->id,
                'type_id' => $type->id,
                'content' => $row[2],
            ]);

            $wordSearch = str_replace(' ', '-', $wordImport);
            $wordCrawl = new WordCraw(new CambridgeCrawl($wordSearch));
            $dataCrawl = $wordCrawl->cambridgeCrawl->dataCrawl;
            dd($dataCrawl);

            // $sentenceExample = SentenceExample::create([
            //     'describe_id' => $describe->id,
            //     'content' => $row[4],
            // ]);
        }
    }
}
