<?php

// início de sessão php
session_start();

// verificação se o login nao está vazio
if (!empty($_POST['user'])) {
    $nome = $_POST['user'];
}

// verifica se a senha nao está vazia
if (!empty($_POST['senha']))
    $senha = $_POST['senha'];


if($nome === "ernandes" && $senha === "12345"){
    $_SESSION['usuario'] = $nome;
    $_SESSION['senha'] = $senha;
    
    $url = 'location:view/index.php';
    header($url);
    
    
}else{
     unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header("location:index.php");
}