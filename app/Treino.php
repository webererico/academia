<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    protected $table = 'treino';
    public $timestamps = false;
    protected $primaryKey = 'idTreino';
    protected $guarded = [];  
  
}
