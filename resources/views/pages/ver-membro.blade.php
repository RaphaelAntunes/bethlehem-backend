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
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="title" style="margin-bottom:0px;">Visualização de membro:</h5>
                    <span data-notify="icon" onclick="fecharModal()" class="nc-icon nc-simple-remove"></span>
                </div>
                <div class="d-flex flex-row justify-content-center ">
                    <button class="btn-nav-card-view-member" onclick="mostrarProximaSecao('secao-pessoal')">Dados
                        Pessoais</button>
                    <button class="btn-nav-card-view-member"
                        onclick="mostrarProximaSecao('secao-etapa-endereco')">Endereço</button>
                    <button class="btn-nav-card-view-member"
                        onclick="mostrarProximaSecao('secao-etapa-profissao')">Profissão</button>
                    <button class="btn-nav-card-view-member">Informações Religiosas</button>
                </div>
            </div>

        </div>
        <div class="d-flex flex-column">
            <section class="formulario-section" id="secao-pessoal">

                <div class="card" style="margin-bottom: 0px !important;">

                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">Nome Completo</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="nome"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Apelido</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="apelido"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">E-mail</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="email"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">CPF</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="cpf"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">RG</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="rg"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Data de Nascimento</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="data_de_nascimento"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Sexo</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="sexo"></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-md-3 col-form-label">Telefone Principal</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="telefone_principal"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Telefone Secundário</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="telefone_secundario"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Naturalidade</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="naturalidade"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Estado Civil</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="estado_civil"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Nome Conjuge</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="nome_conjuge"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Conjuge é um membro IBB?</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="conjuge_membo_ibb"></p>


                                </div>

                            </div>

                        </div>



                    </div>
                </div>


            </section>
            <section class="formulario-section3" id="secao-etapa-endereco">

                <div class="card" style="margin-bottom: 0px !important;">

                    <div class="card-body">

                        <div class="row">
                            <label class="col-md-3 col-form-label">CEP</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="cep"></p>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-3 col-form-label">Logradouro</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="logradouro"></p>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-3 col-form-label">Bairro</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="bairro"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Cidade</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="cidade"></p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Estado</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="estado"></p>

                                </div>
                            </div>
                        </div>


                    </div>
            </section>
            <section class="formulario-section4" id="secao-etapa-profissao">

                <div class="card" style="margin-bottom: 0px !important;">

                    <div class="card-body">

                        <div class="row">
                            <label class="col-md-3 col-form-label">Profissão</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="profissao"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-3 col-form-label">Escolaridade</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="escolaridade"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-3 col-form-label">Tipo Sanguíneo</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="tipo_sanguineo"></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-3 col-form-label">Data Conversão</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="data_conversao"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Data Batismo</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="data_batismo"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Igreja Batismo</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="igreja_batismo"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Data Profissao de Fé</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="data_profissao_fe"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">Igreja Origem</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <p id="igreja_origem"></p>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>


</div>




<script>

    //document.getElementById('secao-etapa-endereco').style.display = 'block';
    document.getElementById('secao-pessoal').style.display = 'block';
    document.getElementById('secao-etapa-endereco').style.display = 'none';
    document.getElementById('secao-etapa-profissao').style.display = 'none';
    
    function mostrarProximaSecao(secaoId) {
        document.getElementById('secao-pessoal').style.display = 'none';
        document.getElementById('secao-etapa-endereco').style.display = 'none';
        document.getElementById('secao-etapa-profissao').style.display = 'none';
        document.getElementById(secaoId).style.display = 'block';
    }
</script>
<script>
    function abrirModal() {
        document.getElementById('meuModal').style.display = 'block';
    }

    function fecharModal() {
        document.getElementById('meuModal').style.display = 'none';
    }
</script>

</div>
</div>
