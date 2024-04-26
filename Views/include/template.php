<?php require_once 'config.php';
if(!isset($_SESSION))session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>TransGest</title>

      <!-- Meta -->

      <!-- Favicon icon -->
      <link rel="icon" href="<?php echo($pach)?>assets/images/logo1.png" type="image/x-icon">
    <!-- Google font-->
   
   
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/css/bootstrap/css/bootstrap.min.css">
      
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/css/style.css">
      <!-- waves.css -->
      <link rel="stylesheet" href="<?php echo($pach)?>assets/pages/waves/css/waves.min.css" type="text/css" media="all">
       <!-- waves.css -->
        <link rel="stylesheet" href="<?php echo($pach)?>assets/pages/waves/css/waves.min.css" type="text/css" media="all">
      <!-- themify icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/icon/themify-icons/themify-icons.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- scrollbar.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/css/jquery.mCustomScrollbar.css">
        <!-- am chart export.css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo($pach)?>assets/icon/icofont/css/icofont.css">
      <!-- Style.css -->      
      <link rel="stylesheet" href="<?php echo($pach)?>assets/css/chosen.min.css" />
      

      
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets2/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets2/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets2/css/style.css" rel="stylesheet">
  </head>

  <body>
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
  <!-- Pre-loader end -->
  <?php if($nomeView != 'include/login' and $nomeView !='include/portal') { ?>
  <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        <!--HEADER-->
        <?php if($nomeView != 'include/login' and $nomeView !='include/portal'/*&& $nomeView !='include/portal_membro'*/) include ('header.php')?>

          <div class="pcoded-main-container">
              <div class="pcoded-wrapper">
                <!--SIDEBAR-->
                <?php if($nomeView != 'include/login' and $nomeView !='include/portal'/*&& $nomeView !='include/portal_membro'*/) include ('sidebar.php')?>
                  <div class="pcoded-content">
                      <!-- Page-header start -->
                      
                      <div class="page-header">
                          <div <?php if(($_SESSION['cargo'])!='Visitante'){ ?> class="page-block" <?php }?>>
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                      <?php if(($_SESSION['cargo'])!='Visitante'){ ?>
                                          <h5 class="m-b-10" style="font-size: 20px; font-weight: bolder;">SISTEMA MUNICIPAL DE GESTÃO DE VEÍCULOS AUTOMÓVEL E MOTORIZADO</h5>
                                            <p class="m-b-0">Benvindo Sr(abs)  <?php echo (($_SESSION['usuario']))?> </p>
                                        <?php }else{ ?>
                                            <div style="margin: 20px;">
                                            <h5 class="m-b-10" style="font-size: 40px; font-weight: bolder;">Portal do Taxista</h5>
                                            <p class="" style="margin-top: -15px;">(Área reservada)</p>
                                            </div>
                                        <?php }?>
                                      </div>
                                  </div>
                                  
                                  <div class="col-md-4 pull-right">
                                <?php if(($_SESSION['cargo'])=='Visitante'){?>
                                    <nav class="navbar navbar-expand-lg navbar-light">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse pull-right" id="navbarNavDropdown" style="margin-right: -2rem;">
                                            <ul class="navbar-nav">
                                                <li class="nav-item active" >
                                                    <a class="nav-link" href="<?php echo $pach?>home/painel" style="color: white;">Início <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#serviços"  style="color: white;">Serviços</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#pricing" style="color: white;">Monumentos</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#faq" style="color: white;">FAQ</a>
                                                </li>
                                                <!--
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#servicos" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                                                    Serviços
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="color: white;">
                                                    <a class="dropdown-item" href="#">Emissão de livretes</a>
                                                    <a class="dropdown-item" href="#">Licenças</a>
                                                    <a class="dropdown-item" href="#">Carteiras profissional</a>
                                                    <a class="dropdown-item" href="#">Licenças de condução</a>
                                                    </div>
                                                </li>-->
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#contact"  style="color: white;">Contactos</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                    <?php } ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <?php }?>
                      <?php if($nomeView != 'include/login' and $nomeView !='include/portal') { ?>
                        <div class="pcoded-inner-content">
                            <!--BODY-->
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                        <!--DASHBOARD-->
                                        <?php $this->carregarViewNoTemplate($nomeView, $dadosModel, $dados2); ?>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                        <?php }else{ $this->carregarViewNoTemplate($nomeView, $dadosModel, $dados2);} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- Required Jquery -->
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="<?php echo($pach)?>assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="<?php echo($pach)?>assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/modernizr/modernizr.js "></script> -->
    <!-- slimscroll js -->
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/SmoothScroll.js"></script>
    <script src="<?php echo($pach)?>assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="<?php echo($pach)?>assets/pages/widget/amchart/gauge.js"></script>
    <script src="<?php echo($pach)?>assets/pages/widget/amchart/serial.js"></script>
    <script src="<?php echo($pach)?>assets/pages/widget/amchart/light.js"></script>
    <script src="<?php echo($pach)?>assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="<?php echo($pach)?>assets/js/pcoded.min.js"></script>
    <script src="<?php echo($pach)?>assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?php echo($pach)?>assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/script.js "></script>
    <script type="text/javascript" src="<?php echo($pach)?>assets/js/chosen.jquery.min.js"></script>
       
</body>

</html>