<?php

// incluindo conexao php
include_once 'conexao.php';

// início de sessão php
session_start();
// verificação se o login nao está vazio
if (!empty($_POST['user'])) {
    $nome = $_POST['user'];
}

// verifica se a senha nao está vazia
if (!empty($_POST['senha']))
    $senha = md5($_POST['senha']);

// valida botao
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
        }
        break;

    case 'sair':
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header("location:index.php");
        break;

    default:
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header("location:index.php");
        break;
}