<?php

namespace App\Repositories\Interfaces;


interface CrawlerInterface
{
    public function crawlData();
    public function crawlWord();
    public function crawlAudio();
    public function crawlPronunciation();
    public function crawlDescribe();
    public function crawlExample();
}