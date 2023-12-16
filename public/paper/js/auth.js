document.addEventListener('DOMContentLoaded', function () {
            // Obtenha os valores do formulário
            var gettoken = localStorage.getItem('token');
            var token = {
                token: gettoken,
            };
            if (gettoken) {
                $.ajax({
                    type: 'POST',
                    url: '/api/me',
                    contentType: 'application/json',
                    data: JSON.stringify(gettoken),
                    "headers": {
                        "Authorization": "Bearer" + gettoken
                    },
                    success: function (response) {
                        console.log(response.user.email);
                        if (response.user.email) {
                            console.log(response.email)
                        } else {
                            window.location.href = '/login';
                        }
                    },
                    error: function (error) {
                        console.error('Erro ao fazer login:', error.responseText);
                    }
                });
            } else {
                window.location.href = '/login';
            }

        });