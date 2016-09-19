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


$query = "INSERT INTO fornecedor "
            . "(cnpj,"
            . " razao_social,"
            . " nome_fantasia,"
            . " inscricao_estadual,"
            . " inscricao_estadual_id_estado,"
            . " cep,"        
            . " endereco,"
            . " numero,"
            . " complemento,"            
            . " bairro,"
            . " id_cidade,"
            . " id_estado,"            
            . " id_pais,"
            . " id_usuario_cadastro,"
            . " data_cadastro,"
            . " ativo"
            . ") ".
         "VALUES ("
            . "'$cnpj',"
            . "'$razaoSocial',"
            . "'$nomeFantasia',"
            . "'$inscEstadual',"
            . "'$inscEstadualUF',"
            . "'$cep',"
            . "'$endereco',"
            . "'$numero',"
            . "'$complemento',"
            . "'$bairro',"
            . "'$cidade',"
            . "'$estado',"
            . "'$pais',"
            . "'$idUsuario',"
            . "'".$data->format('Y-m-d H:i:s')."',"
            . "'$ativo')";

$resultado = $db->exec($query);

if($resultado>0)
{
    echo '{"status": "ok"}';
}else
{
    echo '{"status": "erro",'
        .'"msg":"Erro ao tentar inserir a OS" }';
}