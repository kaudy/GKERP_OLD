<?php

require_once 'config.php';

//Recebimento dos dados do formulario do arquivo cad-fornecedor.php enviados
//pelo cad-forncedor.js 
$cnpj           = $_POST['cnpj'];
$razaoSocial    = $_POST['razaoSocial'];
$nomeFantasia   = $_POST['nomeFantasia'];
$inscEstadual   = $_POST['inscEstadual'];
$inscEstadualUF = $_POST['inscEstadualUF'];
$cep            = $_POST['cep'];
$endereco       = $_POST['endereco'];
$numero         = $_POST['numero'];
$complemento    = $_POST['complemento'];
$bairro         = $_POST['bairro'];
$cidade         = $_POST['cidade'];
$estado         = $_POST['estado'];
$pais           = '55';             // Pais sempre como 55-Brasil
$data           = new DateTime();   // Data Atual
$idUsuario      = '1';              // Usuario ADM=1 Modificar para pegar o usuario da sessão
$ativo          = 'S';              // Ativo - Fixo como Sim(S)


$query="UPDATE fornecedor "
        . "SET "
        . "razao_social = '$razaoSocial', "
        . "nome_fantasia = '$nomeFantasia', "
        . "inscricao_estadual = '$inscEstadual', "
        . " inscricao_estadual_id_estado = $inscEstadualUF, "
        . " cep = $cep, "
        . " endereco = '$endereco', "
        . " numero = '$numero', "
        . " complemento ='$complemento', "
        . " bairro = '$bairro', "
        . " id_cidade = '$cidade', "
        . " id_estado = $estado, "
        . " id_pais = $pais, "
        . " id_usuario_alteracao = $idUsuario, "
        . " data_alteracao = '".$data->format('Y-m-d H:i:s')."' "
        . "WHERE cnpj='$cnpj'";

//echo $query;

$resultado = $db->exec($query);

if($resultado>0)
{
    echo '{"status": "ok"}';
}else
{
    echo '{"status": "erro",'
        .'"msg":"Erro ao tentar atualizar os dados do fornecedor" }';
}