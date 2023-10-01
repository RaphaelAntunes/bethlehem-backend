<?php

namespace App\Http\Controllers;
use App\Models\SaveEventModel; // Certifique-se de importar o modelo de evento
use App\Models\getMediadores;
use App\Models\marcarpresenca;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        return view('new-evento');
    }
   
    public function getMediadores()
{
    $mediadores = getMediadores::all(); // Substitua "Mediador" pelo nome do seu modelo

    return response()->json($mediadores);
}

public function marcarPresenca(Request $request)
{
    // Valide os dados do formulário, se necessário

    // Obtenha os dados do formulário
    
    // Atualize o banco de dados para marcar presença
    marcarpresenca::create([
        'evento_nome' => $request->input('evento_id'),
        'id_user' => $request->input('user_id'),
        'marcado' => 1,
    ]);

    // Redirecione ou retorne uma resposta adequada, por exemplo:
    return redirect()->back()->with('success', 'Presença marcada com sucesso!');

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

    public function removerPresenca(Request $request)
    {   
        $userId = $request->input('user_id');
         
        $eventoId = $request->input('evento_id');

        $evento = marcarpresenca::where('id_user', $userId)
        ->where('evento_nome', $eventoId)
        ->first();

        if ($evento) {
            $evento->delete(); // Isso removerá o registro do evento
            // Redirecione para a página desejada após a remoção
            return redirect()->route('eventos')->with('success', 'Evento removido com sucesso!');
        } else {
            // O evento não foi encontrado, você pode tratar isso de acordo
            // Redirecione para a página desejada com uma mensagem de erro
            return redirect()->route('eventos')->with('error', 'Evento não encontrado.');
        }

        // Redirecione para a página desejada após a conclusão da operação
    }

    public function removerEvento($evento_id)
    {
        // Encontre o evento com base no ID
        $evento = SaveEventModel::find($evento_id);
    
        if ($evento) {
            $evento->delete(); // Isso removerá o registro do evento
            // Redirecione para a página desejada após a remoção
            return redirect()->route('eventos')->with('success', 'Evento removido com sucesso!');
        } else {
            // O evento não foi encontrado, você pode tratar isso de acordo
            // Redirecione para a página desejada com uma mensagem de erro
            return redirect()->route('eventos')->with('error', 'Evento não encontrado.');
        }
    }
    
    




}
