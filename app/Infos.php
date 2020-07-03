<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infos extends Model
{
    protected $table = 'quittances';
    protected $fillable = ['info', 'active'];
}
