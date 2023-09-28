<?php

namespace App\Http\Controllers;
use App\Models\SaveEventModel; // Certifique-se de importar o modelo de evento

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return view('new-evento');
    }
    public function membro()
    {
        return view('new-membro');
    }

    public function salvarEvento(Request $request)
    {
        // Valide os dados do formulário conforme necessário
        $request->validate([
            'titulo' => 'required|string',
            'tipo_evento' => 'required|string',
            'mediador' => 'string', // Você pode ajustar as regras de validação conforme necessário
            'descricao' => 'required|string',
            'horario' => 'required|date',
            'local' => 'required|string'
        ]);

        // Crie uma nova instância do modelo de evento e preencha-a com os dados do formulário
        $evento = new SaveEventModel([
            'titulo' => $request->input('titulo'),
            'tipo_evento' => $request->input('tipo_evento'),
            'mediador' => $request->input('mediador'),
            'descricao' => $request->input('descricao'),
            'horario' => $request->input('horario'),
            'usr_responsavel' => auth()->user()->email,
            'local' => $request->input('local')
        ]);

        // Salve o evento no banco de dados
        $evento->save();

        // Redirecione para a página desejada após a conclusão da operação
        return redirect()->route('eventos');
    }


}
