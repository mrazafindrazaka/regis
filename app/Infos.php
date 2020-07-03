<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infos extends Model
{
    protected $table = 'json';
    protected $fillable = ['info', 'active'];
}
