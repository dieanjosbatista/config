<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha_Tecnica extends Model
{
    use HasFactory;
    protected $table='ficha_tecnica';
    protected $guarded=['id','created_at', 'updated_at'];
}
