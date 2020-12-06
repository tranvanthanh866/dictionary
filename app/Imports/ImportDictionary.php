<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use App\Models\SentenceExample;
use App\Models\Describe;
use App\Models\Type;
use App\Models\Word;

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

            $word = Word::firstOrCreate([
                'language_id' => $language_id,
                'name' => $row[0],
            ]);

            $describe = Describe::create([
                'word_id' => $word->id,
                'type_id' => $type->id,
                'content' => $row[2],
            ]);

            // $sentenceExample = SentenceExample::create([
            //     'describe_id' => $describe->id,
            //     'content' => $row[4],
            // ]);
        }
    }
}
