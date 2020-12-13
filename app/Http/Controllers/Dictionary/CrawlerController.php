<?php
/**
 * Created by PhpStorm.
 * User: Kai-Tran
 * Date: 12/13/2020
 * Time: 9:57 AM
 */

namespace App\Http\Controllers\Dictionary;


use App\Http\Crawler\CambridgeCrawl;

class CrawlerController extends CambridgeCrawl
{
    public function __construct($word = "endurance")
    {
        parent::__construct($word);
    }

    public function crawler() {
        $this->crawlData();
    }

}