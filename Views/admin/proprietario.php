<?php include 'config.php'; ?>
<div class="page-body">
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
            <h4>Lista de proprietários</h4>
            <span></span>
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
            <div class="table-responsive">
                <table class="table table-hover">
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
                        <td><?php echo $row->ident; ?></td>
                        <td><?php echo $row->genero; ?></td>
                        <td><?php echo $row->naturalidade; ?></td>
                        <td><?php echo $row->telefone; ?></td>
                        <td><?php echo $row->marca; ?></td> 
                        <td><?php echo $row->chassi; ?></td>                                            
                            
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
    <!-- Contextual classes table ends -->
    <!-- Background Utilities table start -->
    <!-- Background Utilities table end -->
</div>
                                    