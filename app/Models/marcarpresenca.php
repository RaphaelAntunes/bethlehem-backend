<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marcarpresenca extends Model
{
    protected $table = 'marcar_presenca';
    protected $fillable = [
        'evento_nome','id_user','marcado'// Add 'titulo' to the fillable array
        // Add other attributes here if needed
    ];
    
    public $timestamps = false; // Desabilita as colunas de data e hora


    
}
