<?php

?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" style="color:red"; role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="panel">AppDicun</a>
        </div>


        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">

            <li class="dropdown">
                <a class="dropdown" data-toggle="dropdown">
                    <i class="fa fa-user fa-fw"></i>

                    <?php echo $_SESSION["Empresa"]; ?>

                     <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                  <h5 class="dropdown-header">Configuración</h5>
                    <li><a href="editar-Perfil"><i class="fa fa-edit fa-fw"></i> Editar Información del Perfil</a>
                    </li>
                    <li><a href="#"><i class="fa fa-lock fa-fw"></i> Cambiar Contraseña</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuración de la Cuenta</a>
                    </li>
                    <li class="divider"></li>
                    <h5 class="dropdown-header">Salir de la Sección.</h5>
                    <li><a href="Logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>
