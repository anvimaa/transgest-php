<?php include 'config.php'; 
if(!isset($_SESSION)) session_start();
?>
   

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
            <h4>Lista de livretes</h4>
                 
            <div class="card-header-right ">
                <ul class="list-unstyled card-option">
                    <li><i class="fa fa fa-wrench open-card-option"></i></li>
                    <li><i class="fa fa-window-maximize full-card"></i></li>
                    <li><i class="fa fa-minus minimize-card"></i></li>
                    <li><i class="fa fa-refresh reload-card"></i></li>
                    <li><i class="fa fa-trash close-card"></i></li>
                </ul>
            </div>
        </div>

        
        <div class="card-block table-border-style">
            <div class="pull-right d-flex">
                <div class="form-outline">
                    <input id="myInput" type="search" id="form1" class="form-control" style="width: 250px; margin-right: -5px;" />
                </div>
                <button type="button" class="btn btn-primary">
                    <i class="ti-search"></i>
                </button>
            </div><br><br>
            <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <tr>
                        <th>Data/Hora</th>
                        <th>Livrete nº</th>
                        <th>Emissão</th>
                        <th>Matrícula</th>
                        <th>Marca</th>
                        <th class="">Motor</th>
                        <th class="">Proprietário</th>                                                            
                        <th class="">BI</th>
                        <th class="">Situação</th>                                                           
                        <th class=""></th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php
                    if(!isset($_POST['texto'])){
                    $total=0;
                        foreach($this->dados2 as $row){?> 
                    <tr>
                        <td><?php echo $row->data_reg; ?></td>
                        <td><?php echo $row->num_livrete; ?></td>
                        <td><?php echo $row->emissao; ?></td>
                        <td><?php echo $row->matricula; ?></td>
                        <td><?php echo $row->marca; ?></td>
                        <td><?php echo $row->motor; ?></td> 
                        <td><?php echo $row->nome; ?></td>      
                        <td><?php echo $row->ident; ?></td> 
                        <td><?php echo $row->situacao; ?></td>                                        
                        
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
                            <td><?php echo $row->data_reg; ?></td>
                            <td><?php echo $row->num_livrete; ?></td>
                            <td><?php echo $row->emissao; ?></td>
                            <td><?php echo $row->matricula; ?></td>
                            <td><?php echo $row->marca; ?></td>
                            <td><?php echo $row->motor; ?></td> 
                            <td><?php echo $row->nome; ?></td>      
                            <td><?php echo $row->ident; ?></td> 
                            <td><?php echo $row->situacao; ?></td>                                            
                            
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
    <script  src="<?php echo($pach)?>assets/js/jquery/3.6.4/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
    </script>            
</div>
<div id="success-alert-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-blue">
                <div class="modal-body p-4">
                    <div class="text-center">
                        <i class="dripicons-checkmark h1"></i>
                        <h4 class="mt-2">Obrigado!</h4>
                        <p class="mt-3">O seu regito foi efectuado com sucesso.
                            Para concluir este processo, dirija-se a Administração municipal para efectuar o pagmente e fazer o levantamento do LIVRETE e da LICENÇA DE TAXI.</p>
                        <button type="button" class="btn btn-light my-2"
                            data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <button type="button" class="btn btn-success" data-toggle="modal"
            data-target="#success-alert-modal" tabindex="-1" role="dialog" id="btn-modal">Success Alert</button> 

<!--<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>-->

    
    <script type="text/javascript">
        new DataTable('#example');

        document.addEventListener('DOMContentLoaded', function(){ 
            setTimeout(function() {
                $("#save").fadeOut().empty();
                $("#error").fadeOut().empty();
            }, 50000);
        }, false);

        
    </script>

                                    