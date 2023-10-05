<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelController;

class MembroController extends Controller
{
    public function cadastrarMembro(Request $request)
    {
        $data = $request->all(); // Obtém todos os dados do formulário

        $img = $request->image;
        if ($img) {
            $extension = $img->extension();
            $imageName = md5($img->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $img->move(public_path('/fotos'), $imageName);
        } else {
            $imageName = null;
        }

        $evento = new ModelController([
            'imagem' => $imageName, // Defina as regras de validação da imagem aqui
            'nome_completo' => $data['nome_completo'],
            'apelido' => $data['apelido'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'rg' => $data['rg'],
            'data_de_nascimento' => $data['data_de_nascimento'],
            'sexo' => $data['sexo'],
            'telefone_principal' => $data['telefone_principal'],
            'telefone_secundario' => $data['telefone_secundario'],
            'naturalidade' => $data['naturalidade'],
            'estado_civil' => $data['estado_civil'],
            'nome_conjuge' => $data['nome_conjuge'],
            'conjuge_membro_ibb' => $data['conjuge_membro_ibb'],
            'cep' => $data['cep'],
            'logradouro' => $data['logradouro'],
            'bairro' => $data['bairro'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
            'profissao' => $data['profissao'],
            'escolaridade' => $data['escolaridade'],
            'tipo_sanguineo' => $data['tipo_sanguineo'],
            'data_conversao' => $data['data_conversao'],
            'data_batismo' => $data['data_batismo'],
            'igreja_batismo' => $data['igreja_batismo'],
            'data_profissao_fe' => $data['data_profissao_fe'],
            'igreja_origem' => $data['igreja_origem'],
            'comp_frequentar_regularmente_atividades_igreja' => $data['comp_frequentar_regularmente_atividades_igreja'],
            'comp_ser_aluno_EBD' => $data['comp_ser_aluno_EBD'],
            'comp_viver_em_harmonia_com_irmaos' => $data['comp_viver_em_harmonia_com_irmaos'],
            'comp_ser_dizimista_ofertante' => $data['comp_ser_dizimista_ofertante'],
            'comp_caso_ausencia_corresponder_igreja_6_meses' => $data['comp_caso_ausencia_corresponder_igreja_6_meses'],
            'comp_receber_visita_comissao_disciplinar' => $data['comp_receber_visita_comissao_disciplinar'],
            'coleta_dados' => $data['coleta_dados'],


        ]);


        if ($evento->save()) {
            return redirect()->back()->with(['ultimo' => $data['id'], 'message' => 'Membro cadastrado com sucesso', 'status' => true]);
        } else {
            return redirect()->back()->with(['message' => 'Erro ao cadastrar membro, consulte um desenvolvedor', 'status' => false]);
        }
    }
    public function editmembro(Request $request)
    {
        // Recupere os dados do formulário
        $data = $request->all();

        // Use o email como identificador para encontrar o usuário no banco de dados
        $user = ModelController::where('email', $data['email'])->first();
        $img = $request->image;


        if ($img) {
            $extension = $img->extension();
            $imageName = md5($img->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $img->move(public_path('/fotos'), $imageName);
            $user->imagem = $imageName;
        }



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
            $user->comp_frequentar_regularmente_atividades_igreja = $data['comp_frequentar_regularmente_atividades_igreja'];
            $user->comp_ser_aluno_EBD = $data['comp_ser_aluno_EBD'];
            $user->comp_viver_em_harmonia_com_irmaos = $data['comp_viver_em_harmonia_com_irmaos'];
            $user->comp_ser_dizimista_ofertante = $data['comp_ser_dizimista_ofertante'];
            $user->comp_caso_ausencia_corresponder_igreja_6_meses = $data['comp_caso_ausencia_corresponder_igreja_6_meses'];
            $user->comp_receber_visita_comissao_disciplinar = $data['comp_receber_visita_comissao_disciplinar'];
            $user->coleta_dados = $data['coleta_dados'];


            // Continue atualizando todos os outros campos com base nos dados do formulário

            // Salve as alterações no banco de dados


        }

        if($user->save()){
            return redirect()->back()->with(['ultimo' => $user->id, 'message' => 'Membro editado com sucesso','status' => true]);

           } else{
            return redirect()->back()->with(['message' => 'Erro ao editar o membro, consulte um desenvolvedor','status' => false,'icon' => 'nc-check-2']);
           }
    }
}
