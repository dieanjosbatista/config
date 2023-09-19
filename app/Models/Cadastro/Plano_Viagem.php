<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano_Viagem extends Model
{
    use HasFactory;
    protected $table='plano_viagem';
    protected $guarded=['id','created_at', 'updated_at'];
}
