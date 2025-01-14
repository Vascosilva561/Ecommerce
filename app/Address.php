<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $id = 'id';

    protected $fillable = [
        'name',
        'email',
        'endereco',
        'ponto_referencia',
        'telefone',
        'pais',
        'municipio',
        'provincia',
        'identificacao',
        'user_id',
    ];
}
