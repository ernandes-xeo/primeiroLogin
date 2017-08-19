<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css" >
        <link rel="stylesheet" type="text/css" href="css/layout.css" >
    </head>
    <body>
        <h1><a href="index.php"> voltar</a>  <span>Cadastre-se</span></h1>
        <form id='meuform' method="POST" action="validacao.php" >
            <fieldset> <legend>Cadastrar</legend>
                <label>Nome</label>
                <input id="nome" type="text" name="nome" required />
                
                <label>Usuário</label>
                <input id="user" type="text" name="user" required />
                
                 <label>E-mail</label>
                 <input id="email" type="email" name="email" required />

                <label> Senha:</label>
                <input type="password" id='senha' name="senha" required />

                <input class="botao" type="submit" name="botao" value="Cadastrar" />
                <input class='botao reset' type="reset" value="Limpar" onclick="document.getElementById('meuform').submit();" />

            </fieldset>
        </form>
    </body>
</html>