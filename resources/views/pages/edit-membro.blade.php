<style>
    /* Estilos para o modal */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
    }

    .modal-content {
        max-width: 500px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #a02424;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    .formulario-section2 {
        display: none;
    }

    #sugestoes-dominio {
        display: none;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        position: absolute;
        top: 38px;
        left: 0;
        right: 0;
        z-index: 2;
    }

    #sugestoes-dominio ul {
        list-style: none;
        padding: 0;
    }

    #sugestoes-dominio ul li {
        margin: 5px 0;
    }

    #sugestoes-dominio a {
        color: #333;
        text-decoration: none;
        font-weight: bold;
    }

    #sugestoes-dominio a:hover {
        text-decoration: underline;
    }
</style>


<div id="meuModal" class="modal">
    <div class="modal-content">
        <section class="formulario-section" id="secao-pessoal">

            <div class="card" style="margin-bottom: 0px !important;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="title">Cadastro</h5>
                        <p class="title">Dados Pessoais:</p>
                    </div>
                    <span data-notify="icon" onclick="fecharModal()" class="nc-icon nc-simple-remove"></span>

                </div>
                <div class="card-body">
                    <form id="form-edit" action="/cadastrar-membro" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <label class="col-md-3 col-form-label">Foto</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p for="image"><i style="font-size: 40px;" class="nc-icon nc-camera-compact"></i>
                                    </p>
                                    <img class="preview-img fotosub">
                                    <input type="file" name="image" id="image" class="file-chooser"
                                        accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Nome Completo*</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="nome_completo" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Apelido</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="apelido" class="form-control" placeholder=""
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">E-mail</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="email" id="email" class="form-control"
                                        value="" oninput="sugerirDominio(this)">

                                    <div id="sugestoes-dominio" style="display: none;">
                                        <p>Sugestões de domínio:</p>
                                        <ul>
                                            <li><a href="#" onclick="selecionarDominio('gmail.com')">gmail.com</a>
                                            </li>
                                            <li><a href="#"
                                                    onclick="selecionarDominio('hotmail.com')">hotmail.com</a>
                                            </li>
                                            <!-- Adicione mais domínios conforme necessário -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-md-column flex-row">
                            <div class="row">
                                <label class="col-md-3 col-form-label">CPF</label>
                                <div class="col-md-9 ">
                                    <div class="form-group">
                                        <input type="text" name="cpf" class="form-control" value=""
                                            oninput="mascaraCPF(this)" maxlength="14">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">RG</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="rg" id="rg" class="form-control"
                                            value="" oninput="formatarRG(this)">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Data de Nascimento</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="date" name="data_de_nascimento" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Sexo</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo"
                                            id="sexo-masculino" value="Masculino">
                                        <label style="padding-left: 0px" class="form-check-label"
                                            for="sexo-masculino">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo"
                                            id="sexo-feminino" value="Feminino">
                                        <label style="padding-left: 0px" class="form-check-label">Feminino</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-md-3 col-form-label">Telefone Principal</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="telefone_principal" id="telefone_principal"
                                        class="form-control" value="" maxlength="11"
                                        oninput="formatarTelefone(this)">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Telefone Secundário</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="telefone_secundario" id="telefone_secundario"
                                        class="form-control" value="" maxlength="11"
                                        oninput="formatarTelefone(this)">
                                </div>
                            </div>
                        </div>

                </div>


                <div class="card-footer ">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p onclick="mostrarProximaSecao('secao-pessoal-2')" class="btn btn-info btn-round">Próximo
                            </p>

                        </div>
                    </div>
                </div>
            </div>


        </section>
        <section class="formulario-section2" id="secao-pessoal-2">

            <div class="card" style="margin-bottom: 0px !important;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="title">Cadastro</h5>
                        <p class="title">Dados Pessoais:</p>
                    </div>
                    <span data-notify="icon" onclick="fecharModal()" class="nc-icon nc-simple-remove"></span>

                </div>
                <div class="card-body">

                    <div class="row">
                        <label class="col-md-3 col-form-label">Naturalidade</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="naturalidade" class="form-control" placeholder=""
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Estado Civil</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_civil"
                                        id="civil-casado" value="Casado">
                                    <label style="padding-left: 0px" class="form-check-label">Casado(a)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_civil"
                                        id="civil-noivo" value="Noivo">
                                    <label style="padding-left: 0px" class="form-check-label">Noivo(a)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_civil"
                                        id="civil-solteiro" value="Solteiro">
                                    <label style="padding-left: 0px" class="form-check-label">Solteiro(a)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_civil"
                                        id="civil-outro" value="outro">
                                    <label style="padding-left: 0px" class="form-check-label">Outro</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Nome Conjuge</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="nome_conjuge" class="form-control" placeholder=""
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Conjuge é um membro IBB?</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="conjuge_membro_ibb"
                                        id="ibb-nao" value="Não">
                                    <label style="padding-left: 0px" class="form-check-label"
                                        for="ibb-nao">Não</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="conjuge_membro_ibb"
                                        id="ibb-sim" value="Sim">
                                    <label style="padding-left: 0px" class="form-check-label"
                                        for="ibb-sim">Sim</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="padding: 11px 22px;" onclick="mostrarProximaSecao('secao-pessoal')"
                                    class="btn btn-info btn-round">Anterior</p>
                                <p style="padding: 11px 22px;" onclick="mostrarProximaSecao('secao-etapa-endereco')"
                                    class="btn btn-info btn-round">Próximo</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="formulario-section3" id="secao-etapa-endereco">

            <div class="card" style="margin-bottom: 0px !important;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="title">Cadastro</h5>
                        <p class="title">Endereço:</p>
                    </div>
                    <span data-notify="icon" onclick="fecharModal()" class="nc-icon nc-simple-remove"></span>

                </div>
                <div class="card-body">

                    <div class="row">
                        <label class="col-md-3 col-form-label">CEP</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="cep" id="cep" class="form-control"
                                    value="" onblur="consultarCEP(this.value)">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-3 col-form-label">Logradouro</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="logradouro" id="logradouro" class="form-control"
                                    value="">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-3 col-form-label">Bairro</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="bairro" id="bairro" class="form-control"
                                    value="">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Cidade</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="cidade" id="cidade" class="form-control"
                                    value="">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Estado</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="estado" id="estado" class="form-control"
                                    value="">

                            </div>
                        </div>
                    </div>

                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="padding: 11px 22px;" onclick="mostrarProximaSecao('secao-pessoal-2')"
                                    class="btn btn-info btn-round">Anterior</p>
                                <p style="padding: 11px 22px;" onclick="mostrarProximaSecao('secao-etapa-profissao')"
                                    class="btn btn-info btn-round">Próximo</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="formulario-section4" id="secao-etapa-profissao">

            <div class="card" style="margin-bottom: 0px !important;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="title">Cadastro</h5>
                        <p class="title">Profissão:</p>
                    </div>
                    <span data-notify="icon" onclick="fecharModal()" class="nc-icon nc-simple-remove"></span>

                </div>
                <div class="card-body">

                    <div class="row">
                        <label class="col-md-3 col-form-label">Profissão</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="profissao" class="form-control" value="">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-3 col-form-label">Escolaridade</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="escolaridade" class="form-control" placeholder=""
                                    value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-3 col-form-label">Tipo Sanguíneo</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="tipo_sanguineo" class="form-control" placeholder=""
                                    value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-3 col-form-label">Data Conversão</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="date" name="data_conversao" class="form-control" placeholder=""
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Data Batismo</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="date" name="data_batismo" class="form-control" placeholder=""
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Igreja Batismo</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="input" name="igreja_batismo" class="form-control" placeholder=""
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Data Profissao de Fé</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="date" name="data_profissao_fe" class="form-control" placeholder=""
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Igreja Origem</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="igreja_origem" class="form-control" placeholder=""
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="padding: 11px 22px;" onclick="mostrarProximaSecao('secao-etapa-endereco')"
                                    class="btn btn-info btn-round">Anterior</p>
                                <p style="padding: 11px 22px;"
                                    onclick="mostrarProximaSecao('secao-etapa-comprometese')"
                                    class="btn btn-info btn-round">Proximo</p>



                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="formulario-section5" id="secao-etapa-comprometese">

            <div class="card" style="margin-bottom: 0px !important;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="title">Cadastro</h5>
                        <p class="title">O membro Compromete-se com as seguintes clausulas:</p>
                    </div>
                    <span data-notify="icon" onclick="fecharModal()" class="nc-icon nc-simple-remove"></span>

                </div>
                <div class="card-body">

                    <div class="row">
                        <label class="col-md-3 col-form-label">Frequentar regularmente às atividades da
                            igreja? </label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_frequentar_regularmente_atividades_igreja" value="Sim">
                                    <label style="padding-left: 0px" class="form-check-label">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_frequentar_regularmente_atividades_igreja" value="Não">
                                    <label style="padding-left: 0px" class="form-check-label">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Ser aluno da Escola Bíblica Dominical (EBD)?</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="comp_ser_aluno_EBD"
                                        value="Sim">
                                    <label style="padding-left: 0px" class="form-check-label">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="comp_ser_aluno_EBD"
                                        value="Não">
                                    <label style="padding-left: 0px" class="form-check-label">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Viver em harmonia com seus irmãos em Cristo?</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_viver_em_harmonia_com_irmaos" value="Sim">
                                    <label style="padding-left: 0px" class="form-check-label">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_viver_em_harmonia_com_irmaos" value="Não">
                                    <label style="padding-left: 0px" class="form-check-label">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Ser dízimista/ofertante?</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_ser_dizimista_ofertante" value="Sim">
                                    <label style="padding-left: 0px" class="form-check-label">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_ser_dizimista_ofertante" value="Não">
                                    <label style="padding-left: 0px" class="form-check-label">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Em caso de ausência, a corresponder-se com a igreja no
                            prazo de 6 meses?</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_caso_ausencia_corresponder_igreja_6_meses" value="Sim">
                                    <label style="padding-left: 0px" class="form-check-label">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_caso_ausencia_corresponder_igreja_6_meses" value="Não">
                                    <label style="padding-left: 0px" class="form-check-label">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Receber a visita de uma comissão disciplinar?</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_receber_visita_comissao_disciplinar" value="Sim">
                                    <label style="padding-left: 0px" class="form-check-label">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"
                                        name="comp_receber_visita_comissao_disciplinar" value="Não">
                                    <label style="padding-left: 0px" class="form-check-label">Não</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Sobre a coleta de dados:</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="coleta_dados"
                                        value="Concordo">
                                    <label style="padding-left: 0px" class="form-check-label">Concordo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="coleta_dados"
                                        value="Não Concordo">
                                    <label style="padding-left: 0px" class="form-check-label">Não Concordo</label>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="token" name="token" value="seuBearerTokenAqui">
                    </div>


                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="padding: 11px 22px;" onclick="mostrarProximaSecao('secao-etapa-profissao')"
                                    class="btn btn-info btn-round">Anterior</p>
                                <button id="btn-submit" class="btn btn-success btn-round">Atualizar
                                    Membro</button>
                                <button id="btn-submit-cad" class="btn btn-success btn-round">Cadastrar
                                    Membro</button>


                            </div>
                        </div>
                    </div>
                </div>
        </section>
        </form>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Selecione todos os elementos do tipo "button" dentro do formulário.
        $("#form-edit button").on("click", function(event) {
            event.preventDefault(); // Isso evitará o comportamento padrão do formulário.

        });

        // Verifica se tem alguma edição / criação de membro novo
        var ultimo = @json(session('ultimo'));
        var message = @json(session('message'));
        if (ultimo) {
            abrirModal2(ultimo);
            const datanotify = [{
                texto: 'message',
                sucesso: 'true'
            }];
            notificacao(datanotify);

        }
    });
