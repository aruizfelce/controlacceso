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
          if(isset($_SESSION["usuario"])) //si ya está logueado va al menu
          {
              header("Location:menu.php");
          }
      ?>

      
      
        <div class="card text-center  bg-dark  mb-3">
          <div class="card-body text-white">
            <br><br>
            <h1 class="display-2"><span style="color:white">Bienvenidos</span></h1>
            <br><br>
            <div class="container">
             
              <div class="row">
                <div class="col-8">
                  <form action="comprueba_login.php" method="post" >
                      <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Id</label>
                        <div class="col-sm-6">
                          <input type="text" maxlength="10" required class="form-control" name="id" id="id" placeholder="Ingrese su ID">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-6">
                          <input type="password" maxlength="10" required class="form-control" name="password" id="password" placeholder="Ingrese su Password">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="col-sm-10">
                          <input class="btn btn-warning" type="submit" name="enviar" value="Ingresar">
                          <a class="btn btn-warning" href="registrar.php">Registrase</a>
                        </div>
                        
                      </div>  
                    </form>
                </div> 
                <div class="col-4">
                    <?php
                        if(isset($_SESSION["nologin"])) //si el password es incorrecto muestra un alert indicando que es incorrecto
                          {
                    ?>       
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Id o Password incorrectos
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> 
                    <?php    
                          }
                    ?>
                    
                </div>  
                
              </div>
              </div>  
      </div>
    </div>
  
 

   <?php include 'pie.php'; ?>