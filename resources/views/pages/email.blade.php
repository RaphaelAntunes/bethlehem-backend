<!--
=========================================================
 Paper Dashboard - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 UPDIVISION (https://updivision.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('paper') }}/img/logo-ib.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('paper') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('paper') }}/demo/demo.css" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/style_emails.css" rel="stylesheet" />
    <x-head.tinymce-config />


    <!-- End Google Tag Manager -->

    @extends('layouts.app', [
        'class' => '',
        'elementActive' => 'SendEmail',
    ])


    @include('pages.edit-membro')
    @include('pages.ver-membro')

<body>

    <div class="toast">
        <div class="toast-content">
            <i class="fa fa-solid fa-check check"></i>
            <div class="message">
                <span class="text text-1 statustext"></span>
                <span class="text text-2 contenttext"></span>
            </div>
        </div>
        <div class="progress"></div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">

                <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-magnify">
                                <i class="nc-icon nc-button-power"
                                    onclick="document.getElementById('formLogOut').submit();"></i>
                                <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut"
                                    method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Button trigger modal -->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">E-mails selecionados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="containerpages">
                       
                      
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <div class="d-flex align-items-center justify-content-center">
                        <button id="leftpagebtn" onclick="pagina_anterior()" class="btn btn-danger"><</button>
                        <h5 id="countpaginate" style="margin: 0px;">1/33</h5>
                        <button id="nextpagebtn" onclick="proxima_pagina()" class="btn btn-danger">></button>
                    </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div
                                    class="container align-items-center d-flex flex-column justify-content-center justify-content-center align-items-center">
                                    <div class="container text-center">
                                        <h4>Envie e-mails, faça comunicados !</h4>
                                        <div
                                            class="d-flex justify-content-center flex-column container align-items-center">
                                            <div class="d-flex flex-column container">
                                                <label for="search">Digite o E-mail / Nome</label>
                                                <input type="text" class="mb-3" id="search"
                                                    placeholder="Digite o E-mail / Nome">
                                            </div>
                                            <div id="toolbar"
                                                class="d-flex flex-row justify-content-center align-items-center">
                                                <div id="act_adicionaremail" class="d-flex flex-column-reverse boxfer">
                                                    <p>Adicionar<br>E-mail</p>
                                                    <i class="nc-icon nc-email-85"></i>
                                                </div>
                                                <div id="act_inserirtodos" class="d-flex flex-column-reverse boxfer">
                                                    <p>Inserir<br>todos</p>
                                                    <i class="nc-icon nc-cloud-upload-94"></i>
                                                </div>
                                                <div id="act_limpartodos" class="d-flex flex-column-reverse boxfer">
                                                    <p>Limpar<br>todos</p>
                                                    <i class="nc-icon nc-simple-remove"></i>
                                                </div>
                                                <div class="d-flex flex-column-reverse boxfer">
                                                    <p>Criar<br>Lista</p>
                                                    <i class="nc-icon nc-simple-add"></i>
                                                </div>
                                                <div id="act_verlistas"class="d-flex flex-column-reverse boxfer">
                                                    <p>Ver<br>Listas</p>
                                                    <i class="nc-icon nc-single-copy-04"></i>
                                                </div>

                                            </div>


                                            <div id="profile-container" class="d-flex"></div>

                                            <div class="d-flex" onclick="Atualizaeabremodal()" data-toggle="modal"
                                                data-target="#exampleModalCenter">
                                                <p id="countemail" style="border-radius: 5px 0px 0px 5px;"
                                                    class="see">0 E-mails adicionados</p>
                                                <p class="see seehover"
                                                    style="border-radius:0px 5px 5px 0px; background: #59595994; cursor: pointer;">
                                                    <img style="width:20px;" src="images/eye.png" alt="">
                                                </p>
                                            </div>
                                            <div id="selectedemails" style="    flex-wrap: wrap;"
                                                class="d-flex container">
                                            </div>

                                            <input type="text" class="mb-3" id="assunto"
                                                style="width:100%; max-width:700px;" placeholder="Assunto">

                                            <x-forms.tinymce-editor />
                                        </div>
                                    </div>


                                    <button id="btnsubmit" class="mt-5 mb-5 btn"
                                        onclick="submitemail();">Enviar</button>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>





    <script>

        // VARIAVEIS PARA PAGINAÇÃO DE TODOS OS E-MAILS

        var itemsPorPagina = 6;
        var count = 6;
        var page = 0;
        var pagina_atual = 1;

        // VARIAVEIS GLOBAIS
        var act_adicionaremail = $('#act_adicionaremail');
        var act_inserirtodos = $('#act_inserirtodos');
        var act_limpartodos = $('#act_limpartodos');
        var act_criarlista = $('#act_criarlista');
        var act_verlistas = $('#act_verlistas');
        var countemail = $('#countemail');
        var searchValue = $('#search').val();

        // ARRAYS GLOBAIS
        var emails = [];
        var sem_emails = [];


        // SCRIPTS DE BARRA DE FERRAMENTAS

        act_inserirtodos.on('click', function() {
            $.get('/getemailsall', function(data) {
                data.forEach(function(user) {
                    adiciona_lista_emails(user.email);
                });
                atualiza_contador_email();
            });
        });

        act_limpartodos.on('click', function() {
            emails = [];
            sem_emails = [];
            atualiza_contador_email();
            $('.pg').remove();
            count = 6;
            page = 0;
            pagina_atual = 1;
        });

        act_adicionaremail.on('click', function() {
            var searchValue = $('#search').val();
            if (verifica_se_email_e_valido(searchValue) && !emails.includes(searchValue)) {
                var user = {
                    "nome_completo": null,
                    "email": searchValue,
                    "imagem": null
                };
               // emails.push(searchValue);
                sem_emails.push(user);
                adiciona_lista_emails(searchValue);
                atualiza_contador_email();
            } else {
                alert('O valor não é um e-mail válido.');
            }
        });

        /// SCRIPT QUE BUSCA OS E-MAILS E IMPRIME FRONT-END

        $(document).ready(function() {
            var searchInput = $('#search');
            var usersSelect = $('#usersSelect');
            var selectedemails = $('#selectedemails');

            searchInput.on('input', function() {
                var searchValue = $(this).val();
                $('.profile-card').remove();

                $.get('/getemails?search=' + searchValue, function(data) {
                    data.forEach(function(user) {
                        $('.profile-card').remove();

                        data.forEach(function(user) {
                            mostra_email_busca(user);
                            if (searchValue == '') {
                                $('.profile-card').remove();
                            }
                        });
                    });
                });
            });
        });

        function mostra_email_busca(user) {
            var profileCardHTML = ` <div class="profile-card" onclick="adiciona_lista_emails('${user.email}')">
        <div class="profile">
            <div class="avatar">
                <img src="fotos/${user.imagem}" alt="">
            </div>
            <div class="profile-info">
                <span>${user.nome_completo}</span>
                <p>${user.email}</p>
            </div>
        </div>
    </div>`;
            // Adiciona o conteúdo HTML ao container
            document.getElementById("profile-container").insertAdjacentHTML('beforeend', profileCardHTML);

        }

        function adiciona_item_a_paginacao(user) {
            
            if(verifica_se_email_e_valido(user.email) == false){
                return;  
            }

            if (count == itemsPorPagina) {
                page++;
                var novaDiv = document.createElement("div");
                if(page == 1){
                }else{
                    novaDiv.classList.add("d-none");
                }
                novaDiv.classList.add("pg");

                novaDiv.id = "boxselectemails" + page;
                $("#containerpages").append(novaDiv);
                count = 0;
            }
            // Cria o elemento jQuery com o HTML desejado
            if (user.imagem == null) {
                user.imagem = 'not-user.png';
            } else if (user.nome_completo == null) {
                user.nome_completo = 'Não cadastrado';

            }

            var $selectedCard = $(
                `
        <div class="profile d-flex justify-content-between" id="profile-${user.email}">
            <div class="d-flex justify-content-center align-items-center">
                <div class="avatar">
                    <img src="fotos/${user.imagem}" alt="">
                </div>
                <div class="profile-info">
                    <span>${user.nome_completo}</span>
                    <p>${user.email}</p>
                </div>
            </div>
            <div onclick="remove_lista_emails('${user.email}')">
                <h1 style="margin: 0px;" >X</h1>
            </div>    
        </div>
    `
            );
            // Adiciona o elemento ao container
            $("#boxselectemails" + page).append($selectedCard);
            count = count + 1;
        }

        /// SCRIPT QUE ADICIONA E REMOVE DO ARRAY DE EMAILS

        function adiciona_lista_emails(email) {
            if (!emails.includes(email)) {
                emails.push(email);
                atualiza_contador_email();
            }
        }

        function remove_lista_emails(email) {
            var index = emails.indexOf(email);
            if (index !== -1) {
                // Remove o email do array
                emails.splice(index, 1);
                sem_emails.splice(index, 1);

                // Remove o elemento correspondente pelo ID escapado
                $("#profile-" + $.escapeSelector(email)).remove();
            }
            atualiza_contador_email();
        }


        // CONTROLES E CONFIGURAÇÕES DA PAGINAÇÃO

        function verifica_botoes_paginacao(){
            if(pagina_atual >= total_paginas()){
                $("#nextpagebtn").prop("disabled", true);
            }else{
                $("#nextpagebtn").prop("disabled", false);

            }
            if(pagina_atual == 1){
                $("#leftpagebtn").prop("disabled", true);
            }else{
                $("#leftpagebtn").prop("disabled", false);

            }
        }

        function total_paginas(){
            var totalItens = emails.length;
            var total_paginas = Math.ceil(totalItens / itemsPorPagina);
            $('#countpaginate').text(pagina_atual+'/'+total_paginas);
            return total_paginas;
        }
      
        function proxima_pagina(){
            $("#boxselectemails" + pagina_atual).addClass("d-none");
            $("#boxselectemails" + (pagina_atual + 1)).removeClass("d-none");
            pagina_atual++;
            total_paginas();
            verifica_botoes_paginacao();
            
        }
        function pagina_anterior(){
            $("#boxselectemails" + pagina_atual).addClass("d-none");
            $("#boxselectemails" + (pagina_atual - 1)).removeClass("d-none");
            pagina_atual--;
            total_paginas();
            verifica_botoes_paginacao();

        }

        // SCRIPTS GERAIS DE SUPORTE AO CODIGO

        function atualiza_contador_email() {
            countemail.text(emails.length + ' E-mails adicionados');
        }

        function verifica_se_email_e_valido(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

            function notificacao(data) {
            // Instância de variaveis
            data = data[0];
            toast = document.querySelector(".toast");
            closeIcon = document.querySelector(".close");
            progress = document.querySelector(".progress");
            statustext = document.querySelector(".statustext");
            contenttext = document.querySelector(".contenttext");
            contenttext.innerHTML = data.texto;
            if (data.sucesso == true) {
                statustext.innerHTML = 'Sucesso';
            } else {
                statustext.innerHTML = 'Erro';
            }
            let timer1, timer2;
            toast.classList.add("active");
            progress.classList.add("active");
            //Temporizadores
            timer1 = setTimeout(() => {
                toast.classList.remove("active");
            }, 5000); //1s = 1000 milliseconds
            timer2 = setTimeout(() => {
                progress.classList.remove("active");
            }, 5300);
        }       

        function Atualizaeabremodal() {
            $('.pg').remove();
            count = 6;
            page = 0;
            pagina_atual = 1;
            $.get('/getemailsall', function(data) {
                data.forEach(function(user) {
                    if (emails.includes(user.email)) {
                        adiciona_item_a_paginacao(user);
                    }
                });
                sem_emails.forEach(function(user) {
                    adiciona_item_a_paginacao(user);
                });

            });

            total_paginas();
            verifica_botoes_paginacao();
        }

        

        function limpar() {
            $("#search").val("");
            emails = [];
            sem_emails = [];
            atualiza_contador_email();
            $('.pg').remove();
            count = 6;
            page = 0;
            pagina_atual = 1;

        }


        function submitemail() {

            if (emails.length == 0) {
                $("#search").focus();
            }

            var assunto = $('#assunto').val();
            var msg = tinymce.get('myeditorinstance').getContent();
            $("#btnsubmit").prop("disabled", true);
            $.ajax({
                url: '{{ route('enviarEmail') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Adicione o token CSRF aqui
                    emails: emails,
                    assunto: assunto,
                    msg: msg
                },
                success: function(response) {
                    $("#btnsubmit").prop("disabled", false);
                    const datanotify = [{
                        texto: response.message,
                        sucesso: response.status
                    }];
                    notificacao(datanotify);
                    limpar();
                },
                error: function(error) {
                    $("#btnsubmit").prop("disabled", false);
                    const datanotify = [{
                        texto: 'Um erro ocorreu, não foi possivel concluir',
                        sucesso: false
                    }];
                    notificacao(datanotify);
                }
            });
        }
    </script>

    <!--   Core JS Files   -->
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('paper') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('paper') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="{{ asset('paper') }}/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('paper') }}/js/plugins/bootstrap-notificacao.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('paper') }}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('paper') }}/demo/demo.js"></script>
    <!-- Sharrre libray -->


</body>

</html>