</script>

<script>
    function consultarCEP(cep) {
        // Remove qualquer caractere que não seja número do CEP
        cep = cep.replace(/\D/g, '');

        // Verifica se o CEP tem o tamanho correto (8 dígitos)
        if (cep.length === 8) {
            // Monta a URL da API ViaCEP
            var url = `https://viacep.com.br/ws/${cep}/json/`;

            // Faz a requisição à API
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (!data.erro) {
                        // Preenche os campos com os dados retornados
                        document.getElementById('logradouro').value = data.logradouro;
                        document.getElementById('bairro').value = data.bairro;
                        document.getElementById('cidade').value = data.localidade;
                        document.getElementById('estado').value = data.uf;
                    }
                })
                .catch(error => console.error('Erro ao consultar CEP:', error));
        }
    }
</script>
<script>
    function sugerirDominio(campoEmail) {
        var sugestoesDominio = document.getElementById('sugestoes-dominio');
        var emailValue = campoEmail.value;

        if (emailValue.indexOf('@') !== -1) {
            sugestoesDominio.style.display = 'block';
        } else {
            sugestoesDominio.style.display = 'none';
        }
        if (emailValue.indexOf('.') !== -1) {
            sugestoesDominio.style.display = 'none';
        }
    }

    function selecionarDominio(dominio) {
        var campoEmail = document.getElementById('email');
        campoEmail.value += dominio;
        document.getElementById('sugestoes-dominio').style.display = 'none';
        campoEmail.focus();
    }
