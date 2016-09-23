<?php
require_once 'config.php';

$id_fornecedor = $_POST['id_fornecedor'];
//$cnpj = '66542282000167';

$query = "SELECT * FROM email_fornecedor WHERE id_fornecedor=".$id_fornecedor;

$resultado = $db->query($query);
$emailsFornecedor = $resultado->fetchAll(PDO::FETCH_ASSOC);

if(count($emailsFornecedor)>0)
{
    $array['emailsfornecedor']=$emailsFornecedor;   //dados de emails

    //retorno
    $controleRetorno['status']='ok';                //Retorno de sucesso
    $controleRetorno['quantemails']=count($emailsFornecedor);//Quantidade de e-mails
    $array['controleretorno']=$controleRetorno;
    //retorna o json para o javascript
    echo json_encode($array);    
}else
{
    //retorno
    $controleRetorno['status']='erro';
    $controleRetorno['msg']='Erro ao carregar os e-mails do fornecedor '
                            . 'ou fornecedor não possui e-mails!';
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