<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
require_once($_SERVER['DOCUMENT_ROOT'] . "/config/funcoes.php");
isLogged($sid); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Acesso</title>
    <!-- Adicione o link para o CSS do Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Adicione seu CSS personalizado aqui */
        body {
            padding: 20px;
        }

        /* Estilo monoespaçado para as informações geradas */
        .monoespaco {
            font-family: "Courier New", Courier, monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerador de Acesso</h1>
        <form>
            <div class="mb-3">
                <label for="usuario" class="form-label">Nome de Usuário (máx. 10 caracteres):</label>
                <input type="text" class="form-control" id="usuario" name="usuario" maxlength="10" required>
            </div>
            <div class="mb-3">
                <label for="login" class="form-label">Login (máx. 10 caracteres):</label>
                <input type="text" class="form-control" id="login" name="login" readonly>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha (máx. 10 caracteres):</label>
                <input type="text" class="form-control" id="senha" name="senha" readonly>
            </div>
            <div class="mb-3">
                <label for="site" class="form-label">Link para o Site:</label>
                <input type="text" class="form-control" id="site" name="site" value="https://shieldx.alphi.media" readonly>
            </div>
            <div class="mb-3">
                <label for="data-inicio" class="form-label">Data de Início:</label>
                <input type="date" class="form-control" id="data-inicio" name="data-inicio" required>
            </div>
            <div class="mb-3">
                <label for="data-expiracao" class="form-label">Data de Expiração:</label>
                <input type="date" class="form-control" id="data-expiracao" name="data-expiracao" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="gerarAcesso()">Gerar Acesso</button>
        </form>

        <!-- Div para exibir informações geradas -->
        <div id="informacoes-geradas" style="display: none;">
            <h2>Informações Geradas:</h2>
            <p><strong>Nome de Usuário:</strong> <span id="usuario-gerado" class="monoespaco"></span></p>
            <p><strong>Login:</strong> <span id="login-gerado" class="monoespaco"></span></p>
            <p><strong>Senha:</strong> <span id="senha-gerada" class="monoespaco"></span></p>
            <p><strong>Link para o Site:</strong> <span id="site-gerado" class="monoespaco"></span></p>
            <p><strong>Data de Início:</strong> <span id="data-inicio-gerado" class="monoespaco"></span></p>
            <p><strong>Data de Expiração:</strong> <span id="data-expiracao-gerado" class="monoespaco"></span></p>
            <p><strong>Dias entre as datas:</strong> <span id="dias-entre-datas" class="monoespaco"></span></p>
            <button type="button" class="btn btn-secondary" onclick="copiarTextoGerado()">Copiar Texto Gerado</button>
        </div>
    </div>

    <!-- Adicione os scripts do Bootstrap 5 e JavaScript personalizado -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const loginsGerados = new Set();

        function gerarSenhaAleatoria() {
            const caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            let senha = "";
            for (let i = 0; i < 10; i++) {
                const randomIndex = Math.floor(Math.random() * caracteres.length);
                senha += caracteres.charAt(randomIndex);
            }
            return senha;
        }

        function gerarLoginUnico() {
            let login;
            do {
                login = gerarSenhaAleatoria().substring(0, 10); // Limita a 10 caracteres
            } while (loginsGerados.has(login));
            loginsGerados.add(login);
            return login;
        }

        function formatarData(data) {
            const partes = data.split("-");
            return `${partes[2]}/${partes[1]}/${partes[0]}`;
        }

        function calcularDiasEntreDatas(dataInicio, dataFim) {
            const data1 = new Date(dataInicio);
            const data2 = new Date(dataFim);
            const diferencaEmDias = Math.floor((data2 - data1) / (1000 * 60 * 60 * 24));
            return diferencaEmDias;
        }

        function gerarAcesso() {
            const usuario = document.getElementById("usuario").value.substring(0, 10); // Limita a 10 caracteres
            const login = gerarLoginUnico();
            const senha = gerarSenhaAleatoria().substring(0, 10); // Limita a 10 caracteres
            const dataInicio = formatarData(document.getElementById("data-inicio").value);
            const dataExpiracao = formatarData(document.getElementById("data-expiracao").value);
            const diasEntreDatas = calcularDiasEntreDatas(dataInicio, dataExpiracao);

            document.getElementById("login").value = login;
            document.getElementById("senha").value = senha;

            // Exibir as informações geradas em formato monoespaçado
            document.getElementById("usuario-gerado").textContent = usuario;
            document.getElementById("login-gerado").textContent = login;
            document.getElementById("senha-gerada").textContent = senha;
            document.getElementById("site-gerado").textContent = "https://shieldx.alphi.media";
            document.getElementById("data-inicio-gerado").textContent = dataInicio;
            document.getElementById("data-expiracao-gerado").textContent = dataExpiracao;
            document.getElementById("dias-entre-datas").textContent = diasEntreDatas;

            document.getElementById("informacoes-geradas").style.display = "block";
        }

        function copiarTextoGerado() {
            const usuario = document.getElementById("usuario-gerado").textContent;
            const login = document.getElementById("login-gerado").textContent;
            const senha = document.getElementById("senha-gerada").textContent;
            const site = document.getElementById("site-gerado").textContent;
            const dataInicio = document.getElementById("data-inicio-gerado").textContent;
            const dataExpiracao = document.getElementById("data-expiracao-gerado").textContent;
            const diasEntreDatas = document.getElementById("dias-entre-datas").textContent;

            const textoGerado = `Nome de Usuário: ${usuario}\n` +
                               `Login: ${login}\n` +
                               `Senha: ${senha}\n` +
                               `Link para o Site: ${site}\n` +
                               `Data de Início: ${dataInicio}\n` +
                               `Data de Expiração: ${dataExpiracao}\n` +
                               `Dias entre as datas: ${diasEntreDatas}`;
            const textArea = document.createElement("textarea");
            textArea.value = textoGerado;
            textArea.classList.add("monoespaco"); // Aplica o estilo monoespaçado à área de texto
            textArea.setAttribute("readonly", ""); // Torna a área de texto somente leitura
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand("copy");
            document.body.removeChild(textArea);
            alert("Texto gerado copiado para a área de transferência.");
        }
    </script>
</body>
</html>
