<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelController extends Model
{
    protected $table = 'base_api';
    protected $fillable = [
        'email',// Add 'titulo' to the fillable array
        // Add other attributes here if needed
    ];
    
    public $timestamps = false; // Desabilita as colunas de data e hora
}
