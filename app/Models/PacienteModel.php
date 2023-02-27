<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PacienteModel extends Model
{
    use HasFactory;

    protected $fillable = ['foto', 'nome', 'nomemae', 'nascimento', 'cpf', 'cns'];
    
    protected $table = "pacientes";

}
