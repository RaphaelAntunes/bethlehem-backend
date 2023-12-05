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
                                            <div class="d-flex flex-column">
                                                <label for="search">Digite o E-mail / Nome</label>
                                                <input type="text" class="mb-3" id="search">
                                            </div>
                                            <div id="toolbar" class="d-flex flex-row justify-content-center align-items-center">
                                                <div class="d-flex flex-column-reverse ">
                                                    <label for="">Adicionar<br>E-mail</label>
                                                    <i class="nc-icon nc-single-02"></i>
                                                </div>
                                                <div id="act_inserirtodos" class="d-flex flex-column-reverse ">
                                                    <label for="">Inserir<br>todos</label>
                                                    <i class="nc-icon nc-single-02"></i>
                                                </div>
                                                <div id="act_limpartodos" class="d-flex flex-column-reverse ">
                                                    <label for="">Limpar<br>todos</label>
                                                    <i class="nc-icon nc-single-02"></i>
                                                </div><div class="d-flex flex-column-reverse ">
                                                    <label for="">Criar<br>Lista</label>
                                                    <i class="nc-icon nc-single-02"></i>
                                                </div>  
                                                <div class="d-flex flex-column-reverse ">
                                                    <label for="">Ver<br>Listas</label>
                                                    <i class="nc-icon nc-single-02"></i>
                                                </div> 
                                             
                                            </div>
                                            <select id="usersSelect" class="form-control">
                                                <option value="">Selecione um usuário</option>
                                                <!-- As opções serão preenchidas dinamicamente pelo JavaScript -->
                                            </select>

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
        #selectedemails div {
            display: flex;
            align-items: center;
            margin-right: 3px;
        }

        #toolbar{
            background: #E9ECEF;
        }

        #toolbar div{
            padding: 5px;
        }

        #toolbar label{
            color: #495057;
            font-weight: 600;
            line-height: 12px;
        }
    </style>

    <script>
        function notify(data) {
            // Instância de variaveis
            data = data[0];
            console.log(data);

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
    </script>

    @push('scripts')
        <script>
            var emails = [];
            $(document).ready(function() {
                $('#search').on('input', function() {
                    var searchValue = $(this).val();
                    var usersSelect = $('#usersSelect');
                    var selectedemails = $('#selectedemails');

                    $.get('/getemails?search=' + searchValue, function(data) {
                        // Limpa as opções existentes
                        usersSelect.empty();

                        // Adiciona a opção padrão
                        usersSelect.append('<option value="">Selecione um usuário</option>');

                        // Adiciona as opções retornadas pela API
                        data.forEach(function(user) {
                            usersSelect.append('<option value="' + user.email + '">' + user
                                .nome_completo + ' - ' + user.email + '</option>');
                        });

                    });
                });
                usersSelect.addEventListener('change', function() {
                    // Obtém o valor selecionado
                    var selectedValue = usersSelect.value;

                    // Verifica se o valor já está no array
                    if (!emails.includes(selectedValue) && selectedValue.trim() !== '') {
                        // Adiciona o valor ao array de emails
                        emails.push(selectedValue);
                        // Registra no console.log
                        console.log('Seleção do usuário:', emails);
                        //div
                        var divElement = document.createElement('div');
                        // Cria um botão de remoção
                        var removeButton = document.createElement('span');
                        removeButton.classList = 'nc-icon nc-simple-remove';
                        removeButton.style.color = 'red';
                        removeButton.style.cursor = 'pointer';

                        removeButton.addEventListener('click', function() {
                            // Remove o elemento <p> quando o botão é clicado
                            divElement.parentNode.removeChild(divElement);
                            var index = emails.indexOf(selectedValue);
                            if (index !== -1) {
                                // Remove o email do array
                                emails.splice(index, 1);

                            }


                            console.log('E-mail removido:', selectedValue);
                        });



                        /// Listar na tela
                        selectedemails.appendChild(divElement).textContent = selectedValue;
                        divElement.appendChild(removeButton);

                    } else {
                        console.log('O valor já está no array:', selectedValue);
                    }
                });
            });
        </script>
    @endpush

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
