<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SentenceExample extends Model
{
    use HasFactory;

    protected $table = 'centence_example';
    protected $guarded = ['id'];
}
