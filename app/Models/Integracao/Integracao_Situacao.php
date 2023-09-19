<?php

namespace App\Models\Integracao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integracao_Situacao extends Model
{
    use HasFactory;

    protected $table = 'integracao_situacao';
    public function cartao(){
        return $this->hasMany(Integracao::class, 'id_situacao_integracao');
    }

}
