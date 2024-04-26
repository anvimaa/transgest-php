<?php include 'config.php'; 

if(!isset($_SESSION)) 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link href="<?php echo($pach)?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo($pach)?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo($pach)?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo($pach)?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo($pach)?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo($pach)?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo($pach)?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo($pach)?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?php echo($pach)?>assets/css/style.css" rel="stylesheet">
</head>
<body>
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(<?php echo($pach)?>assets/img/inicio2.jpg);">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Sistema Municipal de <span>Veículos automóveis e motorizados</span></h2>
              <p class="animate__animated animate__fadeInUp"></p>
              <a style="overflow-inline: none;" href="" data-toggle="modal" data-target="#login-modal" tabindex="-1" role="dialog" class="btn-get-started animate__animated animate__fadeInUp scrollto">Fazer login</a>
            &spar;
            <a href="" data-toggle="modal" data-target="#cadastrar-modal" tabindex="-1" role="dialog" class="btn-get-started animate__animated animate__fadeInUp scrollto">Registar-se</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(<?php echo($pach)?>assets2/img/slide/slide-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Sistema Municipal de <span>Veículos automóveis e motorizados</span></h2>
              <p class="animate__animated animate__fadeInUp"></p>
              <a href="" data-toggle="modal" data-target="#login-modal" tabindex="-1" role="dialog" class="btn-get-started animate__animated animate__fadeInUp scrollto">Fazer login</a>
            &spar;
            <a href="" data-toggle="modal" data-target="#cadastrar-modal" tabindex="-1" role="dialog" class="btn-get-started animate__animated animate__fadeInUp scrollto">Registar-se</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(<?php echo($pach)?>assets2/img/slide/slide-3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Sistema Municipal de <span>Veículos automóveis e motorizados</span></h2>
              <p class="animate__animated animate__fadeInUp"></p>
              <a href="" data-toggle="modal" data-target="#login-modal" tabindex="-1" role="dialog" class="btn-get-started animate__animated animate__fadeInUp scrollto">Fazer login</a>
            &spar;
            <a href="" data-toggle="modal" data-target="#cadastrar-modal" tabindex="-1" role="dialog" class="btn-get-started animate__animated animate__fadeInUp scrollto">Registar-se</a>
            </div>
          </div>
        </div>
      </div>

      </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

    <div id="login-modal" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true" >
        <div class="modal-dialog d-flex ">
            <div class="modal-content "style="opacity: 1.5;">
                <div class="modal-body ">
                    <div class="text-center mt-2 mb-4">
                        <a href="index.html" class="text-success">
                            <span><img class="mr-2" src="<?php echo($pach)?>assets/images/logoo.png" width="50%"><img
                                    src="assets/images/logo-text.png" alt=""
                                    height="18"></span>
                        </a>
                    </div>
                    <form class="pl-3 pr-3" method="POST" action="<?php echo $pach?>home/login">

                        <div class="form-group">
                            <label for="emailaddress1">Usuário ou Email</label>
                            <input type="hidden" name="id_usuario" value="<?php if(isset($_REQUEST['id'])) echo $dadosModel->id_usuario ?>">
                            <input class="form-control" type="text" name="email" id="emailaddress1"
                                required="" placeholder="Usuário ou email">
                        </div>

                        <div class="form-group">
                            <label for="password1">Senha</label>
                            <input class="form-control" type="password" name="senha" required=""
                                id="password1" placeholder="Senha">
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"
                                    id="customCheck2">
                                <label class="custom-control-label"
                                    for="customCheck2">Lembrar senha</label>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-rounded btn-primary" type="submit">Entrar</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
        
    </div><!-- /.modal -->

    <div id="cadastrar-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center mt-2 mb-4">
                        <a href="index.html" class="text-success">
                            <span><img class="mr-2" src="<?php echo($pach)?>assets/images/logoo.png" width="50%"><img
                                    src="assets/images/logo-text.png" alt=""
                                    height="18"></span>
                        </a>
                    </div>

                    <form class="pl-3 pr-3" method="POST" action="<?php echo $pach?>usuarios/cadastrar">

                        <div class="form-group">
                            <label for="emailaddress1">Nome Completo</label>
                            <input class="form-control" name="nome" type="text" id="emailaddress1"
                                required="" placeholder="Nome completo">
                        </div>
                        <div class="form-group">
                            <label for="emailaddress2">Nome Completo</label>
                            <select name="genero" id="emailaddress2">
                              <option value="Masculino">Masculino</option>
                              <option value="Feminino">Feminino</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Usuário</label>
                            <input class="form-control" name="usuario" type="text" id="usuario"
                                required="" placeholder="Usuário ou email">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" name="email" type="email" id="email"
                                required="" placeholder="Usuário ou email">
                        </div>

                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input class="form-control" name="senha" type="password" required=""
                                id="senha" placeholder="Senha">
                        </div>
                        <div class="form-group">
                            <label for="confsenha">Confirmar senha</label>
                            <input class="form-control" type="password" required=""
                                id="confsenha" placeholder="Senha">
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-rounded btn-primary" type="submit">Submeter</button>
                        </div>

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> 
</body>
</html>
    




  

 