<?php
// incluindo conexao php
include_once 'conexao.php';

// início de sessão php
session_start();

// verificação se a variavel login nao está vazia
if (!empty($_POST['user'])) {
    @$user = $_POST['user'];
}

// verifica se a senha nao está vazia
if (!empty($_POST['senha']))
    $senha = md5($_POST['senha']);

/* Opção de escolha do usuário */
if ($_REQUEST['botao'])
    @$botao = $_REQUEST['botao'];


switch ($botao) {
    case 'Entrar':
        // consulta banco de dados
        // query select com table usuario
        $sql = "select * from usuario where usuario = '$user' and senha = '$senha'";
        $result = $mysqli->query($sql);

        while ($row = $result->fetch_object()) {
            $bdid = $row->id;
            $bduser = $row->usuario;
            $bdnome = $row->nome;
            $bdmail = $row->mail;
            $bdsenha = $row->senha;
        }
        $mysqli->close();

        if ($user === $bduser && $senha === $bdsenha) {
            $_SESSION['id'] = $bdid;
            $_SESSION['usuario'] = $bduser;
            $_SESSION['nome'] = $bdnome;
            $_SESSION['mail'] = $bdmail;
            $_SESSION['senha'] = $bdsenha;
            
            $url = 'location:view/index.php';
            header($url);
        } else {
            header("location:index.php");
        }
        break;
    case 'Cadastrar':
        $nome = $_POST['nome'];
        $user = $_POST['user'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $stmt = $mysqli->prepare("INSERT INTO usuario (usuario, nome, mail, senha) VALUES (?, ?, ?, ?)");
        /*
          Type specification chars
          Character	Description
          i	corresponding variable has type integer
          d	corresponding variable has type double
          s	corresponding variable has type string
          b	corresponding variable is a blob and will be sent in packets
         */
        $stmt->bind_param("ssss", $user, $nome, $email, $senha);

        /* execute prepared statement */
        if ($stmt->execute()) {
            $_SESSION['cadastro'] = 1;
            header("location:index.php");
        }
        /* Fecha a conexao com o banco */
        $stmt->close();
        break;
    case 'editar':
        
        $iduser = $_GET['id'];
        $stmt = $mysqli->prepare("select * from usuario where id=?");
        $stmt->bind_param('d', $iduser);
        $stmt->execute();
        $stmt->bind_result($id, $usuario, $nome, $mail, md5($senha));
        /* fetch values */
        while ($stmt->fetch()) {
            $_SESSION['id'] = $id;
            $_SESSION['usuario'] = $usuario;
            $_SESSION['nome'] = $nome;
            $_SESSION['mail'] = $mail;
            $_SESSION['senha'] = $senha;
        }
        
        header("location:view/index.php?op=5");
        break;
    case "Salvar":
        $iduser = $_REQUEST['id'];
		$nome = $_REQUEST['nome'];
		$stmt = $mysqli->prepare("update usuario set nome =? where id = ?");
        $stmt->bind_param('sd', $nome, $iduser);
        
		if($stmt->execute()){
			$url = 'location:view/index.php';
            header($url);
		}
        break;
    case 'sair':
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        unset($_SESSION);
        header("location:index.php");
        break;

    default:
        header("location:index.php");
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header("location:index.php");
}