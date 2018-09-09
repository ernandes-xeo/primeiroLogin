<?php
/**
 * PHP COM PDO
 * TrabalhandoSessao2/conexao.php
 * Prof.: Xeo
 */
$host = 'localhost';
$banco = 'banco_aula';
$user = 'root';
$senha = '';
    
try{
    
    $conexao = new PDO("mysql:host=".$host.";dbname=".$banco."", "".$user."", "".$senha."");     
   // echo "ok";
} catch (PDOException $e) {
    print_r($e);
    echo "Erro " . $e->getMessage(); 
}

?>

