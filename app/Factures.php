<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factures extends Model
{
    protected $table = 'factures';
    protected $fillable = ['info', 'number_facture', 'description', 'regisseur'];
}
