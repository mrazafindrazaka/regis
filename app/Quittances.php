<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quittances extends Model
{
    protected $table = 'quittances';
    protected $fillable = ['info', 'active'];
}
