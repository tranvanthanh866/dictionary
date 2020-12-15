<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SentenceExample;
use App\Models\Describe;
use App\Models\Type;
use App\Models\Word;
use App\Http\Crawler\WordCraw;
use App\Http\Crawler\CambridgeCrawl;
use App\Models\Pronunciation;
use Illuminate\Support\Str;

class ClearEverything extends Command
{

    protected $signature = 'app:crawler';

    protected $description = 'crawler';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
    }
}
