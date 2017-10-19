<?php
$id = $_SESSION['id'];
$usuario = $_SESSION['usuario'];
$nome = $_SESSION['nome'];
$mail = $_SESSION['mail'];
//$senha = $_SESSION['senha'];
?>
<section id="main">
    <div class="main-contener">
        <h2>Editar Cadastro</h2>
        <form id='meuform' method="POST" action="../validacao.php" >
            <fieldset> <legend>Cadastrar</legend>
                <input type="hidden" name="id" value="<?php echo $id?>" />
                <label>Nome</label>
                <input id="nome" type="text" name="nome" value="<?php echo $nome ?>" />

                <label>Usuário</label>
                <input id="user" type="text" name="user" value="<?php echo $usuario ?>" />

                <label>E-mail</label>
                <input id="email" type="email" name="email" value="<?php echo $mail ?>" />

                <label> Senha:</label>
                <input type="password" id='senha' name="senha" value="" />

                <input class="botao" type="submit" name="botao" value="Salvar" />

            </fieldset>
        </form>
    </div>
    <section id='left-destaques'>Left com destaques</section>
</section>