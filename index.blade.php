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
    <link rel="icon" type="image/png" href="{{ asset('paper') }}/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- End Google Tag Manager -->

    
</head>


<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="wrapper">

        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
      
                <div class="mb-2">
                    <img src="{{ asset('paper') }}/img/logo-ib.png">
                </div>
         
               <p class="txt-logo">Igreja<br>Batista<br>Bethleem</p>
        </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="{{ route('page.index', 'dashboard') }}">
                            <i class="nc-icon nc-bank"></i>
                            <p>{{ __('Dashboard') }}</p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                            <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                            <p>
                                {{ __('Laravel examples') }}
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse show" id="laravelExamples">
                            <ul class="nav">
                                <li>
                                    <a href="{{ route('profile.edit') }}">
                                        <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                        <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="{{ route('page.index', 'user') }}">
                                        <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                        <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('page.index', 'icons') }}">
                            <i class="nc-icon nc-diamond"></i>
                            <p>{{ __('Icons') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.index', 'map') }}">
                            <i class="nc-icon nc-pin-3"></i>
                            <p>{{ __('Maps') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.index', 'notifications') }}">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>{{ __('Notifications') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.index', 'tables') }}">
                            <i class="nc-icon nc-tile-56"></i>
                            <p>{{ __('Table List') }}</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('page.index', 'typography') }}">
                            <i class="nc-icon nc-caps-small"></i>
                            <p>{{ __('Typography') }}</p>
                        </a>
                    </li>
                    {{-- <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }}">
                                <a href="{{ route('page.index', 'upgrade') }}" class="bg-danger">
                                    <i class="nc-icon nc-spaceship text-white"></i>
                                    <p class="text-white">{{ __('Upgrade to PRO') }}</p>
                                </a>
                            </li> --}}
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">{{ __('Paper Dashboard') }}</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link btn-magnify" href="#pablo">
                                    <i class="nc-icon nc-layout-11"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">{{ __('Stats') }}</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">{{ __('Some Actions') }}</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">{{ __('Action') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Another action') }}</a>
                                    <a class="dropdown-item" href="#">{{ __('Something else here') }}</a>
                                </div>
                            </li>
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-settings-gear-65"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="navbarDropdownMenuLink2">
                                    <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut"
                                        method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item"
                                            onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                                        <a class="dropdown-item"
                                            href="{{ route('profile.edit') }}">{{ __('My profile') }}</a>
                                    </div>
                                </div>
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
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="mb-0">Membros</h3>
                                        </div>
                                        <div class="col-4 text-right">
                                            <a href="#" class="btn btn-sm btn-primary">Adicionar</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                </div>
                                <div class="table-responsive">
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
                                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                                </td>
                                                <td>{{ $user->telefone_principal }}</td>
                                                <td>
                                                    <button class="btn btn-danger mr-3">Redefinir Acesso</button>
                                                    <button class="btn btn-primary">Editar</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer py-4">
                                    <nav class="d-flex justify-content-end" aria-label="...">

                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <nav class="footer-nav">
                            <ul>
                                <li>
                                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
                                </li>
                                <li>
                                    <a href="https://updivision.com" target="_blank">UpDivision</a>
                                </li>
                                <li>
                                    <a href="http://blog.creative-tim.com/" target="_blank">Blog</a>
                                </li>
                                <li>
                                    <a href="https://www.creative-tim.com/license" target="_blank">Licenses</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="credits ml-auto">
                            <span class="copyright">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>2020, made with <i class="fa fa-heart heart"></i> by <a
                                    class="" href="https://www.creative-tim.com" target="_blank">Creative
                                    Tim</a> and <a class="" target="_blank"
                                    href="https://updivision.com">UPDIVISION</a>
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
   
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
    <script src="{{ asset('paper') }}/demo/jquery.sharrre.js"></script>

    @stack('scripts')

    @include('layouts.navbars.fixed-plugin-js')
</body>

</html>
