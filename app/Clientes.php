<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    public $table = "clientes";
    protected $fillable = ['id','nome','sobrenome',
    'dt_nasc','sexo','email','cpf','celular','cep',
    'endereco','cmpto','numero','bairro','cidade','estado'];

}
