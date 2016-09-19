<?php ?>
<html>
    <head>
        <title>GKERP - Cadastro de Fornecedores</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/jquerymin.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/cad-fornecedor.js" type="text/javascript"></script>
    </head>
    <body>

        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-static-top">
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

        <div class="container">
            <h1>Listagem de OS</h1>
            <div class="row">
                <div class="span5">
                    <table class="table table-condensed table-hover" id="lista-os">
                        <thead>
                            <tr>
                                <th>OS</th>
                                <th>Solicitante</th>
                                <th>Date de Registro</th>
                                <th>Departamento</th>
                                <th>Status</th>                                          
                            </tr>
                        </thead>   
                        <tbody>                                                              
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>

