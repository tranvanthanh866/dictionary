<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert([
            ['name' => 'noun'],
            ['name' => 'pronoun'],
            ['name' => 'verb'],
            ['name' => 'adjective'],
            ['name' => 'adverb'],
            ['name' => 'preposition'],
            ['name' => 'conjunction'],
            ['name' => 'interjection'],
        ]);
    }
}
