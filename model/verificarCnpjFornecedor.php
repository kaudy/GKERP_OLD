<?php
require_once 'config.php';

//Recebimento do CNPJ para verificação 
$cnpj = $_POST['cnpj'];
//$cnpj = '66542282000167';

$query = "SELECT * FROM fornecedor WHERE cnpj='$cnpj' LIMIT 1";

$resultado = $db->query($query);
$dadosFornecedor = $resultado->fetchAll(PDO::FETCH_ASSOC);

if(count($dadosFornecedor)>0)
{
    $query = "SELECT * FROM geekcake.email_fornecedor WHERE id_fornecedor=".$dadosFornecedor[0]['id'];
        
    $resultado2 = $db->query($query);
    $emailsFornecedor = $resultado2->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($emailsFornecedor)>0)
    {
        $array['dadosfornecedor']=$dadosFornecedor;     //dados gerais
        $array['emailsfornecedor']=$emailsFornecedor;   //dados de emails
        
        //retorno
        $controleRetorno['status']='ok';           
        $array['controleretorno']=$controleRetorno;
        //retorna o json para o javascript
        echo json_encode($array);    
    }else
    {
        $array['dadosfornecedor']=$dadosFornecedor;     //dados gerais
        //retorno
        $controleRetorno['status']='ok';           
        $array['controleretorno']=$controleRetorno;
        echo json_encode($array);
    }
}else
{
    $controleRetorno['status']='erro';
    $controleRetorno['msg']='CNPJ não cadastrado!';
    $array['controleretorno']=$controleRetorno;
    echo json_encode($array);
}








/*
if(count($lista)>0)
{
    echo '{"status": "ok","razaosocial: "'.$dadosFornecedor[0]['razao_social'].'"}';
}else
{
    echo '{"status": "erro",'
        .'"msg":"Erro ao tentar Cadastrar o fornecedor" }';
}
*/