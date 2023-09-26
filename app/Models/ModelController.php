<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelController extends Model
{
    protected $table = 'base_api';
    public $timestamps = false; // Desabilita as colunas de data e hora
}
