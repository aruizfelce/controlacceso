<?php include 'encabezado.php'; 

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<title>Title</title>
</head>

<body>


</body>


</html>


<?php 
 
 include("conn.php");

 $base=getPDO();
 $profesor=$_SESSION["idusuario"];
 $administrador=$_SESSION["administrador"];
                                    
//**********************PAGINACION*****************************
                                    
                               // if($administrador!=1)
                               // header("Location:buscaravance.php");

                            if(isset($_GET["pagina"])){
                                if($_GET["pagina"]==1)
                                    header("Location:buscaravance.php");
                                else
                                    $pagina=$_GET["pagina"];
                            }else
                                    $pagina=1;

                            $filaspaginas=5;

                            $empezar_desde = ($pagina-1) * $filaspaginas;
                            
                                $conexion = $base->query("SELECT * FROM accesos LIMIT $empezar_desde,$filaspaginas");
                            
                            $registros = $conexion->fetchAll(PDO::FETCH_OBJ);

                            
                                $sql_total = "SELECT * FROM accesos";
                            

                            $resultado = $base->prepare($sql_total);
                            
                            $resultado->execute(array());

                            $numfilas=$resultado->rowCount();

                            $totalpaginas = ceil($numfilas / $filaspaginas);



 //*****************************FIN PAGINACION*******************////
                         
        
 if (!isset($_POST['buscar'])){$_POST['buscar'] = '';}
 if (!isset($_POST['localildad'])){$_POST['localidad'] = '';}
 if (!isset($_POST['status'])){$_POST['status'] = '';}
 if (!isset($_POST['fecha_registro'])){$_POST['fecha_registro'] = '';}
 if (!isset($_POST['buscafechadesde'])){$_POST['buscafechadesde'] = '';}
 if (!isset($_POST['buscafechahasta'])){$_POST['buscafechahasta'] = '';}
 if (!isset($_POST['cedula'])){$_POST['cedula'] = '';}
 if (!isset($_POST['cedula'])){$_POST['buscapreciodesde'] = '';}
 if (!isset($_POST['nombres'])){$_POST['nombres'] = '';}
 if (!isset($_POST['apellido'])){$_POST['apellido'] = '';}
 if (!isset($_POST['tipo'])){$_POST['tipo'] = '';}
 if (!isset($_POST["orden"])){$_POST["orden"] = '';}
		               
?>

<div class="container mt-5">
    <div class="col-12">
 
    <div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">

        <h4 class="card-title">Buscador</h4>


