<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelController;
use App\Models\listagrupo;
use App\Models\emails_lista_grupo;


class OptionEmailSender extends Controller
{
    public function getemails(Request $request)
    {
        $search = $request->input('search');

        $users = ModelController::select('nome_completo', 'email', 'imagem')
            ->where(function ($query) use ($search) {
                $query->where('nome_completo', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->limit(4)
            ->get();

        return $users;
    }


    public function getemailsall()
    {

        $users = ModelController::select('nome_completo', 'email', 'imagem')->get();

        return $users;
    }




    public function criarlista(Request $request)
    {
        // Obtém os emails da requisição AJAX
        $nomelista = $request->input('nomelista');

        $grupoExistente = listagrupo::where('name', $nomelista)->first();

        if (!$grupoExistente) {
            // Cria um novo grupo
            $novoGrupo = listagrupo::create(['name' => $nomelista]);

            return response()->json(['success' => true, 'message' => 'Grupo adicionado com sucesso']);
        } else {
            return response()->json(['success' => false, 'message' => 'O grupo já existe']);
        }
    }


    public function addalista(Request $request)
    {
        // Obtém os emails da requisição AJAX
        $nomelista = $request->input('nomelista');
        $emails = $request->input('emails');

        // Obtém o ID do grupo
        $get_id_group = listagrupo::where('name', $nomelista)->first();

        foreach ($emails as $email) {
            // Verifica se o email já existe na lista e no grupo
            if ($email) {
                $existe = emails_lista_grupo::where('email', $email)
                    ->where('group_id', $get_id_group->id)
                    ->first();

                if (!$existe) {
                    // Se o email não existe, insere na lista e associa ao grupo
                    $inser_in_group = emails_lista_grupo::create(['email' => $email, 'group_id' => $get_id_group->id]);

                }
            }
        }
        
        return response()->json(['success' => true, 'message' => 'Contatos adicionados a lista']);

    }


    public function coletarLista(Request $request)
    {
        // Obtém os emails da requisição AJAX
        $nomelista = $request->input('nomelista');

        // Obtém o ID do grupo
        $get_id = listagrupo::where('name', $nomelista)->first();
        $get_id = $get_id->id;
        $get_lista_emails = emails_lista_grupo::where('group_id', $get_id)->get();

       
        return $get_lista_emails;

    }


    public function verlista()
    {
        $listas2 = listagrupo::all();

        $grupos = [];
        $emails_count = [];

        foreach ($listas2 as $lista) {
            $grupos[] = [
                'nome' => $lista->name,
                'id' => $lista->id,
            ];
        }

        foreach ($grupos as $grupo) {
            $count = emails_lista_grupo::where('group_id', $grupo['id'])->count();

            $emails_count[] = [
                'nome' => $grupo['nome'],
                'quantidade' => $count,
            ];
        }

        return response()->json($emails_count);
    }

    public function removerLista(Request $request)
    {
        $nomelista = $request->input('nomelista');

        // Encontrar o grupo pelo nome
        $grupo = listagrupo::where('name', $nomelista)->first();

        if ($grupo) {
            // Encontrar e remover todos os emails relacionados a esse grupo
            emails_lista_grupo::where('group_id', $grupo->id)->delete();

            // Remover o grupo
            $grupo->delete();

            return response()->json(['message' => 'Removido', 'status' => true]);
        } else {
            return response()->json(['message' => 'Lista não encontrada'], 404);
        }
    }
}
