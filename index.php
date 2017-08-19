<?php 
    
    session_start();
    
?>
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
        
        <h1><span>Login</span>  <a href="cadastrar.php">Cadastre-se</a></h1>
        <form id='meuform' method="POST" action="validacao.php" >
            <fieldset> <legend>Login</legend>
                <label>Usuário</label>
                <input id="nome" type="text" name="user" />

                <label> Senha:</label>
                <input type="password" id='senha' name="senha"></input>

                <input class="botao" type="submit" name="botao" value="Entrar" />
                <input class='botao reset' type="reset" value="Limpar" onclick="document.getElementById('meuform').submit();" />

            </fieldset>
        </form>
        
        <?php
        if(@$_SESSION['cadastro']){
          echo "<h1>Cadastro realizado com sucesso!</h1>";
          session_destroy();
        }
        
        ?>
    </body>
</html>