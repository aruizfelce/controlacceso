<?php include 'encabezado.php'; ?>
	<?php

		$base=getPDO();
		$profesor=$_SESSION["idusuario"];
		$administrador=$_SESSION["administrador"];

//**********************PAGINACION*****************************
		
       // if($administrador!=1)
			//header("Location:tse.php");

        if(isset($_GET["pagina"])){
			if($_GET["pagina"]==1)
				header("Location:tse.php");
			else
				$pagina=$_GET["pagina"];
		}else
				$pagina=1;

		$filaspaginas=10;

		$empezar_desde = ($pagina-1) * $filaspaginas;
		
			$conexion = $base->query("SELECT * FROM tse LIMIT $empezar_desde,$filaspaginas");
		
		$registros = $conexion->fetchAll(PDO::FETCH_OBJ);

        
			$sql_total = "SELECT * FROM tse";
		
	
		$resultado = $base->prepare($sql_total);
		
		$resultado->execute(array());

		$numfilas=$resultado->rowCount();

		$totalpaginas = ceil($numfilas / $filaspaginas);

//*****************************FIN PAGINACION*******************		

		if(ISSET($_POST["insertar"])){
			$usuario = $_POST["usuario"];
			$nombre = $_POST["nombre"];
			$apellido = $_POST["apellido"];
			$cedula = $_POST["cedula"];
			$telefono = $_POST["telefono"];
			$password = $_POST["password"];
			
			$sql="INSERT INTO tse (usuario,nombre,apellido,cedula,telefono,password) 
			      VALUES(:usuario,:nombre,:apellido,:cedula,:telefono,:password)";
			$resultado=$base->prepare($sql);
			$resultado->execute(array(":usuario"=>$usuario,":nombre"=>$nombre,":apellido"=>$apellido,":cedula"=>$cedula,":telefono"=>$telefono,":password"=>$password));
			header("Location:tse.php");
		}
 
	?>

  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <div class="container-fluid">
	<table class="table">
		<thead class="thead-dark">
		<tr class="d-flex" tr>
			
				<th class="col-2">Usuario</th>
				<th class="col-2">Nombre</th>
				<th class="col-2">Apellido</th>
				<th class="col-2">Cedula</th>
				<th class="col-2">Telefono</th>
				<th class="col-2">Opciones</th>
			</tr>
		</thead>
		<?php foreach($registros as $titulos):?>
		 <tbody>
		 <thead class="thead-dark">
			<tr class="d-flex">
				
				<td class="col-2"><?php echo $titulos->usuario?> </td>	
				<td class="col-2"><?php echo $titulos->nombre?></td>	
				<td class="col-2"><?php echo $titulos->apellido?></td>	
				<td class="col-2"><?php echo $titulos->cedula?></td>	
				<td class="col-2"><?php echo $titulos->telefono?></td>	
				<td class="col-2">
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

				<th class="col-2">Usuario</th>
				<th class="col-2">Nombre</th>
				<th class="col-2">Apellido</th>
				<th class="col-2">Cedula</th>
				<th class="col-2">Telefono</th>
				<th class="col-2">Password</th>
				<th class="col-2">Opciones</th>
			</tr>
		
			<td class="col-2"><input type="text"  class="form-control" rows="4" name="usuario"></td>
			<td class="col-2"><input type="text"  class="form-control" rows="4" name="nombre" pattern="[a-zA-Z ]{2,254}"></td>     
			<td class="col-2"><input type="text"  class="form-control" rows="4" name="apellido"></td>		
			<td class="col-2"><input type="text"  class="form-control" rows="4" name="cedula"></td>
			<td class="col-2"><input type="text"  class="form-control" rows="4" name="telefono"></td>
			<td class="col-2"><input type="text"  class="form-control" rows="4" name="password"></td>
			<td class="col-2"><button class="btn btn-default" type="submit" name="insertar"><img src="img/guardar.png" width="40"/></button></td>
		</tr>
     </table> 
 
  </form>
 
	
</div>

