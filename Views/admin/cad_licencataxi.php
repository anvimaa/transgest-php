<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src='<?php echo($pach)?>dropdown/jquery-3.2.1.min.js' type='text/javascript'></script>
    <script src='<?php echo($pach)?>dropdown/select2/dist/js/select2.min.js' type='text/javascript'></script>
    <link href='<?php echo($pach)?>dropdown/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
</head>
<body>
    

<div class="main-body">
<div class="page-wrapper">
    <!-- Page-body start -->
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
        <div class="row">
            <div class="col-sm-12">
                <!-- Tab variant tab card start -->
                <div class="card">
                    <div class="card-header">
                        <h4>Registo de licença de taxi</h4>
                    </div>
                    <div class="card-block tab-icon">
                        <!-- Row start -->
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="sub-title">
                                </div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs  tabs" role="tablist">
                                <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><i class="icofont icofont-ui-user"></i>Dados do Proprietário</a>                                       
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile1" role="tab"><i class="icofont icofont-car"></i>Dados do veículo</a>                                                 
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><i class="icofont icofont-ui-v-card"></i>Dados da licença</a>                                                 
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <form class="form-material" action="<?php echo $pach?>licencataxi/cadastrar" method="POST" enctype="multipart/form-data">
                                <div class="tab-content tabs card-block">                                                                    
                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                        <div class="form-material">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-block"> 
                                                                <div class="form-group ">
                                                                    <label for="">Selecionar proprietário na lista</label>
                                                                    <select name="id_prop" class="dropdown" id="dropdown1" onchange="checkar()" placeholder="Pesquisar proprietário" style="width: 500px;height: 36px; size:20px; border-radius: 10px;">
                                                                        <option value=""></option>
                                                                        <?php 
                                                                        foreach($this->Model->carregarProprietario() as $row){?>                                                                                           
                                                                            <option value="<?php echo $row->id_prop; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_prop == $dadosModel
                                                                            ->id_prop ? 'selected' :'' ?>>  <?php echo $row->nome; ?></option> 

                                                                        <?php } ?>
                                                                    </select>
                                                                </div>     
                                                                           <hr><br><br>                                                                
                                                                <div class="form-group form-primary">
                                                                    <input type="hidden" name="id_licenca" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_licenca ?>">
                                                                    <input type="text" name="nome" id="txtnome" class="form-control">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Nome</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="ident" class="form-control">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">BI nº</label>
                                                                </div>
                                                                <div class="form-group form-primary form-static-label">
                                                                    <input type="date" name="validade_BI" class="form-control" >
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Data de Validade</label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="genero" class="form-control" require>
                                                                            <option value="">Selecione Gênero</option>
                                                                            <option value="Masculino">Masculino</option>
                                                                            <option value="Feminino">Feminino</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>                                                          
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="form-material">
                                                                <div class="form-group form-primary form-static-label">
                                                                    <input type="date" name="data_nasc" class="form-control" >
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Data de nascimento</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="naturalidade" class="form-control" >
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Naturalidade</label>
                                                                </div> 
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="residencia" class="form-control" >
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Residência</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="telefone" class="form-control" >
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Telefone</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="provincia" class="form-control" =>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Província</label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Carregar imagem</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" name="arquivo" class="form-control">
                                                                    </div>
                                                                </div>    
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                                                       
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile1" role="tabpanel">
                                        <div class="tab-pane active" id="home1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="form-material">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="tipoV" class="form-control" require>
                                                                            <option value="">Tipo de veículo</option>
                                                                            <option value="Gira bairro">Gira bairro</option>
                                                                            <option value="Colectivo">Colectivo</option>
                                                                            <option value="Mercadoria">Mercadoria</option>
                                                                            <option value="Misto">Misto</option>
                                                                            <option value="Agrícola">Agrícola</option>
                                                                            <option value="Especial">Especial</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="matricula" class="form-control" require>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Matrícula</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="marca" class="form-control" required>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Marca</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="modelo" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Modelo</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="motor" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Motor nº</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="chassi" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Chassi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="form-material">
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="cilindragem" class="form-control" required>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Cilindragem</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="cor" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Cor</label>
                                                                </div>
                                                                <div class="form-group form-primary form-static-label">
                                                                    <input type="Number" name="lotacao" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Lotação</label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="situacao_veiculo" class="form-control">
                                                                            <option value="">Estado do veículo</option>
                                                                            <option value="Autorizado">Autorizado</option>
                                                                            <option value="Não autorizado">Não autorizado</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="alimentacao" class="form-control">
                                                                            <option value="">Sistema de alimentação</option>
                                                                            <option value="Gasolina">Gasolina</option>
                                                                            <option value="Gasóleo">Gasóleo</option>
                                                                            <option value="Eléctrico">Eléctrico</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="caixa" class="form-control">
                                                                            <option value="">Caixa de velocidade</option>
                                                                            <option value="Manual">Manual</option>
                                                                            <option value="Sem-automático">Sem-automático</option>
                                                                            <option value="automático">automático</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                                                
                                            </div>                                                                       
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile2" role="tabpanel">
                                        <div class="tab-pane active" id="home1" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="form-material">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="tipo" class="form-control">
                                                                            <option value="">Tipo de licenca</option>
                                                                            <option value="Passageiro">Passageiro</option>
                                                                            <option value="Mercadoria">Mercadoria</option>
                                                                            <option value="Passageiro e Mercagoria">Passageiro e Mercagoria</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">                                                                        
                                                                        <select name="municipio" class="form-control">
                                                                            <option value="">Selecione o município</option>
                                                                            <option value="Auto cauale">Auto cauale</option>
                                                                            <option value="Ambuíla">Ambuíla</option>
                                                                            <option value="Bembe">Bembe</option>
                                                                            <option value="Buengas">Buengas</option>
                                                                            <option value="Bungo">Bungo</option>
                                                                            <option value="Cangola">Cangola</option>
                                                                            <option value="Damba">Damba</option>
                                                                            <option value="Quimbele">Quimbele</option>
                                                                            <option value="Quitexe">Quitexe</option>
                                                                            <option value="Maquela do Zombos">Maquela do Zombo</option>
                                                                            <option value="Milunga">Milunga</option>
                                                                            <option value="Negage">Negage</option>
                                                                            <option value="Puri">Puri</option>
                                                                            <option value="Sanza Pombo">Sanza Pombo</option>
                                                                            <option value="Songo">Songo</option>
                                                                            <option value="Uíge">Uíge</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="rota" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Rota</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                                                
                                            </div>                                                                       
                                        </div>
                                    </div>
                                    <div class="card-block">                                                                   
                                        <button type="submit" class="btn btn-mat waves-effect waves-light btn-success">Guardar registo</button>
                                    </div>                                                                    
                                </div> 
                                </form>
                            </div>
                            
                        </div>
                        <!-- Row end -->
                    </div>
                </div>
                <!-- Tab variant tab card start -->
            </div>
        </div>
    </div>
    <!-- Page-body end -->
</div>
</div>
<script>
         $(document).ready(function(){            
            // Initialize select2           
            $("#dropdown1").Select2();
        });
        </script>
        <script>
            function checkar(){
                var txtnome = document.querySelector('#txtnome').checked;
                const cmbprop = document.querySelector('#dropdown1').checked;
                
                if(cmbprop.value != ""){
                    alert(txtnome.value);
                    txtnome.required=false;
                }
            }
            
        </script>

</body>

</html>
                            