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
                <a href="{{ route('page.index', 'user') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('Membros') }}</p>
                </a>
                <a href="{{ route('page.index', 'email') }}">
                    <i class="nc-icon nc-email-85"></i>
                    <p>{{ __('Enviar Email') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>