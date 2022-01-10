<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>
    
    <?php 
        session_start();
        if(!isset($_SESSION["usuario"])) //si no no está logueado va a la pagina de logueo
        {
            header("Location:ingresar.php");

        }
    	include("conexion.php");
		$base=getPDO();
		$profesor=$_SESSION["idusuario"];
		$administrador=$_SESSION["administrador"];
    ?>    
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <h4 class="text-light">Logo</h4>
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle user"></i><spam class="text-light"> <?php echo $_SESSION["usuario"] ?> </spam></a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item menuperfil cerrar" href="cerrar.php"><i class="fas fa-sign-out-alt m-1"></i>Salir
                            </a>
                        </div>
						
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-12 col-sm-auto">
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href="menu.php"><i class="fas fa-home"></i><span>Inicio</span></a>
                    <a href="tse.php"><i class="fas fa-home"></i><span>Usuarios</span></a>
                    <a href="buscaravance.php"><i class="fas fa-home"></i><span>Busqueda</span></a>
                    <a href="importar.php"><i class="fas fa-home"></i><span>importar a BD</span></a>
                    <a href="#"><i class="fas fa-home"></i><span>pagina</span></a>
                    <a href="#"><i class="fas fa-home"></i><span>pagina</span></a>
                </nav>
            </div>
            <main class="main col">
                <div class="row justify-content-center align-content-center text-center">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/646c794df3.js"></script>
                   <!-- ********************* -->
                   <div class="columna col-lg-12">
                        <?php
        
                                    $base=getPDO();
                                    $profesor=$_SESSION["idusuario"];
                                    $administrador=$_SESSION["administrador"];
