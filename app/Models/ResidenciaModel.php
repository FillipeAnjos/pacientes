<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenciaModel extends Model
{
    use HasFactory;

    protected $fillable = ['cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'paciente_id'];
    
    protected $table = "residencia";
}
