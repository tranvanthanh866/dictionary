<?php

namespace App\Http\Controllers\Dictionary;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\ImportDictionary;

class ImportController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('dictionary.file-import');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {
        set_time_limit(0);
        Excel::import(new ImportDictionary, $request->file('file'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport()
    {
        //return Excel::download(new UsersExport, 'users-collection.xlsx');
    }
}
