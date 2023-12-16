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
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item btn-rotate">
                    <a class="nav-link-toggle" onclick="logout()">
                        <i class="nc-icon nc-button-power"></i>
                    </a>


                </li>
            </ul>
        </div>
    </div>
</nav>


<script>
    var gettoken = localStorage.getItem('token');
    function logout() {
        $.ajax({
            url: '/api/logout',
            type: 'POST',
            "headers": {
                "Authorization": "Bearer" + gettoken
            },
            success: function (data) {
                window.location.href = '/login';
            },
            error: function (error) {
                console.error('Erro na requisição AJAX:', error);
            }
        });
    }
</script>