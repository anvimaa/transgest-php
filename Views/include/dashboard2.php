<?php

//include('protect.php');
include 'config.php'; 
//print_r($dadosModel[0]->total_motociclistas);exit;
?>
<div class="page-body">
    
    <div class="row">           
        <!--  project and team member end -->
    
        <div class="col-xl-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5><strong>Municipio do Uíge recebe os primeiros cartões</strong></h5>
                    <span class="text-muted">A Administradora municpal do Uíge fez entrega dos primeiros de cartões de subvensão de combustível para os mototaxistas<a href="https://www.amcharts.com/" target="_blank"> Leia mais...</a></span>
                    <div class="card-header-right">                       
                    </div>
                </div>
                <div class="card-block">
                    <div style="width:800; height:450;">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php echo($pach)?>assets2/img/slide/slide-1.jpg" width="100%"  alt="Slide" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo($pach)?>assets2/img/slide/slide-2.jpg" width="100%"  alt="Slide" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                <img class="d-block w-100" src="<?php echo($pach)?>assets2/img/slide/slide-3.jpg" width="100%"  alt="Slide" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>  
                    </div>             
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card quater-card">
                <div class="card-block">
                    <h4 class="">Momumentos</h4>
                    <h6>Mototaxitas</h6>
                    <p class="text-muted">Livrete<span class="f-right">1.548 Kz</span></p>                   
                    <p class="text-muted">Licença de mototaxi<span class="f-right">1.548 kz anual</span></p>
                    <p class="text-muted">Carteira profissional<span class="f-right">2.800 Kz</span></p>  
                    <p class="text-muted">Licença de condução<span class="f-right">1.548 kz</span></p>  
                    <br>
                    <h6>Taxistas</h6>
                    <p class="text-muted">Licença de taxi<span class="f-right">15.840 kz</span></p>                   
                </div>
            </div>
            
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col">
                            <h4>Últimas informações</h4>
                            <p class="text-muted">Veja aqui as ultimas informações sobre o processo de cadastro e licenciamento</p>
                        </div>
                        <div class="col-auto">
                            <label class="label label-success">Novo</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <canvas id="this-month" style="height: 150px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>   
</div>
<script>
        function abreModal() {
            $("#success-alert-modal").modal({
                show: true
            });
            }
            setTimeout(abreModal, 1000);
    </script>