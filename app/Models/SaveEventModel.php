<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveEventModel extends Model
{
    protected $table = 'eventos';
    public $timestamps = false; // Desabilita as colunas de data e hora
    protected $fillable = [
        'id','titulo','descricao','horario','usr_responsavel','tipo_evento','mediador','local' // Add 'titulo' to the fillable array
        // Add other attributes here if needed
    ];
}
