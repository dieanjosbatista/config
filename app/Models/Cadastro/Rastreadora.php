<?php

namespace App\Models\Cadastro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rastreadora extends Model
{
    use HasFactory;
    protected $table='rastreadora';
    protected $guarded=['id','created_at', 'updated_at'];
}
