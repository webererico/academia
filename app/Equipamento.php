<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $table = 'equipamento';
    public $timestamps = false;
    protected $primaryKey = 'idEquipamento';
    protected $guarded = [];  
  
}
