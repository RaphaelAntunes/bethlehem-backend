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


    public function presencas()
    {
        return $this->hasMany(marcarpresenca::class, 'id_user'); // Certifique-se de ajustar o nome do campo se for diferente
    }

    // Método para verificar se um usuário está participando do evento
    public function estaParticipando($evento)
    {
        $userId = auth()->user()->id;

        $estaParticipando = \App\Models\marcarpresenca::where('id_user', $userId)
            ->where('evento_nome', $evento)
            ->exists();

         
            return $estaParticipando;

    }

    public function numparticipantes($evento)
    {
      
         
            $registros = marcarpresenca::where('evento_nome', $evento)->count();
            return $registros;

    }
  
}
