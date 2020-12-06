<?php

namespace App\Imports;

use App\Models\SentenceExample;
use Maatwebsite\Excel\Concerns\ToModel;

class DescribeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SentenceExample([
            //
        ]);
    }
}
