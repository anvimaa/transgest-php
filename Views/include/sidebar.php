<?php require_once 'config.php';

?>
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="<?php echo($pach)?>assets/images/logo1.png" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details"><?php echo($_SESSION['usuario'])?><i class="fa fa-caret-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-email"></i><?php echo($_SESSION['email'])?></a>
                        <a href="<?php echo $pach?>"><i class="ti-book"></i><?php echo($_SESSION['cargo'])?></a>
                        <a href="<?php echo($pach)?>"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-15 p-b-0">
            <!--
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                </div>
            </form>-->
        </div>
        <a class="pcoded-navigation-label" data-i18n="nav.category.navigation"></a>
        <?php if(($_SESSION['cargo'])!='Visitante'){ ?>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="<?php echo $pach?>home/painel" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Licencimento</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                <li class="pcoded-hasmenu ">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Livretes</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="<?php echo $pach?>livrete" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Lista livretes</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo $pach?>livrete/adicionar" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Registar livrete</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <!--
                        <li class="">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Lic. de Condução</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>-->
                    </ul>
                </li>
                <li class="pcoded-hasmenu ">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-direction-alt"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Licenca de taxi</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="">
                            <a href="<?php echo $pach?>licencataxi" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Listar licenças</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo $pach?>licencataxi/adicionar" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Registar licenca</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <!--
                        <li class="">
                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Lic. de Condução</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>-->
                    </ul>
                </li>
                    <li class=" ">
                        <a href="<?php echo $pach?>licencamototaxi" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Licenca de mototaxi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <!--
                    <li class=" ">
                        <a href="button.html" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Carteira profissional</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>-->
                </ul>
            </li>
        </ul>
        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Praças &amp; Mototaxistas</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="<?php echo $pach?>paradas" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Praças de mototaxis</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="<?php echo $pach?>mototaxista" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Mototaxistas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Automovel &amp; Motorizados</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="<?php echo $pach?>veiculo" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="icofont icofont-motor-bike"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Veículos</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="<?php echo $pach?>viatura" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="icofont icofont-car"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Viaturas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="<?php echo $pach?>proprietario" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="icofont icofont-car"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Proprietário</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.other">Other</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="map-google.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Utilizadores</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <?php }else{?>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="<?php echo $pach?>home/painel" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Início</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Registar</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="<?php echo $pach?>livrete/adicionar" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Licença mototaxi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo $pach?>licencataxi/adicionar" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Licenca viatura</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--
            <li class="pcoded-hasmenu ">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-search"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.main">Consultar</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="<?php echo $pach?>livrete/adicionar" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Licença mototaxi</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="">
                        <a href="<?php echo $pach?>licencataxi/adicionar" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.menu-levels.menu-level-22.menu-level-31">Licenca viatura</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>-->
        <?php }?>
    </div>
</nav>