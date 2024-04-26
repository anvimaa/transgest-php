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
                    <h4>Registar mototaxista</h4>
                </div>
                <div class="card-block tab-icon">
                    <!-- Row start -->
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <!-- Tab panes -->
                            <form class="form-material" action="<?php echo $pach?>mototaxista/cadastrar" method="POST" enctype="multipart/form-data">
                                <div class="tab-content tabs card-block">                                                                    
                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                        <div class="form-material">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-block">                                                                                   
                                                                <div class="form-group form-primary">
                                                                    <input type="hidden" name="id_mot" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_mot ?>">
                                                                    <input type="text" name="nome" class="form-control" required>
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Nome</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="ident" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">BI nº</label>
                                                                </div>
                                                                <div class="form-group form-primary form-static-label">
                                                                    <input type="date" name="validade" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Data de Validade</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="genero" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Gênero</label>
                                                                </div>
                                                                <div class="form-group form-primary form-static-label">
                                                                    <input type="date" name="data_nasc" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Data de nascimento</label>
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
                                                                    <input type="text" name="naturalidade" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Naturalidade</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="residencia" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Residência</label>
                                                                </div>
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="telefone" class="form-control" required="">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Telefone</label>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Carregar imagem</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" name="arquivo" class="form-control">
                                                                    </div>
                                                                </div> 
                                                                <div class="col-sm-12">
                                                                    <select name="tipoLic" class="form-control">
                                                                        <option value="">Praça de mototaxi</option>
                                                                        <?php 
                                                                        foreach($this->Model->carregarParadas() as $row){?>                                                                                           
                                                                            <option value="<?php echo $row->id_par; ?>"<?php  if(isset($_REQUEST['id'])) echo $row->id_par == $dadosModel
                                                                            ->id_par ? 'selected' :'' ?>>  <?php echo $row->designacao; ?></option> 
                                                                        <?php } ?> 
                                                                    </select>
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
<script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function(){ 
            setTimeout(function() {
                $("#save").fadeOut().empty();
                $("#error").fadeOut().empty();
            }, 5000);
        }, false);
    </script>
