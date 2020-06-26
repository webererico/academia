<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    protected $table = 'profissional';
    public $timestamps = false;
    protected $primaryKey = 'idProfissional';
    protected $guarded = [];  
  
}
