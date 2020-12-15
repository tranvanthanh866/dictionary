<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronunciation extends Model
{
    use HasFactory;

    protected $table = 'pronunciation';
    protected $guarded = ['id'];
}
