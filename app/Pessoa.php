<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoa';
    public $timestamps = false;
    protected $primaryKey = 'idPessoa';
    protected $guarded = [];  
    public function getAuthPassword()
    {
     return $this->employee_password;
    }

}
