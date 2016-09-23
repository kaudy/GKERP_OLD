<?php
require_once 'config.php';

//Recebimento dos dados do formulario do arquivo cad-fornecedor.php enviados
//pelo cad-forncedor.js 

$id_fornecedor  = $_POST['id_fornecedor'];
$cnpj           = $_POST['cnpj'];
$email          = $_POST['email'];
$ativo          = $_POST['ativo'];
$data           = new DateTime();   // Data Atual
$idUsuario      = '1';              // Usuario ADM=1 Modificar para pegar o usuario da sessão

$query = "INSERT INTO email_fornecedor"
            . "(id_fornecedor,"
            . " email,"
            . " ativo,"           
            . " id_usuario_cadastro,"
            . " data_cadastro"            
            . ") ".
         "VALUES ("
            . "'$id_fornecedor',"
            . "'$email',"
            . "'$ativo',"                     
            . "'$idUsuario',"
            . "'".$data->format('Y-m-d H:i:s')."')";

$resultado = $db->exec($query);
$ultimoId = $db->lastInsertId();


if($resultado>0)
{
    echo '{"status": "ok","ultimoid": "'.$ultimoId.'"}';
}else
{
    echo '{"status": "erro",'
        .'"msg":"Erro ao tentar Cadastrar um novo e-mail para o fornecedor" }';
}