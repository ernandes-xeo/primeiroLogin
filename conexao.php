<?php
/*
 * Conexao mysqli banco
 */

$host = 'localhost';
$database = 'banco_aula';
$user = 'root';
$password = '';
/*
 * host, user, password, banco_de_dados
 */    
$mysqli = new mysqli($host,$user,$password, $database);
// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno())
    trigger_error(mysqli_connect_error());


