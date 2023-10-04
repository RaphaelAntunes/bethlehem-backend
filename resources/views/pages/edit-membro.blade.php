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
                                        <p for="image"><i style="font-size: 40px;" class="nc-icon nc-camera-compact"></i></p>
                                        <img class="preview-img fotosub">
                                        <input type="file" name="image" id="image" class="file-chooser" accept="image/*">
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
                                    <input type="text" name="rg" id="rg" class="form-control"
                                        value="" oninput="formatarRG(this)">

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
                                <p onclick="mostrarProximaSecao('secao-pessoal-2')"
                                    class="btn btn-info btn-round">Próximo</p>

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
                                    <input type="date" name="data_profissao_fe" class="form-control"
                                        placeholder="" value="">
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
                                    <button id="btn-submit" class="btn btn-success btn-round">Cadastrar
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
    function abrirModal(id) {
        document.getElementById('meuModal').style.display = 'block';
        var elemento = document.getElementById('btn-submit');
        var elemento2 = document.getElementById('btn-submit-cad');
        elemento.style.display = 'initial';
        elemento2.style.display = 'none';
        carrega_dados(id);
        const form = document.getElementById('form-edit');
        form.action = '/edit-membro';
    }

    function abrirModal3(id) {
        var inputs = document.querySelectorAll('input[name]');
        var elemento = document.getElementById('btn-submit');
        var elemento2 = document.getElementById('btn-submit-cad');
        elemento.style.display = 'none';
        elemento2.style.display = 'initial';

        document.getElementById('meuModal').style.display = 'block';
        for (var i = 1; i < inputs.length; i++) {
            if(i == 8 || i == 9 ||i == 13 ||i == 14 ||i == 15 ||i == 16 ||i == 18 ||i == 19){

            }else{
                inputs[i].value = ''; // Define o valor como vazio apenas para os elementos a partir do segundo
            }

        }
        const form = document.getElementById('form-edit');
        form.action = '/cadastrar-membro';
        
    }

    function converterData(data) {
        const partesData = data.split('/');
        if (partesData.length === 3) {
            // Verifica se a data tem três partes (mês, dia, ano)
            const mes = partesData[0].padStart(2, '0');
            const dia = partesData[1].padStart(2, '0');
            const ano = partesData[2];

            // Formata o ano para quatro dígitos (considerando que 2 dígitos representam o ano de 1900)
            const anoFormatado = (ano.length === 2) ? '19' + ano : ano;

            // Formata a data no formato "yyyy-MM-dd"
            return `${anoFormatado}-${mes}-${dia}`;
        } else {
            // Se a data não estiver no formato esperado, retorne a data original
            return data;
        }
    }

   
    function carrega_dados(id) {

        $.ajax({
            url: '/api/user/' + id, // Substitua pelo seu endpoint real
            type: 'GET',
            success: function(data) {
                // Preencha o formulário dentro do modal com os dados retornados
                data = data.Data[0];
                console.log(data);
                var inputs = document.querySelectorAll('input[name]');
                console.log(inputs);
                const previewImg = document.querySelector('.preview-img');
                previewImg.src = 'fotos/'+data.imagem;
                inputs[2].value = data
                    .nome_completo;
                inputs[3].value = data.apelido;
                inputs[4].value = data.email;
                inputs[5].value = data.cpf;
                inputs[6].value = data.rg;
                inputs[7].value = converterData(data.data_de_nascimento);
                if (data.sexo === "Masculino") {
                    document.getElementById("sexo-masculino").checked = true;
                } else if (data.sexo === "Feminino") {
                    document.getElementById("sexo-feminino").checked = true;
                }
                inputs[10].value = data.telefone_principal;
                inputs[11].value = data.telefone_secundario;
                inputs[12].value = data.naturalidade;
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
                inputs[17].value = data.nome_conjuge;
                if (data.conjuge_membro_ibb == 'Sim') {
                    inputs[19].checked = true;
                } else {
                    inputs[18].checked = true;
                }

                inputs[20].value = data.cep;
                consultarCEP(data.cep);
                inputs[25].value = data.profissao;
                inputs[26].value = data.escolaridade;
                inputs[27].value = data.tipo_sanguineo;
                inputs[28].value = converterData(data.data_conversao);
                inputs[29].value = converterData(data.data_batismo);
                inputs[30].value = data.igreja_batismo;
                inputs[31].value = data.data_profissao_fe;
                inputs[32].value = data.igreja_origem;

                console.log(data.data_profissao_fe);


            },
            error: function() {
                // Lide com erros, se necessário
            }
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

    // evento disparado quando o reader terminar de ler 
    reader.onload = e => previewImg.src = e.target.result;

    // solicita ao reader que leia o arquivo 
    // transformando-o para DataURL. 
    // Isso disparará o evento reader.onload.
    reader.readAsDataURL(fileToUpload);
};
</script>

</div>
</div>
