<?php

namespace App\Repositories\Interfaces;


interface CrawlerInterface
{
    public function crawlData();
    public function crawlWord();
    public function crawlAudio();
    public function copyAudio($source, $index);
    public function crawlPronunciation();
}