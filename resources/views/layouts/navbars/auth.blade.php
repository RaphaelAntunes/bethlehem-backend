<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
      
            <div class="mb-2">
                <img src="{{ asset('paper') }}/img/logo-ib.png">
            </div>
     
           <p class="txt-logo">Igreja<br>Batista<br>Bethleem</p>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon nc-settings"></i>

                    <p>
                            {{ __('FERRAMENTAS') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav ml-3">
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __('GERENCIAR MEMBROS') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'eventos' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'eventos') }}">
                                <i class="nc-icon nc-istanbul"></i>
                                <p>{{ __('GERENCIAR EVENTOS') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
           
        </li>

        <hr>
        <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
            <a href="{{ route('page.index', 'icons') }}">
                <i class="nc-icon nc-diamond"></i>
                <p>{{ __('Icons') }}</p>
            </a>
        </li>
            <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
           
        </ul>
    </div>
</div>
