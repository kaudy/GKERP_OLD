$(document).ready(function ()
{  
    //Salvar - envia o formulário para ser salvo no banco de dados
    $('#btnSalvar').click(function ()
    {
        var dados =
                {
                    cnpj: $('#txtCNPJ').val(),
                    razaoSocial: $('#txtRazaoSocial').val(),
                    nomeFantasia: $('#txtNomeFantasia').val(),
                    inscEstadual: $('#txtInscEstadual').val(),
                    inscEstadualUF: $('#slctInscEstadualUF').val(),
                    cep: $('#txtCEP').val(),
                    endereco: $('#txtEndereco').val(),
                    numero: $('#txtNumero').val(),
                    complemento: $('#txtComplemento').val(),
                    bairro: $('#txtBairro').val(),
                    cidade: $('#txtCidade').val(),
                    estado: $('#slctUF').val()
                };

        $.post('./model/cadastrarFornecedor.php', dados, function (retorno)
        {
            var json = JSON.parse(retorno);

            if (json.status == 'ok')
            {
                notifyMe('Cadastro do fornecedor realizado!');
                location.href = 'view-fornecedor.php';

            } else if (json.status == 'erro')
            {
                notifyMe('Erro ao realizar o cadastro -- ' + json.msg);
            }
        });
    });
 //Cancela o form e apaga todos os dados ----------------------------------------------------------
 
 $('#btnCancelar').click(function ()
 {
    $('#txtCNPJ').val(''); 
    $('#txtRazaoSocial').val('');
    $('#txtNomeFantasia').val('');
    $('#txtInscEstadual').val('');
    $('#txtCNPJ').parent().parent().removeClass('has-error');
    $('#txtCNPJ').attr('placeholder','Insira o CNPJ');
     
 });
 
    
//Validação do campo CNPJ -------------------------------------------------------------------------
    
    $('#txtCNPJ').focusout(function ()
    {  
        var retorno = validarCNPJ($('#txtCNPJ').val());
        
         console.log(retorno);
        
        if(retorno == false)
        {
            $('#txtCNPJ').parent().parent().addClass('has-error');
            $('#txtCNPJ').val('');
            $('#txtCNPJ').attr('placeholder','CNPJ Invalido');
        }else
        {
            $('#txtCNPJ').parent().parent().removeClass('has-error');
            $('#txtCNPJ').attr('placeholder','Insira o CNPJ');           
        }        
    });
    
    

















//-------------------------------------------------------------------------------------------------
    function notifyMe(texto) {
        // Let's check if the browser supports notifications
        if (!("Notification" in window)) {
            alert("Este navegador nao suporta notificações na área de trabalho( Use o Google Chrome ou Firefox)");
        }

        // Let's check whether notification permissions have already been granted
        else if (Notification.permission === "granted") {
            // If it's okay let's create a notification
            var notification = new Notification(texto);
        }

        // Otherwise, we need to ask the user for permission
        else if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {
                // If the user accepts, let's create a notification
                if (permission === "granted") {
                    var notification = new Notification(texto);
                }
            });
        }

        // At last, if the user has denied notifications, and you 
        // want to be respectful there is no need to bother them any more.
    }
});
