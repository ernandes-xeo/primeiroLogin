<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" >
        <title>Formulário</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css" >
        <link rel="stylesheet" type="text/css" href="css/layout.css" >
    </head>
    <body>
        <h1>Cadastre-se</h1>
        <form id='meuform' method="POST" action="validacao.php" >
            <fieldset> <legend>Cadastro</legend>
                <label>Usuário</label>
                <input id="nome" type="text" name="user" />

                <label> Senha:</label>
                <input type="password" id='senha' name="senha"></input>

                <input class="botao" type="submit" name="botao" value="Enviar" />
                <input class='botao reset' type="reset" value="Limpar" onclick="document.getElementById('meuform').submit();" />

            </fieldset>
        </form>
    </body>
</html>