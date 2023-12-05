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


    <!-- End Google Tag Manager -->

    @extends('layouts.app', [
        'class' => '',
        'elementActive' => 'GerenEventos',
    ])


    @include('pages.edit-membro')
    @include('pages.ver-membro')




<body>





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

                                            <script>
                                                // Função para adicionar o código HTML ao container
                                                function addProfileCard(user) {
                                                    // Código HTML que você deseja adicionar
                                                    var profileCardHTML = `
                                                        <div class="profile-card">
                                                            <div class="profile">
                                                                <div class="avatar">
                                                                    <img src="fotos/` + user.imagem + `" alt="">
                                                                </div>
                                                                <div class="profile-info">
                                                                    <span>` + user.nome_completo + `</span>
                                                                    <p>` + user.email + `</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    `;
                                                    // Adiciona o conteúdo HTML ao container
                                                    document.getElementById("profile-container").insertAdjacentHTML('beforeend', profileCardHTML);
                                                }

                                                // Adiciona o bloco de código três vezes como exemplo
                                            </script>
                                            <div class="d-flex">
                                                <p id="countemail" style="border-radius: 5px 0px 0px 5px;" class="see">0 E-mails adicionados</p>
                                                <p class="see seehover" style="border-radius:0px 5px 5px 0px; background: #59595994; cursor: pointer;"><img style="width:20px;" src="images/eye.png" alt=""></p>
                                            </div>
                                            <div id="selectedemails" style="    flex-wrap: wrap;"
                                                class="d-flex container">
                                            </div>


                                        </div>
                                    </div>
                                    <textarea style="border-radius: 5px;" class="mt-3" name="" id="" cols="50" rows="10"></textarea>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>

    <style>
        .see {
            background: #5b5b5b;
            border-radius: 5px;
            padding: 5px;
            color: white;
            margin-top: 10px;
        }

        .seehover:hover{
            background: #333232!important;

        }

        #selectedemails div {
            display: flex;
            align-items: center;
            margin-right: 3px;
        }

        #toolbar {
            background: #E9ECEF;
            width: 50%;
            border-radius: 5px;
        }

        #toolbar div {
            padding: 15px;
        }

        #toolbar p {
            font-size: 13px;
            font-weight: 500;
            line-height: 12px;
            margin: 0px;
        }

        .nc-icon {
            font-size: 24px !important;
            margin-bottom: 5px;
        }

        #search {
            border: 1px solid #dddddd;
            border-radius: 5px;
            padding: 8px;
        }

        .profile-card {
            display: flex;
            justify-content: space-between;
        }

        .profile {
            border-radius: 5px;
            padding: 10px;
            background: #5b5b5b57;
            display: flex;
            align-items: center;
            color: black;
            margin: 5px;
            transition: 0.5s cubic-bezier(0.075, 0.82, 0.165, 1);
            cursor: pointer;
        }

        .profile:hover {
            padding: 15px;
            background: #5b5b5b;
            color: white;
        }

        .card label{
            font-size: 17px !important;
        }

        .avatar {
            margin-bottom: 0px !important;
            background-color: #5b5b5b61;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            overflow: hidden;
            position: relative;
            margin-right: 10px;
        }

        .avatar img {
            max-width: 100%;
        }

        .profile-info {
            text-align: start;
            display: flex;
            flex-direction: column;
            line-height: 13px;
        }

        .profile-info p {
            margin: 0px;
            font-size: 10px;
        }

        .boxfer {
            cursor: pointer;
            transition: .2s;

        }

        .boxfer:hover {
            transition: .2s;
            background: #495057;
            padding: 10px;
            color: white !important;
        }
    </style>
    <script>
        // Criação do elemento div





        // Função para exibir notificação
        function notify(data) {
            // Extrai o primeiro elemento do array (se houver)
            data = data[0];

            // Variáveis de elementos da notificação
            var toast = document.querySelector(".toast");
            var closeIcon = document.querySelector(".close");
            var progress = document.querySelector(".progress");
            var statustext = document.querySelector(".statustext");
            var contenttext = document.querySelector(".contenttext");

            // Define o conteúdo da notificação
            contenttext.innerHTML = data.texto;
            statustext.innerHTML = data.sucesso ? 'Sucesso' : 'Erro';

            // Temporizadores para ocultar a notificação após alguns segundos
            var timer1 = setTimeout(() => {
                toast.classList.remove("active");
            }, 5000);

            var timer2 = setTimeout(() => {
                progress.classList.remove("active");
            }, 5300);

            // Console.log para depuração
            console.log(data);
        }

        // Variáveis globais
        var act_adicionaremail = $('#act_adicionaremail');
        var act_inserirtodos = $('#act_inserirtodos');
        var act_limpartodos = $('#act_limpartodos');
        var act_criarlista = $('#act_criarlista');
        var act_verlistas = $('#act_verlistas');
        var countemail = $('#countemail');
        var emails = [];

        // Função para adicionar emails à lista
        function addEmailToList(user) {
            if (!emails.includes(user.email)) {
                emails.push(user.email);

                var divElement = document.createElement('div');
                var removeButton = document.createElement('span');

                // Configuração do botão de remoção
                removeButton.classList = 'nc-icon nc-simple-remove';
                removeButton.style.color = 'red';
                removeButton.style.cursor = 'pointer';

                // Configuração da div de email
                divElement.classList = 'cardemails';
                removeButton.addEventListener('click', function() {
                    divElement.parentNode.removeChild(divElement);
                    var index = emails.indexOf(user.email);
                    if (index !== -1) {
                        emails.splice(index, 1);
                    }
                    updateEmailCount();
                    console.log('E-mail removido:', user.email);
                });

                // Adiciona o email à lista na tela
                selectedemails.appendChild(divElement).textContent = user.email;
                divElement.appendChild(removeButton);
            }
        }

        // Função para atualizar a contagem de emails
        function updateEmailCount() {
            countemail.text(emails.length + ' E-mails adicionados');
        }

        // Evento de clique no botão "Inserir Todos"
        act_inserirtodos.on('click', function() {
            $.get('/getemailsall', function(data) {
                data.forEach(function(user) {
                    addEmailToList(user);
                });
                updateEmailCount();
            });
        });

        // Evento de clique no botão "Limpar Todos"
        act_limpartodos.on('click', function() {
            emails = [];
            $('.cardemails').remove();
            updateEmailCount();
        });

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

                        // Adiciona os novos perfis
                        data.forEach(function(user) {
                            addProfileCard(user);
                            if (searchValue == '') {
                                $('.profile-card').remove();

                            }
                        });
                    });
                });
            });

            usersSelect.on('change', function() {
                // Obtém o valor selecionado
                var selectedValue = usersSelect.val();

                // Verifica se o valor já está no array
                if (!emails.includes(selectedValue) && selectedValue.trim() !== '') {
                    // Adiciona o valor ao array de emails
                    emails.push(selectedValue);

                    // Registra no console.log
                    console.log('Seleção do usuário:', emails);

                    // Criação de elementos HTML
                    var divElement = $('<div>').addClass('cardemails');
                    var removeButton = $('<span>').addClass('nc-icon nc-simple-remove').css({
                        'color': 'red',
                        'cursor': 'pointer'
                    });

                    // Adiciona evento de clique ao botão de remoção
                    removeButton.on('click', function() {
                        divElement.remove();
                        var index = emails.indexOf(selectedValue);
                        if (index !== -1) {
                            // Remove o email do array
                            emails.splice(index, 1);
                        }
                        updateEmailCount();
                        console.log('E-mail removido:', selectedValue);
                    });

                    // Listar na tela
                    selectedemails.append(divElement.text(selectedValue).append(removeButton));
                    updateEmailCount();
                } else {
                    console.log('O valor já está no array:', selectedValue);
                }
            });

            // Função para atualizar a contagem de emails

        });
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
    <script src="{{ asset('paper') }}/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('paper') }}/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('paper') }}/demo/demo.js"></script>
    <!-- Sharrre libray -->


</body>

</html>
