<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paper') }}/img/logo-ib.png">
    <link rel="icon" type="image/png" href="{{ asset('paper') }}/img/logo-ib.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        {{ __('Sistema IBB') }}
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('paper') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('paper') }}/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
</head>



<body>

    <div class="wrapper">

        @include('layouts.navbars.navs.sidebar')

        <div class="main-panel">
            @include('layouts.navbars.navs.navbar')

            <div class="content">
                <div class="container-fluid mt--7">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header border-0">
                                    <div
                                        class="align-items-center d-flex flex-lg-row flex-column justify-content-lg-between justify-content-center align-items-center">
                                        <div class="ml-2">
                                        </div>
                                        <div class="d-flex justify-content-center container align-items-center">
                                            <form action="{{ route('users.search') }}" method="GET" class="form-inline">
                                                <input type="text" name="search" class="form-control"
                                                    placeholder="Pesquisar" value="{{ request('search') }}">
                                                <button style="padding: 5px 20px 5px 20px;"
                                                    class="btn btn-outline-success" type="submit">Buscar</button>
                                            </form>
                                        </div>
                                        <div class="text-right mr-2">
                                            <a onclick="abrirModal3()" class="btn btn-sm btn-success"><i
                                                    style="width: 20px; font-weight: bold; color: white;"
                                                    class="nc-icon nc-simple-add"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                </div>
                                <div class="table-responsive usertable">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nome</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Contato</th>
                                                <th scope="col">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->nome_completo }}</td>
                                                <td>
                                                    <a>{{ $user->email }}</a>
                                                </td>
                                                <td>
                                                    <?php echo strlen($user->telefone_principal) < 5 ? $user->telefone_secundario : $user->telefone_principal; ?>
                                                </td>
                                                <td style="
                                                    align-items: center;
                                                    justify-content: start;
                                                    display: flex;
                                                " class="icons-int">
                                                    <i onclick="abrirModal2({{ $user->id }})"
                                                        class="nc-icon nc-zoom-split"></i>
                                                    <i onclick="abrirModal({{ $user->id }})" class="fa fa-pencil"
                                                        aria-hidden="true"></i>

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer py-4">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $users->previousPageUrl() }}">Anterior</a>
                                            </li>

                                            <li class="page-item">
                                                <a class="page-link" href="{{ $users->nextPageUrl() }}">Proxima</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('pages.edit-membro')
    @include('pages.ver-membro')

    <style>
        .toast {
            z-index: 10000;
            position: fixed;
            top: 25px;
            right: 30px;
            border-radius: 12px;
            background: #fff;
            padding: 20px 35px 20px 25px;
            box-shadow: 0 6px 20px -5px rgba(0, 0, 0, 0.1);
            overflow: hidden !important;
            transform: translateX(calc(100% + 30px));
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);

        }

        .toast.active {
            transform: translateX(0%);

        }

        .toast .toast-content {
            display: flex;
            align-items: center;
        }

        .toast-content .check {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 35px;
            min-width: 35px;
            background-color: #2770ff;
            color: #fff;
            font-size: 20px;
            border-radius: 50%;
        }

        .toast-content .message {
            display: flex;
            flex-direction: column;
            margin: 0 20px;
        }

        .message .text {
            font-size: 16px;
            font-weight: 400;
            color: #666666;
        }

        .message .text.text-1 {
            font-weight: 600;
            color: #333;
        }

        .toast .close {
            position: absolute;
            top: 10px;
            right: 15px;
            padding: 5px;
            cursor: pointer;
            opacity: 0.7;
        }

        .toast .close:hover {
            opacity: 1;
        }

        .toast .progress {
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;

        }

        .toast .progress:before {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0;
            height: 100%;
            width: 100%;
            background-color: #2770ff;
        }

        .progress.active:before {
            animation: progress 5s linear forwards;
        }

        .modal-content {
            background: #f2f2f2;
        }

        @keyframes progress {
            100% {
                right: 100%;
            }
        }
    </style>

    <script>
        var gettoken = localStorage.getItem('token');
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

        
    </script>
    <!--   Core JS Files   -->
    <script src="{{ asset('paper') }}/js/auth.js"></script>
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
    <script src="{{ asset('paper') }}/demo/jquery.sharrre.js"></script>

    @stack('scripts')

    @include('layouts.navbars.fixed-plugin-js')
</body>

</html>