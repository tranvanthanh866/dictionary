<?php

namespace App\Imports;

use App\Models\Describe;
use Maatwebsite\Excel\Concerns\ToModel;

class SentenceExampleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Describe([
            //
        ]);
    }
}
