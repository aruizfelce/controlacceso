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
        // session_start();
        // if(!isset($_SESSION["usuario"])) //si no no está logueado va a la pagina de logueo
        // {
            // header("Location:ingresar.php");

        // }
    	 include("encabezado.php");
		// $base=getPDO();
		// $profesor=$_SESSION["idusuario"];
		// $administrador=$_SESSION["administrador"];
   ?>    
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <h4 class="text-light">Logo</h4>
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                    <li>
                        
                        <a href="#" class="px-3 text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle user"></i><spam class="text-light"> <?php echo $_SESSION["usuario"] ?> </spam></a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
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
                    
                    <!-- ********************* -->
                        <?php
                                   
								   $base=getPDO();
                                   $profesor=$_SESSION["idusuario"];
                                  $administrador=$_SESSION["administrador"];
                                    
                                //**********************PAGINACION*****************************
                                    
                               if($administrador!=1)
                                header("Location:menu.php");

                            if(isset($_GET["pagina"])){
                                if($_GET["pagina"]==1)
                                    header("Location:menu.php");
                                else
                                    $pagina=$_GET["pagina"];
                            }else
                                    $pagina=1;

                            $filaspaginas=100;

                            $empezar_desde = ($pagina-1) * $filaspaginas;
                            
                                $conexion = $base->query("SELECT * FROM accesos LIMIT $empezar_desde,$filaspaginas");
                            
                            $registros = $conexion->fetchAll(PDO::FETCH_OBJ);

                            
                                $sql_total = "SELECT * FROM accesos";
                            

                            $resultado = $base->prepare($sql_total);
                            
                            $resultado->execute(array());

                            $numfilas=$resultado->rowCount();

                            $totalpaginas = ceil($numfilas / $filaspaginas);



                                //*****************************FIN PAGINACION*******************////
                                
                                        if(ISSET($_POST["insertar"])){
                                        $nombre = $_POST["nombre"];
                                        $apellido = $_POST["apellido"];
                                        $cedula = $_POST["cedula"];
                                        $empresa = $_POST["empresa"];
                                        $localidad = $_POST["localidad"];
                                        $tipo = $_POST["tipo"];
                                        $status = $_POST["status"];
                                        $fecha_registro = $_POST["fecha_registro"];
                                        
                                        $sql="INSERT INTO accesos (nombre,apellido,cedula,empresa,localidad,tipo,status,fecha_registro) 
                                            VALUES(:nombre,:apellido,:cedula,:empresa,:localidad,:tipo,:status,:fecha_registro)";
                                        $resultado=$base->prepare($sql);
                                        $resultado->execute(array(":nombre"=>$nombre,":apellido"=>$apellido,":cedula"=>$cedula,":empresa"=>$empresa,":localidad"=>$localidad,":tipo"=>$tipo,":status"=>$status,":fecha_registro"=>$fecha_registro));
                                        header("Location:menu.php");
                                    }

                                ?>
                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                <div class="container-fluid">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr class="d-flex" tr>
                                            
                                            <th class="col-2">Nombre</th>
                                            <th class="col-2">Apellido</th>
                                            <th class="col-1">Cedula</th>
                                            <th class="col-1">Empresa</th>
                                            <th class="col-2">Localidad</th>
                                            <th class="col-1">Tipo</th>
                                            <th class="col-1">Estatus</th>
                                            <th class="col-1">Fecha</th>
                                            <th class="col-1">Opciones</th>      
                                           
                                           </tr>
                                    </thead> 

                                    <?php 
                                    foreach($registros as $titulos):?>
                                    <tbody>
                                    <thead class="thead-dark">
                                    <tr class="d-flex"> 

                                            <td class="col-2"><?php echo $titulos->nombre?></td>	
                                            <td class="col-2"><?php echo $titulos->apellido?></td>	
                                            <td class="col-1"><?php echo $titulos->cedula?></td>	
                                            <td class="col-1"><?php echo $titulos->empresa?></td>
                                            <td class="col-2"><?php echo $titulos->localidad?></td>
                                            <td class="col-1"><?php echo $titulos->tipo?></td>	
                                            <td class="col-1"><?php echo $titulos->status?></td>
                                            <td class="col-1"><?php echo $titulos->fecha_registro?></td>	
                                            <td class="col-1">
                                                <a href="borrartse.php?id=<?php echo $titulos->idTSE?>"><img src="img/borrar.png" alt="x" /></a> 
                                                <a href="editartse.php?id=<?php echo $titulos->idTSE?> &
                                                                tit=<?php echo $titulos->usuario?> &
                                                                descrip=<?php echo $titulos->nombre?>	
                                                        ">	
                                                            
                                                    <input type="button" 
                                                        name="actualizar" 
                                                        style="background-color:transparent; border-color:transparent;"> 
                                                        <img src="img/editar.png" height="25">
                                                    
                                                </a>	
                                                <script>
                                                    $(function () {
                                                            $('[data-toggle="tooltip"]').tooltip()
                                                })
                                                </script>
                                                
                                            </td>
                                        </tr>
                                    
                                        <?php endforeach;?>	

                                    </tbody>
                                </table>
                                </div>

                                <nav >
                                    <ul class="pagination justify-content-center pagination-lg">
                                        <?php  
                                                for($i=1;$i<=$totalpaginas;$i++){
                                                    if($i>1)
                                                        echo "<li class='page-item'> <a class='page-link' href='?pagina=" . $i . "'>" . $i . "</a>  "; 
                                                    else
                                                        echo "<li class='page-item'> <a class='page-link' href='?'>" . $i . "</a>  "; 
                                                }	
                                        ?>
                                    </ul>
                                </nav>

                                <table class="table">      
                                        <br>		
                                        <h3>Agregar Nuevo Usuario</h3>
                                        <thead class="thead-dark">
                                        <tr class="d-flex"> 
                                        <tr>
                                            <!-- <th>Id</th>  -->

                                            <th class="col-2">Nombre</th>
                                            <th class="col-2">Apellido</th>
                                            <th class="col-1">Cedula</th>
                                            <th class="col-1">Empresa</th>
                                            <th class="col-1">Localidad</th>
                                            <th class="col-1">Tipo</th>
                                            <th class="col-1">Estatus</th>
                                            <th class="col-1">Fecha</th>
                                            <th class="col-1">Opciones</th>
                                            </tr>
                                        <td class="col-1"><input type="text"  class="form-control" rows="4" name="nombre" pattern="[a-zA-Z ]{2,254}"></td>
                                        <td class="col-1"><input type="text"  class="form-control" rows="4" name="apellido"></td>		
                                        <td class="col-1"><input type="text"  class="form-control" rows="4" name="cedula"></td>
                                        <td class="col-1"><input type="text"  class="form-control" rows="4" name="empresa"></td>
                                        <td class="col-1"> <select name="localidad">   <option value="ADC AGENCIA BARCELONA"  >ADC AGENCIA BARCELONA</option>
                                                                                       <option value="ADC AGENCIA PORLAMAR"   >ADC AGENCIA PORLAMAR</option>
                                                                                       <option value="ADC AGENCIA UNARE"  >ADC AGENCIA UNARE</option>
                                                                                       <option value="APC  PLANTA CUMANA"  >APC  PLANTA CUMANA</option>
                                                                                       <option value="APC AGENCIA  CARUPANO"  >APC AGENCIA  CARUPANO</option>
                                                                                       <option value="APC CL CIUDAD BOLIVAR"  >APC CL CIUDAD BOLIVAR</option>
                                                                                       <option value="APC ODV CUMANA"  >APC ODV CUMANA</option>
                                                                                       <option value="CP AGENCIA CARUPANO"  >CP AGENCIA CARUPANO</option>
                                                                                       <option value="CP AGENCIA CUMANA"  >CP AGENCIA CUMANA</option>
                                                                                       <option value="CP AGENCIA LA FUENTE"  >CP AGENCIA LA FUENTE</option>
                                                                                       <option value="CP AGENCIA PUNTA DE MATA"  >CP AGENCIA PUNTA DE MATA</option>
                                                                                       <option value="CP AGENCIA SAN FELIX"  >CP AGENCIA SAN FELIX</option>
                                                                                       <option value="CP AGENCIA TUCUPITA "  >CP AGENCIA TUCUPITA</option>
                                                                                       <option value="CP AGENCIA TUMEREMO"  >CP AGENCIA TUMEREMO</option>
                                                                                       <option value="CP AGENCIA UNARE"  >CP AGENCIA UNARE</option>
                                                                                       <option value="CP AGENCIA UPATA"  >CP AGENCIA UPATA</option>
                                                                                       <option value="CP PLANTA ORIENTE"  >CP PLANTA ORIENTE</option>
                                                                                       <option value="PCV AGENCIA ANACO"  >PCV AGENCIA ANACO</option>
                                                                                       <option value="PCV AGENCIA BARCELONA"  >PCV AGENCIA BARCELONA</option>
                                                                                       <option value="PCV AGENCIA CARUPANO"  >PCV AGENCIA CARUPANO</option>
                                                                                       <option value="PCV AGENCIA CIUDAD BOLIVAR"  >PCV AGENCIA CIUDAD BOLIVAR</option>
                                                                                       <option value="PCV AGENCIA CLARINES"  >PCV AGENCIA CLARINES</option>
                                                                                       <option value="PCV AGENCIA CUMANA"  >PCV AGENCIA CUMANA</option>
                                                                                       <option value="PCV AGENCIA MATURIN"  >PCV AGENCIA MATURIN</option>
                                                                                       <option value="PCV AGENCIA PORLAMAR"  >PCV AGENCIA PORLAMAR</option>
                                                                                       <option value="PCV AGENCIA SAN FELIX"  >PCV AGENCIA SAN FELIX</option>
                                                                                       </select>

                                        <td class="col-1"> <select name="tipo">   <option value="CONTRATISTAS"  >CONTRATISTAS</option>
                                                                                  <option value="VISITANTES"  >VISITANTES</option>
                                                                                  <option value="CHOFERES"  >CHOFERES</option>
                                                                                  <option value="VIGILANTES"  >VIGILANTES</option>                              
                                                                                  </select>

                                        <td class="col-1"> <select name="status">   <option value="APTO"  >APTO</option>
                                                                                    <option value="NO APTO"  >NO APTO</option>
                                                                                    </select>

                                      <td class="col-1"> <input type="date" id="fecha_registro" name="fecha_registro"
                                                                            value="000-00-00"
                                                                            min="1980-01-01" max="2121-12-31">
                                                                                        


                                        <td class="col-1"><button class="btn btn-default" type="submit" name="insertar"><img src="img/guardar.png" width="40"/></button></td>
                                    </tr>
        
           
                                 </div>

                                
                                    </thead> 

                        </div>
                    <!-- ******************************** -->
                </div>

            </main>
        </div>
    </div>


</body>

</html>