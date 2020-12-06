<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Synonym extends Model
{
    use HasFactory;

    protected $table = 'synonym';
    protected $guarded = ['id'];
}
