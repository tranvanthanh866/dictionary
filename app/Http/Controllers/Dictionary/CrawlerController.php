<?php
/**
 * Created by PhpStorm.
 * User: Kai-Tran
 * Date: 12/13/2020
 * Time: 9:57 AM
 */

namespace App\Http\Controllers\Dictionary;


use App\Http\Controllers\Controller;
use App\Http\Crawler\CambridgeCrawl;

class CrawlerController extends Controller
{
    public function __construct()
    {
    }

    public function crawler($word = "endurance") {
        $crawlCambridge = new CambridgeCrawl($word);
        $crawlCambridge->crawlData();
    }

}