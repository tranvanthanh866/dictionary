<?php
/**
 * Created by PhpStorm.
 * User: Kai-Tran
 * Date: 12/12/2020
 * Time: 4:52 PM
 */

namespace App\Http\Crawler;


class WordCraw
{
    public $cambridgeCrawl;

    public function __construct(CambridgeCrawl $cambridgeCrawl)
    {
        $this->cambridgeCrawl = $cambridgeCrawl;
    }
}
