<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Layout</title>
        <meta name="author" content="Prof.: Xeo" >
        <meta name="Description" content="Layout padrão página html" >
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" >
        <link rel="stylesheet" type="text/css" href="../css/layout.css">
    </head>
    <body>
        <?php
        // iniciando sessao
        session_start();

        if (!isset($_SESSION['usuario']) == true && (!isset($_SESSION['senha']) == true)) {

            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('location: ../validacao.php');
        }

        $logado = $_SESSION['usuario'];
        $iduser = $_SESSION['id'];
        ?>

        <?php
        // include de aquivos para a formação da página
        include_once "header.php";
        include_once "nav.php";


        @$opcao = $_REQUEST['op'];

        switch ($opcao) {
            case 1:
                include_once 'servicos.php';
                break;
            case 2:
                include_once './clientes/clientes.php';
                break;
            case 3:
                include_once './produtos/produtos.php';
                break;
            case 4:
                include_once 'ajuda.php';
                break;
            case 5:
                include_once 'editar.php';
                break;
            default:
                include_once "content.php";
        }

        include_once "footer.php";
        ?>
    </body>
</html>