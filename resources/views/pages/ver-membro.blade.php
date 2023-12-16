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


<div id="meuModalview" class="modal">
    <div class="modal-content">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="title" style="margin-bottom:0px;">Visualização de membro:</h5>
                    <span data-notify="icon" onclick="fecharModal2()" class="nc-icon nc-simple-remove"></span>
                </div>
                <div class="d-flex flex-row justify-content-center ">
                    <button class="btn-nav-card-view-member" onclick="mostrarProximaSecao2('secao-view-pessoal')">Dados
                        Pessoais</button>
                    <button class="btn-nav-card-view-member"
                        onclick="mostrarProximaSecao2('secao-view-etapa-profissao')">Outros Dados</button>
                    <button class="btn-nav-card-view-member"
                        onclick="mostrarProximaSecao2('secao-view-etapa-endereco')">Endereço</button>


                    <button class="btn-nav-card-view-member"
                        onclick="mostrarProximaSecao2('secao-view-etapa-religiao')">Informações Religiosas</button>
                </div>
            </div>

        </div>
        <div class="d-flex flex-column">
            <section class="formulario-section" id="secao-view-pessoal">

                <div class="card" style="margin-bottom: 0px !important;">

                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-4 col-form-label">Foto</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <img class="groupdata2 foto-img" style="width: 100%; max-width: 200px;" id="view-imagem">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Nome Completo</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-nome_completo"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Apelido</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-apelido"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">E-mail</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-email"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">CPF</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-cpf"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">RG</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-rg"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Data de Nascimento</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-data_de_nascimento"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Sexo</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-sexo"></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-md-4 col-form-label">Telefone Principal</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-telefone_principal"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Telefone Secundário</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-telefone_secundario"></p>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>


            </section>
            <section class="formulario-section3" id="secao-view-etapa-endereco">

                <div class="card" style="margin-bottom: 0px !important;">

                    <div class="card-body">

                        <div class="row">
                            <label class="col-md-4 col-form-label">CEP</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-cep"></p>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-4 col-form-label">Logradouro</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-logradouro"></p>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-4 col-form-label">Bairro</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-bairro"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Cidade</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-cidade"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Estado</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-estado"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Naturalidade</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-naturalidade"></p>
                                </div>
                            </div>
                        </div>

                    </div>
            </section>
            <section class="formulario-section4" id="secao-view-etapa-profissao">

                <div class="card" style="margin-bottom: 0px !important;">

                    <div class="card-body">

                        <div class="row">
                            <label class="col-md-4 col-form-label">Profissão</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-profissao"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-4 col-form-label">Escolaridade</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-escolaridade"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-4 col-form-label">Tipo Sanguíneo</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-tipo_sanguineo"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Estado Civil</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-estado_civil"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Nome Conjuge</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-nome_conjuge"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Conjuge é um membro IBB?</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-conjuge_membro_ibb"></p>


                                </div>

                            </div>

                        </div>

                    </div>
            </section>
            <section class="formulario-section5" id="secao-view-etapa-religiao">

                <div class="card" style="margin-bottom: 0px !important;">

                    <div class="card-body">

                        <div class="row">
                            <label class="col-md-4 col-form-label">Posição</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-ate_data_hoje_e"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Igreja Origem</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-igreja_origem"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Ministerios</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-ministerios"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Atribuições</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-atribuicoes"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Membro IBB?</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-membro_ibb"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Forma admissao</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-forma_admissao_ibb"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Data Conversão</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-data_conversao"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Data Batismo</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-data_batismo"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Igreja Batismo</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-igreja_batismo"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Data Profissao de Fé</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-data_profissao_fe"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label" style="font-weight:bold; color:black;">O Membro
                                compromete-se as seguintes clausulas:</label>

                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Frequentar regularmente as atividades da igreja
                                ?</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-comp_frequentar_regularmente_atividades_igreja">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Ser aluno EBD ?</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="view-comp_ser_aluno_EBD"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Viver em harmonia com os irmãos ?</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="comp_viver_em_harmonia_com_irmaos"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Ser dizimista / ofertante ?</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="comp_ser_dizimista_ofertante"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Em caso de ausência, corresponder a igreja em até 6
                                meses ?</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="comp_caso_ausencia_corresponder_igreja_6_meses"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Receber visita da comissão disciplinar ?</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="comp_receber_visita_comissao_disciplinar"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label">Receber visita da comissão disciplinar ?</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <p class="groupdata2" id="comp_receber_visita_comissao_disciplinar"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-4 col-form-label">pg sim</label>
                        <div class="col-md-8">
                            <div class="form-group">
                                <p class="groupdata2" id="pg_sim"></p>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>


</div>




<script>
    //document.getElementById('secao-view-etapa-endereco').style.display = 'block';
    document.getElementById('secao-view-pessoal').style.display = 'block';
    document.getElementById('secao-view-etapa-endereco').style.display = 'none';
    document.getElementById('secao-view-etapa-profissao').style.display = 'none';
    document.getElementById('secao-view-etapa-religiao').style.display = 'none';


    function mostrarProximaSecao2(secaoId) {
        document.getElementById('secao-view-etapa-religiao').style.display = 'none';
        document.getElementById('secao-view-pessoal').style.display = 'none';
        document.getElementById('secao-view-etapa-endereco').style.display = 'none';
        document.getElementById('secao-view-etapa-profissao').style.display = 'none';
        document.getElementById(secaoId).style.display = 'block';
    }
</script>
<script>
    function abrirModal2(id) {
        document.getElementById('meuModalview').style.display = 'block';
        Vermembro(id);
    }

    function fecharModal2() {
        document.getElementById('meuModalview').style.display = 'none';
    }
</script>


<script>
    function Vermembro(id) {
        $.ajax({
            url: '/api/user/' + id, // Substitua pelo seu endpoint real
            type: 'GET',
            "headers": {
                    "Authorization": "Bearer" + gettoken
                },
            success: function(data) {
                // Preencha o formulário dentro do modal com os dados retornados
                data = data.Data[0];
                console.log(data);
                var elementosP = document.querySelectorAll('.groupdata2');

                const previewImg = document.querySelector('.foto-img');
                previewImg.src = 'fotos/'+data.imagem;
                // Itera sobre os elementos <p> e atribui os valores correspondentes da variável 'data'
                elementosP.forEach(function(elemento) {
                    var campo = elemento.id.replace('view-', ''); // Remove o prefixo 'view-'
                    if (data.hasOwnProperty(campo)) {
                        elemento.textContent = data[campo];

                        // Verifica se o campo está vazio e adiciona ou remove a classe 'd-none' ao elemento pai <div class="row">
                        if (data[campo] === "" || data[campo] === null) {
                            var divRow = elemento.closest('.row');
                            if (divRow) {
                                divRow.classList.add('d-none');
                            }
                        } else {
                            var divRow = elemento.closest('.row');
                            if (divRow) {
                                divRow.classList.remove('d-none');
                            }
                        }
                    }
                });

            },
            error: function() {

            }
        });
    }
</script>

</div>
</div>
