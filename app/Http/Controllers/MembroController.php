<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelController;
class MembroController extends Controller
{
    public function editmembro(Request $request)
    {
        // Recupere os dados do formulário
        $data = $request->all();

        // Use o email como identificador para encontrar o usuário no banco de dados
        $user = ModelController::where('email', $data['email'])->first();

        if ($user) {
            // Atualize os campos do usuário com os novos dados
            $user->nome_completo = $data['nome_completo'];
            $user->apelido = $data['apelido'];
            $user->email = $data['email'];
            $user->cpf = $data['cpf'];
            $user->rg = $data['rg'];
            $user->data_de_nascimento = $data['data_de_nascimento'];
            $user->sexo = $data['sexo'];
            $user->telefone_principal = $data['telefone_principal'];
            $user->telefone_secundario = $data['telefone_secundario'];
            $user->naturalidade = $data['naturalidade'];
            $user->estado_civil = $data['estado_civil'];
            $user->nome_conjuge = $data['nome_conjuge'];
            $user->naturalidade = $data['naturalidade'];
            $user->conjuge_membro_ibb = $data['conjuge_membro_ibb'];
            $user->cep = $data['cep'];
            $user->logradouro = $data['logradouro'];
            $user->bairro = $data['bairro'];
            $user->cidade = $data['cidade'];
            $user->estado = $data['estado'];
            $user->profissao = $data['profissao'];
            $user->escolaridade = $data['escolaridade'];
            $user->tipo_sanguineo = $data['tipo_sanguineo'];
            $user->data_conversao = $data['data_conversao'];
            $user->data_batismo = $data['data_batismo'];
            $user->igreja_batismo = $data['igreja_batismo'];
            $user->data_profissao_fe = $data['data_profissao_fe'];
            $user->igreja_origem = $data['igreja_origem'];
            // Continue atualizando todos os outros campos com base nos dados do formulário

            // Salve as alterações no banco de dados
            $user->save();

            // Redirecione o usuário para a página de perfil ou qualquer outra página apropriada
            return 200;
        } else {
            // Caso o usuário não seja encontrado, você pode lidar com isso de acordo com suas necessidades
            return 201;
        }
    }}
