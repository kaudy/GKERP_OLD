<?php
require_once 'config.php';

//Recebimento dos dados do formulario do arquivo cad-fornecedor.php enviados
//pelo cad-forncedor.js 
$cnpj           = $_POST['cnpj'];
$razaoSocial    = $_POST['razaoSocial'];
$nomeFantasia   = $_POST['nomeFantasia'];
$inscEstadual   = $_POST['inscEstadual'];
$inscEstadualUF = $_POST['inscEstadualUF'];
$data           = new DateTime();   // Data Atual
$idUsuario      = '1';              // Usuario ADM=1 Modificar para pegar o usuario da sessão
$ativo          = 'S';              // Ativo - Fixo como Sim(S)


//Caso inscrição estadual esteja vazia considera-se como isento
if($inscEstadual=='')
{
    $inscEstadual = "ISENTO";
}


$query = "INSERT INTO fornecedor "
            . "(cnpj,"
            . " razao_social,"
            . " nome_fantasia,"
            . " inscricao_estadual,"
            . " inscricao_estadual_id_estado,"            
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
        .'"msg":"Erro ao tentar Cadastrar o fornecedor" }';
}