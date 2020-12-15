<?php

namespace App\Http\Controllers\Dictionary;

use App\Http\Controllers\Controller;
use App\Http\Crawler\CambridgeCrawl;
use App\Models\Word;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function home(Request $request) {
        $q = $request->get('q');
        $response = [];
        if(!empty($q)) {
            $response['word'] = Word::where('name', $q)->first();
        }

        return view('welcome', ['word' => $response]);
    }

}