<form id="form2" name="form2" method="POST" action="buscaravance.php">
        <div class="col-12 row">

            <div class="mb-3">
                    <h4 class="form-label">Cedula a buscar</h4>
                    <input type="texto" class="form-control" id="buscar" name="buscar" value="<?php echo $_POST["buscar"] ?>">
            </div>

            <h4 class="card-title">Filtro de búsqueda</h4>  
            
            <div class="col-11">

                        <table class="table">
                                <thead>
                                        <tr class="filters">
                                                <th>
                                                        Tipo
                                                        <select id="assigned-tutor-filter" id="tipo" name="tipo" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                <?php if ($_POST["tipo"] != ''){ ?>
                                                                <option value="<?php echo $_POST["tipo"]; ?>"><?php echo $_POST["tipo"]; ?></option>
                                                                <?php } ?>
                                                                <option value="">Todos</option>
                                                                <option value="CONTRATISTA">CONTRATISTA</option>
                                                                <option value="VISITANTE">VISITANTE</option>
                                                                <option value="CHOFER">CHOFER</option>
                                                                <option value="VIGILANTE">VIGILANTE</option>
                                                        </select>
                                                </th>
                                                <th>
                                                        Nombres
                                                        <input type="texto" id="nombres" name="nombres" class="form-control mt-2" value="<?php echo $_POST["nombres"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                        Apellidos
                                                        <input type="texto" id="apellido" name="apellido" class="form-control mt-2" value="<?php echo $_POST["apellido"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                         
                                                <th>
                                                        Fecha desde:
                                                        <input type="date" id="buscafechadesde" name="buscafechadesde" class="form-control mt-2" value="<?php echo $_POST["buscafechadesde"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                        Fecha hasta:
                                                        <input type="date" id="buscafechahasta" name="buscafechahasta" class="form-control mt-2" value="<?php echo $_POST["buscafechahasta"]; ?>" style="border: #bababa 1px solid; color:#000000;" >
                                                </th>
                                                <th>
                                                        Estatus
                                                        <select id="subject-filter" id="status" name="status" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                <?php if ($_POST["status"] != ''){ ?>
                                                                <option value="<?php echo $_POST["status"]; ?>"><?php echo $_POST["status"]; ?></option>
                                                                <?php } ?>
                                                                <option value="">Todos</option>
                                                                <option style="color: blue;" value="APTO">APTO</option>
                                                                <option style="color: red;" value="NO APTO">NO APTO</option>
                                                        </select>
                                                </th>
                                        </tr>
                                </thead>
                        </table>
                </div>


                <h4 class="card-title">Ordenar por</h4>  
            
            <div class="col-11">

                        <table class="table">
                                <thead>
                                        <tr class="filters">
                                                <th>
                                                        Selecciona el orden
                                                        <select id="assigned-tutor-filter" id="orden" name="orden" class="form-control mt-2" style="border: #bababa 1px solid; color:#000000;" >
                                                                <?php if ($_POST["orden"] != ''){ ?>
                                                                <option value="<?php echo $_POST["orden"]; ?>">
                                                                <?php 
                                                                if ($_POST["orden"] == '1'){echo 'Ordenar por nombre';} 
                                                                if ($_POST["orden"] == '2'){echo 'Ordenar por Tipo';} 
                                                                if ($_POST["orden"] == '3'){echo 'Ordenar por Estatus';}
                                                                if ($_POST["orden"] == '4'){echo 'Ordenar por fecha de reciente';} 
                                                                if ($_POST["orden"] == '5'){echo 'Ordenar por fecha de antigua';} 
                                                                ?>
                                                                </option>
                                                                <?php } ?>
                                                                <option value=""></option>
                                                                <option value="1">Ordenar por Nombres</option>
                                                                <option value="2">Ordenar por Tipo</option>
                                                                <option value="3">Ordenar por Estatus</option>
                                                                <option value="4">Ordenar por fecha de reciente</option>
                                                                <option value="5">Ordenar por fecha de antigua</option>
                                                        </select>
                                                </th>
                                          
                                              
                                      
                                        </tr>
                                </thead>
                        </table>
                </div>


                <div class="col-1">
                        <input type="submit" class="btn " value="Ver" style="margin-top: 38px; background-color: purple; color: white;">
                </div>
        </div>


        <?php 
        /*FILTRO de busqueda////////////////////////////////////////////*/

        if ($_POST['buscar'] == ''){ $_POST['buscar'] = ' ';}
        $aKeyword = explode(" ", $_POST['buscar']);
        
       
        if ($_POST["buscar"] == '' AND $_POST['localidad'] == '' AND $_POST['tipo'] == '' AND $_POST['status'] == '' AND $_POST['fecha_registro'] == '' AND $_POST['cedula'] == ''AND $_POST['nombre'] == '' AND $_POST['apellido'] == ''){ 
                $query ="SELECT * FROM accesos ";
        }else{

                $query ="SELECT * FROM accesos ";

        if ($_POST["buscar"] != '' ){ 
                $query .= "WHERE (cedula LIKE LOWER('%".$aKeyword[0]."%') OR apellido LIKE LOWER('%".$aKeyword[0]."%')) ";
        
        for($i = 1; $i < count($aKeyword); $i++) {
           if(!empty($aKeyword[$i])) {
               $query .= " OR cedula LIKE '%" . $aKeyword[$i] . "%' OR apellido LIKE '%" . $aKeyword[$i] . "%'";
           }
         }

        }

         if ($_POST["tipo"] != '' ){
                $query .= " AND tipo = '".$_POST['tipo']."' ";
         }

         if ($_POST["buscafechadesde"] != '' ){
                $query .= " AND fecha_registro BETWEEN '".$_POST["buscafechadesde"]."' AND '".$_POST["buscafechahasta"]."' ";
         }

         if ( $_POST['cedula'] != '' ){
                $query .= " AND cedula >= '".$_POST['cedula']."' ";
        }
                
        if ( $_POST['nombres'] != '' ){
                        $query .= " AND nombre >= '".$_POST['nombres']."' ";
         }

         if ( $_POST['apellido'] != '' ){
                $query .= " AND apellido <= '".$_POST['apellido']."' ";
         }
               
         if ($_POST["status"] != '' ){
                $query .= " AND status = '".$_POST["status"]."' ";
         }

         if ($_POST["orden"] == '1' ){
                $query .= " ORDER BY nombre ASC ";
         }

         if ($_POST["orden"] == '2' ){
                $query .= " ORDER BY tipo ASC ";
         }

         if ($_POST["orden"] == '3' ){
                $query .= " ORDER BY status ASC ";
         }

         if ($_POST["orden"] == '4' ){
                $query .= " ORDER BY fecha_registro ASC ";
         }

         if ($_POST["orden"] == '5' ){
                $query .= " ORDER BY fecha_registro DESC ";
         }     
       
                }


         $sql = $conn->query($query);

         $numeroSql = mysqli_num_rows($sql);

        ?>
        <p style="font-weight: bold; color:purple;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?> Resultados encontrados</p>
</form>

<div class="table-responsive">
        <table class="table">
                <thead>
                <tr style="background-color:purple; color:#FFFFFF;">
                        
                                <th style=" text-align: center;"> Cedula </th>
                                <th style=" text-align: center;"> Nombre </th>
                                <th style=" text-align: center;"> Apellido </th>
                                <th style=" text-align: center;"> Tipo </th>
                                <th style=" text-align: center;"> Localidad </th>
                                <th style=" text-align: center;"> Estatus </th>
                                <th style=" text-align: center;"> Fecha </th>
                        </tr>
                </thead>
                <tbody>

                <?php 
                        foreach($registros as $titulos)
                        While($rowSql = $sql->fetch_assoc()) {   ?>
               
                        <tr>
                        <td style="text-align: center;"><?php echo $rowSql["cedula"]; ?></td>
                        <td style="text-align: center;"><?php echo $rowSql["nombre"]; ?></td>
                        <td style="text-align: center;"><?php echo $rowSql["apellido"]; ?> </td>
                        <td style="text-align: center;"><?php echo $rowSql["tipo"]; ?></td>
                        <td style="text-align: center;"><?php echo $rowSql["localidad"]; ?></td>
                        <td style="text-align: center;"><?php echo $rowSql["status"]; ?></td>
                        <td style="text-align: center;"><?php echo $rowSql["fecha_registro"]; ?></td>
                        </tr>

                                
               <?php }
               
               ?>

   </tbody> 
        </table>
</div>
                           