$(document).ready(function ()
{
    // Cadastrar - envia o formulário para cadastrar novo fornecedor no --------
    // banco de dados
    $('#btnAdicionar').click(function ()
    {
        var dados =
                {
                    cnpj: $('#txtCNPJ').val(),
                    razaoSocial: $('#txtRazaoSocial').val(),
                    nomeFantasia: $('#txtNomeFantasia').val(),
                    inscEstadual: $('#txtInscEstadual').val(),
                    inscEstadualUF: $('#slctInscEstadualUF').val()
                };

        $.post('./model/cadastrarFornecedor.php', dados, function (retorno)
        {
            var json = JSON.parse(retorno);

            if (json.status == 'ok')
            {
                notifyMe('Cadastro do fornecedor realizado!');                

            } else if (json.status == 'erro')
            {
                notifyMe('Erro ao realizar o cadastro -- ' + json.msg);
            }
        });
    });
    //--------------------------------------------------------------------------
    
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

        $.post('./model/atualizarFornecedor.php', dados, function (retorno)
        {
            var json = JSON.parse(retorno);

            if (json.status == 'ok')
            {
                notifyMe('Atualizado os dados do fornecedor!');
                //location.href = 'view-fornecedor.php';

            } else if (json.status == 'erro')
            {
                notifyMe('Erro ao realizar o cadastro -- ' + json.msg);
            }
        });
    });
    
    //Cancela o form e apaga todos os dados ------------------------------------
    $('#btnCancelar').click(function ()
    {
        limpaCampos(true);

    });

//Validação do campo CNPJ ------------------------------------------------------

    $('#txtCNPJ').focusout(function ()
    {
        var retorno = validarCNPJ($('#txtCNPJ').val());

        if (retorno == false)
        {
            $('#txtCNPJ').parent().parent().addClass('has-error');
            $('#txtCNPJ').val('');
            $('#txtCNPJ').attr('placeholder', 'CNPJ Invalido');
            limpaCampos(true);
        } else
        {
            //Envia dados para model/verificaCnpjFornecedor.php e retorna se 
            //cnpj já existe no banco de dados
            var dados =
                    {
                        cnpj: $('#txtCNPJ').val()
                    };

            $.post('./model/verificarCnpjFornecedor.php', dados, function (retorno)
            {
               console.log(retorno);
                var json = JSON.parse(retorno);                 

                if (json.controleretorno.status == 'ok')
                {    
                    //Caso cnpj ja esteja cadastrado retorna os dados
                    $('#txtRazaoSocial').val(json.dadosfornecedor[0].razao_social);
                    $('#txtNomeFantasia').val(json.dadosfornecedor[0].nome_fantasia);
                    $('#txtInscEstadual').val(json.dadosfornecedor[0].inscricao_estadual);
                    $('#slctInscEstadualUF').val(json.dadosfornecedor[0].inscricao_estadual_id_estado);
                    
                    //Desativa botão de cadastrar novo e ativa botão de salvar(atualizar)
                    $('#btnAdicionar').addClass('hide');
                    $('#btnSalvar').removeClass('hide');
                    $('#menu-tab-fornecedor li.hide').removeClass('hide');
                    

                } else if (json.controleretorno.status == 'erro')
                {
                    notifyMe(json.controleretorno.msg);
                    
                    limpaCampos(false);
                }
            });

            //Limpa o campo caso tenha algum alerta de erro
            $('#txtCNPJ').parent().parent().removeClass('has-error');
            $('#txtCNPJ').attr('placeholder', 'Insira o CNPJ');
        }
    });


//-------------------------------------------------------------------------------------------------
/*** Retorna os dados para modo original
 *  @param: limpacnpj 
 *  @type: boolean
 *  paramentro caso sim limpa o campo txtCNPJ tambem    
 */
//-------------------------------------------------------------------------------------------------
    function limpaCampos(limpacnpj)
    {
        if(limpacnpj==true)
        {
            $('#txtCNPJ').val('');
        }        
        $('#txtRazaoSocial').val('');
        $('#txtNomeFantasia').val('');
        $('#txtInscEstadual').val('');
        $('#txtCNPJ').parent().parent().removeClass('has-error');
        $('#txtCNPJ').attr('placeholder', 'Insira o CNPJ');
        $('#btnSalvar').addClass('hide');
        $('#btnAdicionar').removeClass('hide');
        $('#menu-tab-fornecedor-endereco').addClass('hide');
        $('#menu-tab-fornecedor-emails').addClass('hide');
        $('#menu-tab-fornecedor-telefones').addClass('hide');        
    }




//-------------------------------------------------------------------------------------------------
// Gera notificações no desktop
//-------------------------------------------------------------------------------------------------
    function notifyMe(texto) 
    {
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