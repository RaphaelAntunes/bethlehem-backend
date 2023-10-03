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
                    <div class="row">
                        <label class="col-md-3 col-form-label">Nome Completo*</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="titulo" class="form-control" value="" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Apelido</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="apelido" class="form-control" placeholder="" value=""
                                    required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">E-mail</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control" value=""
                                    oninput="sugerirDominio(this)">

                                <div id="sugestoes-dominio" style="display: none;">
                                    <p>Sugestões de domínio:</p>
                                    <ul>
                                        <li><a href="#" onclick="selecionarDominio('gmail.com')">gmail.com</a>
                                        </li>
                                        <li><a href="#" onclick="selecionarDominio('hotmail.com')">hotmail.com</a>
                                        </li>
                                        <!-- Adicione mais domínios conforme necessário -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">CPF</label>
                        <div class="col-md-9">
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
                                <input type="text" name="rg" id="rg" class="form-control" value=""
                                    oninput="formatarRG(this)">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Data de Nascimento</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="date" name="data_de_nascimento" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Sexo</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="sexo-masculino"
                                        value="Masculino" required>
                                    <label style="padding-left: 0px" class="form-check-label"
                                        for="sexo-masculino">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="sexo-feminino"
                                        value="Feminino" required>
                                    <label style="padding-left: 0px" class="form-check-label"
                                        for="sexo-feminino">Feminino</label>
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
                            <button onclick="mostrarProximaSecao('secao-pessoal-2')"
                                class="btn btn-info btn-round">Próximo</button>

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
                                    value="" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Estado Civil</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_civil"
                                        id="sexo-masculino" value="Casado" required>
                                    <label style="padding-left: 0px" class="form-check-label"
                                        for="sexo-masculino">Casado(a)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_civil"
                                        id="sexo-feminino" value="Noivo" required>
                                    <label style="padding-left: 0px" class="form-check-label"
                                        for="sexo-feminino">Noivo(a)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="estado_civil"
                                        id="sexo-feminino" value="Solteiro" required>
                                    <label style="padding-left: 0px" class="form-check-label"
                                        for="sexo-feminino">Solteiro(a)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Nome Conjuge</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="naturalidade" class="form-control" placeholder=""
                                    value="" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Conjuge é um membro IBB?</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="conjuge_membro_ibb"
                                        id="sexo-masculino" value="sim" required>
                                    <label style="padding-left: 0px" class="form-check-label"
                                        for="sexo-masculino">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="conjuge_membro_ibb"
                                        id="sexo-masculino" value="nao" required>
                                    <label style="padding-left: 0px" class="form-check-label"
                                        for="sexo-masculino">Não</label>
                                </div>


                            </div>

                        </div>

                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button onclick="mostrarProximaSecao('secao-pessoal')"
                                    class="btn btn-info btn-round">Anterior</button>
                                <button onclick="mostrarProximaSecao('secao-etapa-endereco')"
                                    class="btn btn-info btn-round">Próximo</button>

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
                        <p class="title">Endereço</p>
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
                                <button onclick="mostrarProximaSecao('secao-pessoal-2')"
                                    class="btn btn-info btn-round">Anterior</button>
                                <button onclick="mostrarProximaSecao('secao-etapa-profissao')"
                                    class="btn btn-info btn-round">Próximo</button>

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
                        <p class="title">Profissão</p>
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
                                <select name="escolaridade" class="form-control">
                                    <option value="">Selecione um grau de escolaridade</option>
                                    <option value="Ensino Fundamental">Ensino Fundamental</option>
                                    <option value="Ensino Médio">Ensino Médio</option>
                                    <option value="Técnico">Técnico</option>
                                    <option value="Graduação">Graduação</option>
                                    <option value="Pós-Graduação">Pós-Graduação</option>
                                    <option value="Mestrado">Mestrado</option>
                                    <option value="Doutorado">Doutorado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-3 col-form-label">Tipo Sanguíneo</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="tipo_sanguineo" class="form-control">
                                    <option value="">Selecione um tipo sanguíneo</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-3 col-form-label">Data Conversão</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="date" name="data_conversao" class="form-control" placeholder=""
                                    value="" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Data Batismo</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="date" name="data_batismo" class="form-control" placeholder=""
                                    value="" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Igreja Batismo</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="input" name="igreja_batismo" class="form-control" placeholder=""
                                    value="" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Data Profissao de Fé</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="data" name="data_profissao_fe" class="form-control" placeholder=""
                                    value="" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-3 col-form-label">Igreja Origem</label>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="data" name="igreja_origem" class="form-control" placeholder=""
                                    value="" required="">
                            </div>
                        </div>
                    </div>




                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button onclick="mostrarProximaSecao('secao-etapa-endereco')"
                                    class="btn btn-info btn-round">Anterior</button>
                                <button onclick="mostrarProximaSecao('secao-etapa-profissao')"
                                    class="btn btn-success btn-round">Cadastrar Membro</button>


                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>


</div>



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
    //document.getElementById('secao-etapa-endereco').style.display = 'block';
    document.getElementById('secao-pessoal').style.display = 'block';
    document.getElementById('secao-pessoal-2').style.display = 'none';
    document.getElementById('secao-etapa-endereco').style.display = 'none';
    document.getElementById('secao-etapa-profissao').style.display = 'none';

    function mostrarProximaSecao(secaoId) {
        document.getElementById('secao-pessoal').style.display = 'none';
        document.getElementById('secao-pessoal-2').style.display = 'none';
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
