
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
        $_SESSION["existe"]=0;
      ?>
      <div class="card text-center bg-dark text-warning mb-3">
        <div class="card-body">
          <br><br><br>
          <h1 class="display-2"><span style="color:white">Bienvenido</span></h1>
          <br><br><br>
          <a class="btn btn-warning" href="ingresar.php">Ingresar</a>
          <a class="btn btn-warning" href="registrar.php">Registrarse</a>
    </div>
  
</div>
      
  </div>
    
 
  <?php include 'pie.php'; ?>