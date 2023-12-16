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

 /**
 * @OA\get(
 *     path="/api/getemailsall",
 *     summary="Recupera Perfil cadastrados",
 *     tags={"Email List"},
 *     description="Lista emails",
 *     operationId="listaemails",
 *     security={{"bearerAuth": {}}},
 *       @OA\Response(
 *         response=200,
 *         description="Lista de Grupos",
 *         @OA\JsonContent(
 *             @OA\Property(property="nome_completo", type="string", example="Personal Name"),
 *  *            @OA\Property(property="email", type="string", example="user@email.com"),
 *  *            @OA\Property(property="imagem", type="string", example="123123137v@#!52133.png"),

 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *     ),
 * )

 */
    public function getemailsall()
    {

        $users = ModelController::select('nome_completo', 'email', 'imagem')->get();

        return $users;
    }


    
  /**
 * @OA\Post(
 *     path="/api/criar-lista",
 *     summary="Cria Listas de Grupos de emails",
 *     tags={"Group List"},
 *     description="Cria Listas de Grupos de emails",
 *     operationId="criarlista",
 *     security={{"bearerAuth": {}}},
 *   requestBody={
     *         "required": true,
     *         "description": "Nome da lista de grupo a ser criada",
     *         "content": {
     *             "application/json": {
     *                 "example": {"nomelista": "NomeLista"}
     *             }
     *         }
     *     },
 *       @OA\Response(
 *         response=200,
 *         description="Lista de Grupos",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="bool", example="true"),
 *  *            @OA\Property(property="message", type="string", example="Grupo adicionado com sucesso"),

 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *     ),
 * )

 */



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

    /**
 * @OA\Post(
 *     path="/api/add-a-lista",
 *     summary="Adiciona e-mails a uma Listas de Grupos de emails",
 *     tags={"Group List"},
 *     description="Adiciona Emails a Listas de Grupos de emails",
 *     operationId="adiciona email",
 *     security={{"bearerAuth": {}}},
 *   requestBody={
     *         "required": true,
     *         "description": "",
     *         "content": {
     *             "application/json": {
     *           
     *                 "example": {"nomelista": "NomeLista", "emails": "user@email.com"},

     *             }
     *         }
     *     },
 *       @OA\Response(
 *         response=200,
 *         description="Lista de Grupos",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example="10"),
 *  *            @OA\Property(property="email", type="string", example="user@email.com"),
 *  *             @OA\Property(property="group_id", type="integer", example="2"),
 *  *            @OA\Property(property="created_at", type="date", example="2023-12-16T18:58:26.000000Z"),
 *  *            @OA\Property(property="updated_at", type="date", example="2023-12-16T18:58:26.000000Z"),

 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *     ),
 * )

 */
    public function addalista(Request $request)
    {
        // Obtém os emails da requisição AJAX
        $nomelista = $request->input('nomelista');
        $emails = $request->input('emails');

        // Verifica se $emails é um array, se não for, converte para array
    if (!is_array($emails)) {
        $emails = [$emails];
    }

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

    /**
 * @OA\Post(
 *     path="/api/coletarlista",
 *     summary="Coleta os e-mails contidosem uma Listas de Grupos de emails",
 *     tags={"Group List"},
 *     description="Coleta Emails de Listas de Grupos de emails",
 *     operationId="Coleta Lista",
 *     security={{"bearerAuth": {}}},
 *   requestBody={
     *         "required": true,
     *         "description": "Nome da lista de grupo a ser Coletada",
     *         "content": {
     *             "application/json": {
     *                 "example": {"nomelista": "NomeLista"}
     *             }
     *         }
     *     },
 *       @OA\Response(
 *         response=200,
 *         description="Lista de Grupos",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example="10"),
 *  *            @OA\Property(property="email", type="string", example="user@email.com"),
 *  *             @OA\Property(property="group_id", type="integer", example="2"),
 *  *            @OA\Property(property="created_at", type="date", example="2023-12-16T18:58:26.000000Z"),
 *  *            @OA\Property(property="updated_at", type="date", example="2023-12-16T18:58:26.000000Z"),

 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *     ),
 * )

 */

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

  /**
 * @OA\get(
 *     path="/api/ver-lista",
 *     summary="Obtem Listas de Grupos de emails",
 *     tags={"Group List"},
 *     description="Obtem Listas de Grupos de emails",
 *     operationId="verlista",
 *     security={{"bearerAuth": {}}},
 *   
 *       @OA\Response(
 *         response=200,
 *         description="Lista de Grupos",
 *         @OA\JsonContent(
 *             @OA\Property(property="nome", type="string", example="ListName"),
 *             @OA\Property(property="quantidade", type="integer", example=2),
 *
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *     ),
 * )

 */
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

     
  /**
 * @OA\Post(
 *     path="/api/remover-lista",
 *     summary="Remove Listas de Grupos de emails",
 *     tags={"Group List"},
 *     description="Remove Listas de Grupos de emails",
 *     operationId="Remove Lista",
 *     security={{"bearerAuth": {}}},
 *   requestBody={
     *         "required": true,
     *         "description": "Nome da lista de grupo a ser removida",
     *         "content": {
     *             "application/json": {
     *                 "example": {"nomelista": "NomeLista"}
     *             }
     *         }
     *     },
 *       @OA\Response(
 *         response=200,
 *         description="Lista de Grupos",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="bool", example="true"),
 *  *            @OA\Property(property="message", type="string", example="Removido com sucesso"),

 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Não autorizado",
 *     ),
 * )

 */
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
