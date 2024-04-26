 <?php

//include('protect.php');
include 'config.php'; 
//print_r($dadosModel[0]->total_motociclistas);exit;
?>
<div class="page-body">
    <div class="row">
        <!-- task, page, download counter  start -->
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-purple"><?php echo $dadosModel[0]->total_viatura;?></h4>
                            <h6 class="text-muted m-b-0">Viaturas cadastradas</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-bar-chart f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-purple">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0"></p>
                        </div>
                        <div class="col-3 text-right">
                            <!--<i class="fa fa-line-chart text-white f-16"></i>-->
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-green"><?php echo $dadosModel[0]->lic_taxi?></h4>
                            <h6 class="text-muted m-b-0">Viaturas licencias</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-file-text-o f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-green">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0"></p>
                        </div>
                        <div class="col-3 text-right">
                            <!--<i class="fa fa-line-chart text-white f-16"></i>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-red"><?php echo $dadosModel[0]->total_veiculos?></h4>
                            <h6 class="text-muted m-b-0">Motorizadas cadastradas</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-calendar-check-o f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-red">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0"></p>
                        </div>
                        <div class="col-3 text-right">
                            <!--<i class="fa fa-line-chart text-white f-16"></i>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-blue"><?php echo $dadosModel[0]->lic_moto?></h4>
                            <h6 class="text-muted m-b-0">Motorizadas licenciadas</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="fa fa-hand-o-down f-28"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-c-blue">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <p class="text-white m-b-0"></p>
                        </div>
                        <div class="col-3 text-right">
                            <!--<i class="fa fa-line-chart text-white f-16"></i>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- task, page, download counter  end -->
        
            
        <!--  project and team member start -->
        <div class="col-xl-8 col-md-12">
            <div class="card table-card">
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
                    <h4 class="">Emomumentos</h4>
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
            <div class="card ">
                <div class="card-header">
                    <h5>Estatísticas geral</h5>
                    <!--
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>-->
                </div>
                <div class="card-block">
                    <div class="align-middle m-b-30">
                        <div class="d-inline-block">
                            <h6>Viaturas registadas</h6>
                            <p class="text-muted m-b-0"><?php echo $dadosModel[0]->total_viatura?></p>
                        </div>
                    </div>
                    <div class="align-middle m-b-30">
                        <div class="d-inline-block">
                            <h6>Viaturas licennciadas</h6>
                            <p class="text-muted m-b-0"><?php echo $dadosModel[0]->lic_taxi?></p>
                        </div>
                    </div>
                    <div class="align-middle m-b-30">
                        <div class="d-inline-block">
                            <h6>Coletivos</h6>
                            <p class="text-muted m-b-0">00</p>
                        </div>
                    </div>
                    <div class="align-middle m-b-30">
                        <div class="d-inline-block">
                            <h6>Girabairro</h6>
                            <p class="text-muted m-b-0">00</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!--  project and team member end -->
        <!--  sale analytics start 
        <div class="col-xl-8 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Sales Analytics</h5>
                    <span class="text-muted">Get 15% Off on <a href="https://www.amcharts.com/" target="_blank">amCharts</a> licences. Use code "codedthemes" and get the discount.</span>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <div id="sales-analytics" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col">
                            <h4>$256.23</h4>
                            <p class="text-muted">This Month</p>
                        </div>
                        <div class="col-auto">
                            <label class="label label-success">+20%</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <canvas id="this-month" style="height: 150px;"></canvas>
                        </div>
                    </div>ject
                </div>
            </div>
            <div class="card quater-card">
                <div class="card-block">
                    <h6 class="text-muted m-b-15">This Quarter</h6>
                    <h4>$3,9452.50</h4>
                    <p class="text-muted">$3,9452.50</p>
                    <h5>87</h5>
                    <p class="text-muted">Online Revenue<span class="f-right">80%</span></p>
                    <div class="progress"><div class="progress-bar bg-c-blue" style="width: 80%"></div></div>
                    <h5 class="m-t-15">68</h5>
                    <p class="text-muted">Offline Revenue<span class="f-right">50%</span></p>
                    <div class="progress"><div class="progress-bar bg-c-green" style="width: 50%"></div></div>
                </div>
            </div>
        </div>
        <!--  sale analytics end -->

    </div>
</div>