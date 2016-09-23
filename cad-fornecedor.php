<?php ?>
<html>
    <head>
        <title>GKERP - Cadastro de Fornecedores</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquerymin.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/funcoes.js" type="text/javascript"></script>
        <script src="js/cad-fornecedor.js" type="text/javascript"></script>
    </head>
    <body>

        <!-- Static navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">GK-ERP</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Principal</a></li>
                        <li class=""><a href="cad-fornecedor.php">Fornecedor</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#modal-abrir">Help</a></li>                          
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a id="logout" href="#">Logout </a>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <!-- Fim do menu de navegação -------------------------------------------------------------------->

        
            <!-- Form Name -->
            <legend>Cadastro Fornecedor</legend>
            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist" id="menu-tab-fornecedor">
                    <li role="presentation" class="active" id="menu-tab-fornecedor-geral">
                        <a href="#fornecedor-tab-geral" aria-controls="fornecedor-tab-geral" role="tab" data-toggle="tab">Geral</a>
                    </li>
                    <li role="presentation" class="hide" id="menu-tab-fornecedor-endereco">
                        <a href="#fornecedor-tab-endereco" aria-controls="fornecedor-tab-endereco" role="tab" data-toggle="tab">Endereço</a>
                    </li>
                    <li role="presentation" class="hide" id="menu-tab-fornecedor-emails">
                        <a href="#fornecedor-tab-emails" aria-controls="fornecedor-tab-emails" role="tab" data-toggle="tab">E-mails</a>
                    </li>
                    <li role="presentation" class="hide" id="menu-tab-fornecedor-telefones">
                        <a href="#fornecedor-tab-telefones" aria-controls="fornecedor-tab-telefones" role="tab" data-toggle="tab">Telefones</a>
                    </li>                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="fornecedor-tab-geral">
                        <form class="form-horizontal" id="form-cad-fornecedor-geral">
                            <fieldset>
                                <input type="hidden" id="txtId" value="">
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="txtCNPJ">CNPJ*</label>  
                                    <div class="col-md-4">
                                        <input id="txtCNPJ" name="txtCNPJ" type="text" placeholder="Insira o CNPJ" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="txtRazaoSocial">Razão Social*</label>  
                                    <div class="col-md-4">
                                        <input id="txtRazaoSocial" name="txtRazaoSocial" type="text" placeholder="Razão Social" class="form-control input-md" >
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="txtNomeFantasia">Nome Fantasia*</label>  
                                    <div class="col-md-4">
                                        <input id="txtNomeFantasia" name="txtNomeFantasia" type="text" placeholder="Nome Fantasia" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="txtInscEstadual">Inscrição Estadual</label>  
                                    <div class="col-md-4">
                                        <input id="txtInscEstadual" name="txtInscEstadual" type="text" placeholder="Inscrição Estadual - (Caso seja ISENTO deixar em branco)" class="form-control input-md">
                                    </div>
                                </div>                

                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="slctInscEstadualUF">Insc. Estadual UF</label>
                                    <div class="col-md-4">
                                        <select id="slctInscEstadualUF" name="slctInscEstadualUF" class="form-control">
                                            <option value="1">PR</option>
                                            <option value="2">RS</option>
                                            <option value="3">SC</option>
                                            <option value="4">SP</option>                            
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>               
                    <div role="tabpanel" class="tab-pane" id="fornecedor-tab-endereco">
                        <form class="form-horizontal" id="form-cad-fornecedor-endereco">
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txt">CEP</label>  
                                <div class="col-md-4">
                                    <input id="txtCEP" name="txtCEP" type="text" placeholder="CEP" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txt">Endereço</label>  
                                <div class="col-md-4">
                                    <input id="txtEndereco" name="txtEndereco" type="text" placeholder="Endereço" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txt">Numero</label>  
                                <div class="col-md-4">
                                    <input id="txtNumero" name="txtNumero" type="text" placeholder="Numero" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txt">Complemento</label>  
                                <div class="col-md-4">
                                    <input id="txtComplemento" name="txtComplemento" type="text" placeholder="Complemento" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txt">Bairro</label>  
                                <div class="col-md-4">
                                    <input id="txtBairro" name="txtBairro" type="text" placeholder="Bairro" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="txt">Cidade</label>  
                                <div class="col-md-4">
                                    <input id="txtCidade" name="txtCidade" type="text" placeholder="Cidade" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Select Basic -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="slctUF">Estado</label>
                                <div class="col-md-4">
                                    <select id="slctUF" name="slctUF" class="form-control">
                                        <option value="1">PR</option>
                                        <option value="2">RS</option>
                                        <option value="3">SC</option>
                                        <option value="4">SP</option>                            
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    
                    <div role="tabpanel" class="tab-pane" id="fornecedor-tab-emails">
                        <form class="form-horizontal" id="form-cad-fornecedor-emails">
                            E-mails
                        </form>
                    </div>  
                    <div role="tabpanel" class="tab-pane" id="fornecedor-tab-telefones">
                        <form class="form-horizontal" id="form-cad-fornecedor-telefones">
                        Telefones
                        </form>
                    </div>                                        
                </div>
            </div>
        </fieldset>
    </form>
    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-4 control-label" for="btnSalvar"></label>
        <div class="col-md-8">
            <button id="btnAdicionar" name="btnAdicionar" class="btn btn-success">Adicionar Fornecedor</button>
            <button id="btnSalvar" name="btnSalvar" class="btn btn-default hide">Salvar</button>
            <button id="btnCancelar" name="btnCancelar" class="btn btn-danger">Cancelar</button>            
        </div>
    </div>
</body>
</html>

