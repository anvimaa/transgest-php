<?php include 'config.php'; 
if(!isset($_SESSION)) session_start();
?>
   
   <link href="<?php echo($pach)?>assets2/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo($pach)?>assets2/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo($pach)?>assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo($pach)?>assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo($pach)?>assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo($pach)?>assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo($pach)?>assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo($pach)?>assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo($pach)?>assets2/css/style.css" rel="stylesheet">
<div class="page-body">
    <!-- Basic table card start -->
    <!-- Inverse table card end -->
    <!-- Hover table card start -->
    <?php        
        if(isset($_POST['enviar']) OR isset($_GET['cod'])){
            if(isset($dadosModel[1])){?>
    <div class="card borderless-card" id="save">
        <div class="card-block success-breadcrumb">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#!">
                            <i class="icofont icofont-check-circled"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">&nbsp;<?php echo $dadosModel[1];?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div> <?php  } else{ ?>
    <div class="card borderless-card" id="error" style="margin-botton:-20px">
        <div class="card-block danger-breadcrumb" style="">
            
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="#!">
                            <i class="icofont icofont-error"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">&nbsp;<?php echo $dadosModel[0];?></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php } }  ?>
    <div class="card">
        <div class="card-header">
            <h4 class="mt-2">Obrigado!</h4>
            <p class="mt-3">O seu cadastro foi efectuado com sucesso.
                        Dirija-se até a Administração municipal com o processo físico e efectuar o pagamento dos emonumentos para processequir com o processo de Licenciamento do seu veículo.</p>
            <div class="">
                <div class="">
                    <h6>Taxa para Mototaxitas</h6>
                    <p class="text-muted">Livrete: <span class="">1.548 Kz</span></p>                   
                    <p class="text-muted">Licença de mototaxi: <span class="">1.548 kz anual</span></p>
                    <p class="text-muted">Carteira profissional: <span class="">2.800 Kz</span></p>  
                    <p class="text-muted">Licença de condução: <span class="">1.548 kz</span></p>  
                    <br>
                    <h6>Taxa para Taxistas</h6>
                    <p class="text-muted">Licença de taxi: <span class="">15.840 kz anual</span></p>                   
                </div>
            </div>
        </div>
    </div>
    <a  class="btn btn-info" href="<?php echo $pach?>home/painel">Ir para ínicio</a>
    <!-- 
    <div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-success">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-checkmark h1"></i>
                        <h4 class="mt-2">Obrigado!</h4>
                        <p class="mt-3">O seu regito foi efectuado com sucesso.
                            Para concluir este processo, dirija-se a Administração municipal para efectuar o pagmente o fazer o levantamento do LIVRETE e da LICENÇA DE TAXI.</p>
                        <button type="button" class="btn btn-light my-2"
                            data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>/.modal-content 
        </div> /.modal-dialog 
    </div>
    

    <button type="button" class="btn btn-info" data-toggle="modal"
            data-target="#success-alert-modal" tabindex="-1" role="dialog">Ir para ínicio</button> 
              -->                   
   
</div>
    <div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-success">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-checkmark h1"></i>
                        <h4 class="mt-2">Cadastro efectuado com Sucesso!</h4>
                        <button type="button" class="btn btn-light my-2" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <script>
        function abreModal() {
            $("#success-alert-modal").modal({
                show: true
            });
            }
            setTimeout(abreModal, 1000);
    </script> 
  <script src="<?php echo($pach)?>assets2/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo($pach)?>assets2/vendor/aos/aos.js"></script>
  <script src="<?php echo($pach)?>assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo($pach)?>assets2/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo($pach)?>assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo($pach)?>assets2/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo($pach)?>assets2/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo($pach)?>assets2/js/main.js"></script>

