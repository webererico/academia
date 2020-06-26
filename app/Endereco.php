<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'endereco';
    public $timestamps = false;
    protected $primaryKey = 'idEndereco';
    protected $guarded = [];  

}
