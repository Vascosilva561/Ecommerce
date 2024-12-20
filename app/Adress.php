<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
	protected $table='adresses';
    protected $id='id';

    protected $fillable = [
        'name', 'email', 'endereco', 'ponto_referencia', 'telefone',
        'pais', 'municipio', 'provincia','identificacao','user_id',
    ];


}
