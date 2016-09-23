$(document).ready(function ()
{
    // Cadastrar - envia o formulário para cadastrar novo fornecedor no --------
    // banco de dados
    $('#btnAdicionar').click(function ()
    {
        verificaCampoCnpj();
        verificaCampoRazaoSocial();
        verificaCampoNomeFantasia();
        
        /*
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
                notifyMe(json.msg);
            }
        });*/
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
                notifyMe(json.msg);

            }
        });
    });

    //Cancela o form e apaga todos os dados ------------------------------------
    $('#btnCancelar').click(function ()
    {
        limpaCampos(true,true,true);

    });

    //Validação do campo CNPJ quando perder o foco -----------------------------
    $('#txtCNPJ').focusout(function ()
    {
        verificaCampoCnpj();
    });
    
    //Validação do campo Razão Social quando perder o foco ---------------------
    $('#txtRazaoSocial').focusout(function ()
    {
        verificaCampoRazaoSocial();
    });
    
    //Validação do campo Nome Fantasia quando perder o foco --------------------
    $('#txtNomeFantasia').focusout(function ()
    {
        verificaCampoNomeFantasia();
    });
    


//Verifica o campo CNPJ --------------------------------------------------------    
    function verificaCampoCnpj()
    {
        var retorno = validarCNPJ($('#txtCNPJ').val());
        
        if (retorno == false)
        {           
            $('#txtCNPJ').parent().parent().addClass('has-error');
            $('#txtCNPJ').val('');
            $('#txtCNPJ').attr('placeholder', 'CNPJ Invalido');
            limpaCampos(true,false,false);
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

                var json = JSON.parse(retorno);
                console.log(json);
                if (json.controleretorno.status == 'ok')
                {
                    //Caso cnpj ja esteja cadastrado retorna os dados
                    $('#txtId').val(json.dadosfornecedor[0].id);
                    $('#txtRazaoSocial').val(json.dadosfornecedor[0].razao_social);
                    $('#txtNomeFantasia').val(json.dadosfornecedor[0].nome_fantasia);
                    $('#txtInscEstadual').val(json.dadosfornecedor[0].inscricao_estadual);
                    $('#slctInscEstadualUF').val(json.dadosfornecedor[0].inscricao_estadual_id_estado);
                    $('#txtCEP').val(json.dadosfornecedor[0].cep);
                    $('#txtEndereco').val(json.dadosfornecedor[0].endereco);
                    $('#txtNumero').val(json.dadosfornecedor[0].numero);
                    $('#txtComplemento').val(json.dadosfornecedor[0].complemento);
                    $('#txtBairro').val(json.dadosfornecedor[0].bairro);
                    $('#txtCidade').val(json.dadosfornecedor[0].id_cidade);
                    $('#slctUF').val(json.dadosfornecedor[0].id_estado);

                    //Desativa botão de cadastrar novo e ativa botão de salvar(atualizar)
                    $('#btnAdicionar').addClass('hide');
                    $('#btnSalvar').removeClass('hide');
                    $('#menu-tab-fornecedor li.hide').removeClass('hide');


                } else if (json.controleretorno.status == 'erro')
                {
                    notifyMe(json.controleretorno.msg);

                    limpaCampos(false,false,false);
                }
            });

            //Limpa o campo caso tenha algum alerta de erro
            $('#txtCNPJ').parent().parent().removeClass('has-error');
            $('#txtCNPJ').attr('placeholder', 'Insira o CNPJ');
        }
    }
    
    //Verifica o campo Razão Social --------------------------------------------
    function verificaCampoRazaoSocial()
    {        
        if($('#txtRazaoSocial').val()=='')
        {
            $('#txtRazaoSocial').parent().parent().addClass('has-error');
            $('#txtRazaoSocial').val('');
            $('#txtRazaoSocial').attr('placeholder', 'Razão Social precisa ser preenchida');            
        }else
        {
            //Limpa o campo caso tenha algum alerta de erro
            $('#txtRazaoSocial').parent().parent().removeClass('has-error');
            $('#txtRazaoSocial').attr('placeholder', 'Razão Social');
        }
    }

    //Verifica o campo Nome Fantasia -------------------------------------------
    function verificaCampoNomeFantasia()
    {        
        if($('#txtNomeFantasia').val()=='')
        {
            $('#txtNomeFantasia').parent().parent().addClass('has-error');
            $('#txtNomeFantasia').val('');
            $('#txtNomeFantasia').attr('placeholder', 'Nome Fantasia precisa ser preenchido');            
        }else
        {
            //Limpa o campo caso tenha algum alerta de erro
            $('#txtNomeFantasia').parent().parent().removeClass('has-error');
            $('#txtNomeFantasia').attr('placeholder', 'Nome Fantasia');
        }
    }






//-------------------------------------------------------------------------------------------------
    /*** Retorna os dados para modo original
     *  @param: limpacnpj,  limparazaosocial
     *  @type: boolean
     *  paramentro caso sim limpa o campo de cada parametro tambem    
     */
//-------------------------------------------------------------------------------------------------
    function limpaCampos(limpacnpj,limparazaosocial,limpanomefantasia)
    {
        if (limpacnpj == true)
        {
            $('#txtCNPJ').val('');
        }else
        {
            $('#txtCNPJ').parent().parent().removeClass('has-error');
            $('#txtCNPJ').attr('placeholder', 'Insira o CNPJ'); 
        }
        
        if(limparazaosocial==true)
        {
            $('#txtRazaoSocial').val('');
        }else
        {
            $('#txtRazaoSocial').parent().parent().removeClass('has-error');
            $('#txtRazaoSocial').attr('placeholder', 'Razão Social');
        }
        
        if(limpanomefantasia==true)
        {
            $('#txtNomeFantasia').val('');
        }else
        {
            $('#txtNomeFantasia').parent().parent().removeClass('has-error');
            $('#txtNomeFantasia').attr('placeholder', 'Nome Fantasia');
        }
        
        $('#txtId').val(''); 
        $('#txtInscEstadual').val('');        
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