</script>
<script>
    function formatarTelefone(campoTelefone) {
        // Remove qualquer caractere que não seja número do valor atual do campo
        var telefoneValue = campoTelefone.value.replace(/\D/g, '');
        // Verifica se o número de telefone tem 11 dígitos (incluindo o DDD)
        if (telefoneValue.length === 11) {
            // Formata o número de telefone no formato (99) 9 9999-9999
            telefoneValue = telefoneValue.replace(/^(\d{2})(\d{1})(\d{4})(\d{4})$/, '($1) $2 $3-$4');
        }
        // Define o valor formatado de volta no campo
        campoTelefone.value = telefoneValue;
    }

    function formatarRG(campoRG) {
        // Remove qualquer caractere que não seja número do valor atual do campo
        var rgValue = campoRG.value.replace(/\D/g, '');

        // Verifica se o RG tem 9 dígitos (formato padrão)

        campoRG.value = rgValue;
    }
    // Função para formatar o CPF
    function formatarCPF(cpf) {
        cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos
        if (cpf.length === 11) {
            cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4'); // Aplica a máscara
        }
        return cpf;
    }
    // Função para aplicar a máscara enquanto o usuário digita
    function mascaraCPF(campo) {
        campo.value = formatarCPF(campo.value);
    }
</script>
<script>
    document.getElementById('secao-pessoal').style.display = 'block';
    document.getElementById('secao-pessoal-2').style.display = 'none';
    document.getElementById('secao-etapa-endereco').style.display = 'none';
    document.getElementById('secao-etapa-profissao').style.display = 'none';
    document.getElementById('secao-etapa-comprometese').style.display = 'none';

    function mostrarProximaSecao(secaoId) {
        document.getElementById('secao-pessoal').style.display = 'none';
        document.getElementById('secao-pessoal-2').style.display = 'none';
        document.getElementById('secao-etapa-endereco').style.display = 'none';
        document.getElementById('secao-etapa-profissao').style.display = 'none';
        document.getElementById('secao-etapa-comprometese').style.display = 'none';
        document.getElementById('secao-etapa-comprometese').style.display = 'none';
        document.getElementById(secaoId).style.display = 'block';

    }
