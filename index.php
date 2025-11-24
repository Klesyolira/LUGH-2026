<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/login.php");
if (getLogged($sid) == true) {
    header("location: choose_screen.php");
} else {
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Cabeçalho comum -->
    <title>Painel Conecta6g</title>
    <!-- Adicione os estilos CSS comuns -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Mh6+LJQLtUTmM67YHjMby+NoJckKG6kH2Nv3m/FK8hoUa/03E/c/+SxkXQRiVoZmFpi4BvXzv4qGqyZg0oR4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Estilos CSS específicos do login -->
    <style>
        /* Estilos específicos do login */
        body {
            background: linear-gradient(-45deg, #443C68, #060047, #66347F, #62CDFF);
            background-size: 400% 400%;
            animation: gradientBG 9s ease infinite;
            font-family: Arial, sans-serif;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }

        }

        .round-iframe {
            border-radius: 20px;
            width: 350px;
            height: 200px;
        }

        .rotatergb {
            animation: rotatergb 4s linear alternate infinite;
        }

        @keyframes rotatergb {
            from {
                filter: hue-rotate(0deg);
            }

            to {
                filter: hue-rotate(360deg)
            }
        }
        
        /* Estilo para o texto */
        .texto-animado {
            font-weight: bold;
            color: purple;
            font-size: 30px;
            animation: animarTexto 2s infinite alternate;
        }

        /* Animação do texto */
        @keyframes animarTexto {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.2);
            }
        }
        
        /* Estilo para o botão roxo */
.btn-roxo {
    background-color: purple;
    border-color: purple;
}

/* Estilo para o texto do botão roxo */
.btn-roxo:hover {
    background-color: darkpurple;
    border-color: darkpurple;
}


        /* Outros estilos específicos do login podem ser adicionados aqui */
    </style>
</head>
<body>
    <!-- Conteúdo HTML relacionado ao login -->
    <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
        <div class="container">
            <div class="col-15 d-flex align-items-center justify-content-center  ">

                <div class="" style="max-width: 500px; margin: auto; padding: 30px; border-radius: 20px; background: #212529;">
                    <center>
                        <div class="text-white">
                        
                        <div class="texto-animado">ShieldX VPN</div>
                        
                        
                        <h5>BEM VINDO</h5>
                        </div>
                    </center>
                    <br>
                    <form id="login-form" action="" method="POST" class="mt-1">
                        <center>
                            <!-- Form -->
                            <div class="form-group mb-4 text-white">
                                <label for="email">Usuário</label>
                                <div class="input-group">
                                    <input type="text" data-ls-module="charCounter" maxlength="10" class="form-control" style="border-radius: 10px;" placeholder="Usuário max 10 caracteres" name="login" autofocus required>
                                </div>
                            </div>
                            <!-- End of Form -->

                            <!-- Início Modal Cadastro -->
                            <div class="form-group">
                                <!-- Form -->
                                <div class="form-group mb-4 text-white">
                                    <label for="password">Senha</label>
                                    <div class="input-group">
                                        <input type="password" data-ls-module="charCounter" maxlength="10" placeholder="Senha max 10 caracteres" class="form-control " style="border-radius: 10px;" name="senha" required>
                                    </div>
                                </div>
                                <!-- End of Form -->

                                <div class="d-flex justify-content-between align-items-top mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="remember">
                                        <label class="form-check-label text-white mb-0" for="remember">
                                            Lembre-me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid texto-animado">
                            <button type="submit" name="btn_login" class="w-100 btn btn-lg btn-block btn-roxo d-flex align-items-center justify-content-center text-white text-center">
                            ENTRAR
                            </button>
                            <i id="spinner" class="fa fa-spinner fa-spin"></i>
                            </div>
                            <br>
                            
                            <a href="https://t.me/VEM_BRABO" target="_blank" rel="noopener noreferrer" style="color: purple; text-decoration: none; font-weight: bold;">CONTRATAR AQUI</a>
                            <br>

                            
                    </form>

                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <span class="fw-normal">
                            <a href="https://t.me/VEM_BRABO" class="fw-bold text-white">© PAINEL GERENCIADOR</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Adiciona o script do jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(function () {
                // Esconde o spinner quando a página é carregada
                $('#spinner').hide();
                // Adiciona o evento submit ao formulário
                $('#login-form').submit(function () {
                    // Mostra o spinner quando o formulário é enviado
                    $('#spinner').show();
                });
            });
        </script>

        <script language="JavaScript">
            function protegercodigo() {
                if (event.button == 2 || event.button == 3) {
                    alert('Codigo protegido!');
                }
            }
            document.onmousedown = protegercodigo
        </script>
        
        
        <script>
        // Se você quiser parar a animação após um tempo, pode adicionar este código JavaScript:
        setTimeout(function() {
            document.querySelector(".texto-animado").style.animation = "none";
        }, 50000); // Isso irá parar a animação após 5 segundos
    </script>
    
    
    
    </section>
</body>
</html>
<?php
}
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/rodape.php");
?>
