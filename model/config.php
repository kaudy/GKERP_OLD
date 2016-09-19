<?php
 session_name('gkerp-login');   //Sessão para verificaçao do usuario
 session_start();
 
$salt       ="GKerp";           //Chave para criaçao do hash para senhas
ini_set('display_errors', 1);
error_reporting(E_ALL);


/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:host=localhost;dbname=geekcake';
$user = 'root';
$password = '123456';

try {
    $db = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