</script>
<script>
    function abrirModal(id) {
        document.getElementById('meuModal').style.display = 'block';
        var elemento = document.getElementById('btn-submit');
        var elemento2 = document.getElementById('btn-submit-cad');
        elemento.style.display = 'initial';
        elemento2.style.display = 'none';
        carrega_dados(id);
        const form = document.getElementById('form-edit');
        form.action = 'api/edit-membro';
    }

    function abrirModal3(id) {
        var inputs = document.querySelectorAll('input[name]');
        var elemento = document.getElementById('btn-submit');
        var elemento2 = document.getElementById('btn-submit-cad');
        elemento.style.display = 'none';
        elemento2.style.display = 'initial';
        var imagem = document.querySelector('.preview-img');
        imagem.src = '';


        document.getElementById('meuModal').style.display = 'block';
        for (var i = 1; i < inputs.length; i++) {
            if (i == 1) {

            } else {
                inputs[i].value = '';
            }

        }
        const form = document.getElementById('form-edit');
        form.action = 'api/cadastrar-membro';

    }

    function converterData(data) {
        if (data && typeof data === 'string') {
            const partesData = data.split('/');
            if (partesData.length === 3) {
                const mes = partesData[0].padStart(2, '0');
                const dia = partesData[1].padStart(2, '0');
                const ano = partesData[2];

                const anoFormatado = (ano.length === 2) ? '19' + ano : ano;

                return `${anoFormatado}-${mes}-${dia}`;
            } else {
                return data; 
            }
        } else {
            return ''; 
        }
    }


    function carrega_dados(id) {

        $.ajax({
            url: '/api/user/' + id, 
            type: 'GET',
            "headers": {
                    "Authorization": "Bearer" + gettoken
                },
            success: function(data) {
                // Preencha o formulário dentro do modal com os dados retornados
                data = data.Data[0];
                console.log(data);
                var inputs = document.querySelectorAll('input[name]');
                console.log(inputs);
                const previewImg = document.querySelector('.preview-img');
                previewImg.src = 'fotos/' + data.imagem;
                inputs[3].value = data.nome_completo;
                inputs[4].value = data.apelido;
                inputs[5].value = data.email;
                inputs[6].value = data.cpf;
                inputs[7].value = data.rg;
                inputs[8].value = converterData(data.data_de_nascimento);
                if (data.sexo === "Masculino") {
                    document.getElementById("sexo-masculino").checked = true;
                } else if (data.sexo === "Feminino") {
                    document.getElementById("sexo-feminino").checked = true;
                }
                inputs[11].value = data.telefone_principal;
                inputs[12].value = data.telefone_secundario;
                inputs[13].value = data.naturalidade;
                if (data.estado_civil === "Casado" || data.estado_civil === "Casado(a)" || data
                    .estado_civil === "Casada" || data.estado_civil === "Casada(o)") {
                    document.getElementById("civil-casado").checked = true;
                } else if (data.estado_civil === "Noivo" || data.estado_civil === "Noivo(a)" || data
                    .estado_civil === "Noiva" || data.estado_civil === "Noiva(o)") {
                    document.getElementById("civil-noivo").checked = true;
                } else if (data.estado_civil === "Solteiro" || data.estado_civil === "Solteiro(a)" || data
                    .estado_civil === "Solteira" || data.estado_civil === "Solteira(o)") {
                    document.getElementById("civil-noivo").checked = true;
                } else {
                    document.getElementById("civil-outro").checked = true;
                }
                inputs[18].value = data.nome_conjuge;
                if (data.conjuge_membro_ibb == 'Sim') {
                    inputs[20].checked = true;
                } else {
                    inputs[19].checked = true;
                }

                inputs[21].value = data.cep;
                consultarCEP(data.cep);
                inputs[26].value = data.profissao;
                inputs[27].value = data.escolaridade;
                inputs[28].value = data.tipo_sanguineo;
                inputs[29].value = converterData(data.data_conversao);
                inputs[30].value = converterData(data.data_batismo);
                inputs[31].value = data.igreja_batismo;
                inputs[32].value = data.data_profissao_fe;
                inputs[33].value = data.igreja_origem;
                if (data.comp_frequentar_regularmente_atividades_igreja == 'Sim') {
                    inputs[34].checked = true;
                } else {
                    inputs[35].checked = true;
                }
                if (data.comp_ser_aluno_EBD == 'Sim') {
                    inputs[36].checked = true;
                } else {
                    inputs[37].checked = true;
                }
                if (data.comp_viver_em_harmonia_com_irmaos == 'Sim') {
                    inputs[38].checked = true;
                } else {
                    inputs[39].checked = true;
                }
                if (data.comp_ser_dizimista_ofertante == 'Sim') {
                    inputs[40].checked = true;
                } else {
                    inputs[41].checked = true;
                }
                if (data.comp_caso_ausencia_corresponder_igreja_6_meses == 'Sim') {
                    inputs[42].checked = true;
                } else {
                    inputs[43].checked = true;
                }
                if (data.comp_receber_visita_comissao_disciplinar == 'Sim') {
                    inputs[44].checked = true;
                } else {
                    inputs[45].checked = true;
                }
                if (data.coleta_dados == 'Concordo') {
                    inputs[46].checked = true;
                } else {
                    inputs[47].checked = true;
                }
            },
        });
    }

    function fecharModal() {
        document.getElementById('meuModal').style.display = 'none';
    }
</script>

<script>
    const $2 = document.querySelector.bind(document);
    const previewImg = $2('.preview-img');
    const fileChooser = $2('.file-chooser');

    fileChooser.onchange = e => {
        const fileToUpload = e.target.files.item(0);
        const reader = new FileReader();
        reader.onload = e => previewImg.src = e.target.result;
        reader.readAsDataURL(fileToUpload);
    };
</script>

</div>
</div>
