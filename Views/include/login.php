<?php include 'config.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TransGest</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
      <meta name="author" content="codedthemes" />
      <!-- Favicon icon -->

      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->     
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/css/bootstrap/css/bootstrap.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/css/style.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo($pach)?>assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/icon/font-awesome/css/font-awesome.min.css">

      <style type="text/css">

            .form-componente
            {
                width: 270px; 
                margin-left: 5rem;
                
            }           
            @media only screen and (max-width: 1900px){
                .desktop{
                text-align: center;               
                }
                span img{
                    width: 50%;
                }
            }

            @media only screen and (max-width: 560px){
                
                .phone{
                    text-align: left;
                }
                span img{
                    width: 30%;
                }
                .mgl{
                    margin-left: 3rem;
                }

                .form-componente
                {
                    width: 270px; 
                    margin-left: 0px;
                    
                }
            }
      
        

      </style>
  </head>

  <body>
  <?php        
        if(isset($_POST['enviar']) OR isset($_GET['cod'])){
            if(isset($dadosModel[1])){?>
    <div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-success">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-checkmark h1"></i>
                        <h4 class="mt-2"><i class="icofont icofont-check-circled"></i>Cadastro efectuado com Sucesso!</h4><i class="icofont icofont-error"></i>
                        <button type="button" class="btn btn-light my-2" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div> 
    <?php  } else{ ?>
    <div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-danger">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-checkmark h1"></i>
                        <h4 class="mt-2"><i class="icofont icofont-error"></i></i>Não foi possível cadastrar!</h4>
                        <button type="button" class="btn btn-light my-2" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <?php } }  ?>
  <!-- Pre-loader start -->
    <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
    </div>
                
    
        <div class="container bg-white" style="width: 900px; margin-top:12rem">
            <div class="row">
                <div class="col d-none d-sm-block bg-primary">
                    <div style=" position: absolute; left:7%; top: 30%">               
                        <img src="<?php echo($pach)?>assets/img/logo-angola.png" alt="responsive image" width="100%">
                    </div>
                </div>

                <div class="col-sm text-center phone">    
                    <br>               
                    <div class="mt-2 mb-4 phone mgl">
                        <a href="index.html" class="text-success">
                            <span><img class="" src="<?php echo($pach)?>assets/images/logoo.png" width="40%">                        
                        </a>
                    </div>
                        
                    <br>
                    <form class="" method="POST" action="<?php echo $pach?>home/login">
                        <div class="form-material mgl">
                            <div class="form-group form-primary form-componente phone">
                                <input type="text" name="email" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Usuario ou telefone</label>
                            </div>

                            <div class="form-group form-primary form-componente phone">
                                <input type="password" name="senha" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Senha</label>
                            </div>
                        
                            <div class="form-group phone">
                                <div class="">                          
                                    <h6 class="custom-control-label text-danger" for="customCheck2">                            
                                    <?php if(isset($_POST['email'])) if(!empty($dadosMode))echo($dadosModel);?>
                                    </h6>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group phone">
                                <button class="btn btn-rounded btn-primary rounded" style="width: 130px;" type="submit">Entrar</button>  &nbsp;
                                <button type="button" name="enviar" class="btn btn-info rounded" data-toggle="modal" data-target="#cadastrar-modal" tabindex="-1" role="dialog" style="width: 130px;">Criar conta</button> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    

    <div id="cadastrar-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <a href="index.html" class="text-success">
                            <span><img class="mr-2" src="<?php echo($pach)?>assets/images/logoo.png" width="50%">
                            <!--<img src="assets/images/logo-text.png" alt="" height="18"></span>-->
                        </a>
                    </div>

                    <form class="pl-3 pr-3" method="Post" action="<?php echo $pach?>usuarios/cadastrar">
                    <div class="form-material">
                        <div class="form-group">
                            <input name="id_usuario" type="hidden" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_usuario ?>" >
                            <input class="form-control" name="nome" type="text" id="emailaddress1" required="" >
                            <span class="form-bar"></span>
                            <label class="float-label">Nome completo</label>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select name="genero" class="form-control" style="border-bottom: 1px solid #ccc;">
                                    <option value="">Selecione Gênero</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" type="tel" id="email" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Telefone</label>
                        </div>

                        <div class="form-group form-primary">
                            <input type="text" name="usuario" class="form-control" required>
                            <span class="form-bar"></span>
                            <label class="float-label">Usuario</label>
                        </div>

                        <div class="form-group">                           
                            <input class="form-control" name="senha" type="password" required="" id="senha">
                            <span class="form-bar"></span>
                            <label class="float-label">Senha</label>
                        </div>
                        <div class="form-group">                           
                            <input class="form-control" type="password" required="" id="confsenha">
                            <span class="form-bar"></span>
                            <label class="float-label">Confirmar senha</label>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-rounded btn-primary rounded" onclick="" type="submit" style="width: 130px;">Registar</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 

    <div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-success">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-checkmark h1"></i>
                        <h4 class="mt-2"> <i></i>Cadastro efectuado com Sucesso!</h4>
                        <button type="button" class="btn btn-light my-2" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

<script type="text/javascript" src="<?php echo($pach)?>assets/js/jquery/jquery.min.js"></script>     

<script type="text/javascript" src="<?php echo($pach)?>assets/js/jquery-ui/jquery-ui.min.js "></script>     
<script type="text/javascript" src="<?php echo($pach)?>assets/js/popper.js/popper.min.js"></script>     
<script type="text/javascript" src="<?php echo($pach)?>assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="<?php echo($pach)?>assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo($pach)?>assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
<!-- modernizr js -->
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/SmoothScroll.js"></script>     
    <script src="<?php echo($pach)?>assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="<?php echo($pach)?>assets/js/common-pages.js"></script>
</body>

</html>
<script>
        function abreModal() {
            $("#success-alert-modal").modal({
                show: false
            });
            }
            setTimeout(abreModal, 1000);
            

            function validar(){        
                var senha = document.querySelector('#senha');
                var conf_senha = document.querySelector('#confsenha');

                if (senha != conf_senha) {
                    alert('Senhas diferentes');
                    form1.senha.focus();
                    return false;
                }
            }
    </script>