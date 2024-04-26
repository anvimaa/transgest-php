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
    <div class="row">
        <div class="col-sm-12">
            <!-- Tab variant tab card start -->
            <div class="card">
                <div class="card-header">
                    <h4>Registo de Livrete</h4>
                </div>
                <div class="card-block tab-icon">
                    <!-- Row start -->
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">                                                                
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs  tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home1" role="tab"><i class="icofont icofont-ui-user"></i>Dados do Proprietário</a>
                                    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile1" role="tab"><i class="icofont icofont-car"></i>Dados do veículo</a>
                                    
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile2" role="tab"><i class="icofont icofont-card"></i>Dados da licença</a>
                                    
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <form class="form-material" action="<?php echo $pach?>livrete/cadastrar" method="POST" enctype="multipart/form-data">
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
                                                                    <input type="hidden" name="id_livrete" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_livrete ?>">
                                                                    <input type="text" name="nome" class="form-control" >
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Nome</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="ident" class="form-control" >
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
                                                                        <select name="genero" class="form-control" >
                                                                            <option value="">Selecione Gênero</option>
                                                                            <option value="Masculino">Masculino</option>
                                                                            <option value="Feminino">Feminino</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-primary form-static-label">
                                                                    <input type="date" name="data_nasc" class="form-control" >
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Data de nascimento</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="naturalidade" class="form-control">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Naturalidade</label>
                                                                </div>                                                           
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="form-material">
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="residencia" class="form-control">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Residência</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="telefone" class="form-control">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Telefone</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="provincia" class="form-control">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Província</label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Carregar imagem</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" name="arquivo" class="form-control">
                                                                    </div>
                                                                </div>    
                                                                <div class="form-group form-primary">
                                                                    <span>Definir estes dados p/ o Mototaxista&nbsp; &nbsp;<input type="checkbox" name="mototaxista" id=""></span>
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
                                                                <div class="form-group form-primary">
                                                                    Possui Matrícula?:&nbsp;&nbsp;
                                                                    <input type="radio" name="rbMatricula" value=" " id="chkNovo" onchange="checkar()" checked>
                                                                    Não &nbsp;&nbsp;
                                                                    <input type="radio" name="rbMatricula" value="antigo" id="chkAntigo" onchange="checkar()"> 
                                                                    Sim
                                                                </div>
                                                                <!--
                                                                <div class="form-group form-primary">
                                                                    <input type="hidden" id="num_livrete" name="num_livrete" class="form-control" disabled>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Nº do Livrete</label>
                                                                </div>-->
                                                                <div class="form-group form-primary">
                                                                    <input type="text" id="matricula" name="matricula" class="form-control" disabled>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Matrícula</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="marca" class="form-control" require>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Marca</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="modelo" class="form-control" require>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Modelo</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="motor" class="form-control" require>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Motor nº</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="chassi" class="form-control" require>
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
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="cilindragem" class="form-control" require>
                                                                            <option value="">Selecione Cilindragem</option>
                                                                            <option value="40 c.c">40 c.c</option>
                                                                            <option value="50 c.c">50 c.c</option>
                                                                            <option value="60 c.c">60 c.c</option>
                                                                            <option value="100 c.c">100 c.c</option>
                                                                            <option value="120 c.c">120 c.c</option>
                                                                            <option value="125 c.c">125 c.c</option>
                                                                            <option value="150 c.c">150 c.c</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="cor" class="form-control" require>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Cor</label>
                                                                </div>
                                                                <div class="form-group form-primary form-static-label">
                                                                    <input type="Number" name="lotacao" class="form-control" require>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Lotação</label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="situacao_veiculo" class="form-control" require>
                                                                            <option value="">Estado do veículo</option>
                                                                            <option value="Autorizado">Autorizado</option>
                                                                            <option value="Não autorizado">Não autorizado</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="tipoV" class="form-control" require>
                                                                            <option value="">Tipo de veículo</option>
                                                                            <option value="Ciclomotor">Ciclomotor</option>
                                                                            <option value="Motociclo">Motociclo</option>
                                                                            <option value="Motocultivadora">Motocultivadora</option>
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
                                                                        <select name="tipoLic" class="form-control" require>
                                                                            <option value="">Tipo de licenca</option>
                                                                            <option value="Passageiro">Passageiro</option>
                                                                            <option value="Mercadoria">Mercadoria</option>
                                                                            <option value="Passageiro e Mercagoria">Passageiro e Mercagoria</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-12">
                                                                        <select name="municipio" class="form-control" require>
                                                                            <option value="">Local de actividade</option>
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
                                                                <label class="">Validade (anos)</label>
                                                                    <input type="number" name="duracao" class="form-control" value="1" disabled>
                                                                    <span class="form-bar"></span>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                                                                
                                            </div>                                                                       
                                        </div>
                                    </div>
                                    <div class="card-block">                                                                   
                                        <button type="submit" name="enviar" class="btn btn-mat waves-effect waves-light btn-success">Guardar registo</button>
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
<script> 
    function previewImagem(){
        var imagem = document.querySelector('input[name=arquivo]').files[0];
        var preview = document.querySelector('.imagem');

        var reader = new FileReader();

        reader.onloadend = function(){
            preview.src = reader.result;
        }
        if(imagem){
            reader.readAsDataURL(imagem);
        }else{
            preview.src = "img/image.png";
        }

    }
</script>
<script>
    function checkar(){
        var chknovo = document.querySelector('#chkNovo').checked;
        var chkantigo = document.querySelector('#chkAntigo').checked;

        var txtlivrete = document.querySelector('#num_livrete');
        var txtmatricula = document.querySelector('#matricula');

        if(chkantigo == true){
            //txtlivrete.disabled = false;
            txtmatricula.disabled = false;
            txtmatricula.placeholder = 'Informe a matrícula';
            chknovo.checked == false;
        }else{
            //txtlivrete.disabled = true;
            txtmatricula.disabled = true;
            txtmatricula.placeholder ='            O sistema irá gerar sua matrícula';

        }

    }
    
</script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function(){ 
        setTimeout(function() {
            $("#save").fadeOut().empty();
            $("#error").fadeOut().empty();
        }, 5000);
    }, false);
</script>