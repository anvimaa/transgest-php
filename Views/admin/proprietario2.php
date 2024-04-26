<?php include 'config.php';

//var_dump($dados);exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">

    <div class="row" style="margin-top: 1rem;">
        <div class="col-lg-12">
            <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg'); height:50px;">
                    <div class="bg-overlay bg-overlay--blue"></div>
                    <h3>
                        <i class="fa fa-chart-bar"></i>Lista de proprietários</h3>
                    <button class="au-btn-plus">
                        <a href="<?php echo($pach)?>proprietario/adicionar"><i class="zmdi zmdi-plus"></i></a>
                    </button>
                </div>
                <div class="au-inbox-wrap js-inbox-wrap">
                    <div class="au-message js-list-load">
                        <div class="au-message__noti row">
                            <div class="col-lg-4">
                                <p>
                                <?php 
                                if(isset($_POST['texto'])){ 
                                    echo 'Registos encontrados: '.count($this->dados);
                                    }else{ echo 'Total de registos: '.count($this->dados2);
                                    }                           
                                ?>
                                </p>
                            </div>
                            <div class="col-lg-4">   

                            </div>
                            <div class="col-lg-4" >                               
                                <form action="<?php echo($pach)?>proprietario/buscar" method="post" style="display:flex ;">
                                    <input type="text" id="company" name="texto" placeholder="Buscar..." class="form-control">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </form>
                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <h2 class="title-1 m-b-25">Earnings By Items</h2>-->
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>BI/Nif</th>
                                                <th>Gênero</th>
                                                <th>Naturalidade</th>
                                                <th>Telefone</th>
                                                <th class="">Veiculo</th>
                                                <th class="">Chassi</th>
                                                
                                                <th class=""></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                            if(!isset($_POST['texto'])){
                                            $total=0;
                                                foreach($this->dados2 as $row){?> 
                                            <tr>
                                                <td><?php echo $row->nome; ?></td>
                                                <td><?php echo $row->ident; ?></td>
                                                <td><?php echo $row->genero; ?></td>
                                                <td><?php echo $row->naturalidade; ?></td>
                                                <td><?php echo $row->telefone; ?></td>
                                                <td><?php echo $row->marca; ?></td> 
                                                <td><?php echo $row->chassi; ?></td>                                             
                                                
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a  class="item" data-toggle="tooltip" data-placement="top" title="Ver">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="<?php echo $pach?>empresas/novo&id=<?php echo $row->id_prop; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="Javascript: if(confirm('Tem certeza que deseja deletar este registo ?')) 
                                                                    location.href='<?php echo $pach?>empresas/eliminar&cod=<?php echo $row->id_prop; ?>'" class="item" data-toggle="tooltip" data-placement="top" title="Deletar">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } } 
                                            else {
                                            foreach($this->dados as $row){?> 
                                                <tr>
                                                    <td><?php echo $row->nome; ?></td>
                                                    <td><?php echo $row->nif; ?></td>
                                                    <td><?php echo $row->ramo_activ; ?></td>
                                                    <td><?php echo $row->categoria; ?></td>
                                                    <td><?php echo $row->tipo_admin; ?></td>
                                                    <td><?php echo $row->tipo_mercadorias; ?></td>                                            
                                                    
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } } ?>                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="au-message__footer">
                            <!--<button class="au-btn au-btn-load js-load-btn">load more</button>-->
                        </div>
                    </div>
                    <div class="au-chat">
                        <div class="au-chat__title">
                            <div class="au-chat-info">
                                <div class="avatar-wrap online">
                                    <div class="avatar avatar--small">
                                        <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                    </div>
                                </div>
                                <span class="nick">
                                    <a href="#">John Smith</a>
                                </span>
                            </div>
                        </div>
                        <div class="au-chat__content">
                            <div class="recei-mess-wrap">
                                <span class="mess-time">12 Min ago</span>
                                <div class="recei-mess__inner">
                                    <div class="avatar avatar--tiny">
                                        <img src="images/icon/avatar-02.jpg" alt="John Smith">
                                    </div>
                                    <div class="recei-mess-list">
                                        <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                        <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                    </div>
                                </div>
                            </div>
                            <div class="send-mess-wrap">
                                <span class="mess-time">30 Sec ago</span>
                                <div class="send-mess__inner">
                                    <div class="send-mess-list">
                                        <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="au-chat-textfield">
                            <form class="au-form-icon">
                                <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                                <button class="au-input-icon">
                                    <i class="zmdi zmdi-camera"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

           
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
