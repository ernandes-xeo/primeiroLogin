<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<title>Layout</title>
	<meta name="author" content="Prof.: Xeo" >
	<meta name="Description" content="Layout padrão página html" >
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
    ?>

    <?php
            // include de aquivos para a formação da página
            include_once "header.php";
            include_once "nav.php";
            include_once "content.php";
            $opcao = $_REQUEST['op'];
            switch ($opcao){
            case 1:
                
            break;
            case 2:
            break;
            case 3:
            break;
            case 4:
            break;        
            default:
                include_once "content.php";
            }
            
            include_once "footer.php";	
    ?>
</body>
</html>