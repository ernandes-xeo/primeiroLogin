<?php

// incluindo conexao php
include_once 'conexao.php';

// início de sessão php
session_start();

// verificação se a variavel login nao está vazia
if (!empty($_POST['user'])) {
    @$nome = $_POST['user'];
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
        $sql = "select * from usuario where usuario = '$nome' and senha = '$senha'";
        $result = $mysqli->query($sql);
        while ($row = $result->fetch_object()) {
            $bdnome = $row->usuario;
            $bdsenha = $row->senha;
        }
        $mysqli->close();

        if ($nome === $bdnome && $senha === $bdsenha) {
            $_SESSION['usuario'] = $nome;
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
        $stmt->bind_param("ssss",$user, $nome, $email, $senha);

        /* execute prepared statement */
        if ($stmt->execute()){
            $_SESSION['cadastro'] = 1; 
            header("location:index.php");
        }
        /* Fecha a conexao com o banco */
        $stmt->close();
        break;
    case 'sair':
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header("location:index.php");
        break;

    default:
        header("location:index.php");
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header("location:index.php");
}