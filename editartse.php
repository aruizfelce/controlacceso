<?php include 'encabezado.php'; ?>
<?php include 'usuario.php'; ?>
	<?php

		include("conexion.php");
		$base=getPDO();
		
		if(!isset($_POST["actualizar"])){
			$id=$_GET["id"];
			$titulo= $_GET["tit"];
			$descripcion= $_GET["descrip"];
			
		}	
		else{
			$id=$_POST["id"];
			$titulo= $_POST["titulo"];
			$descripcion= $_POST["descripcion"];
			

			$sql="UPDATE cursos SET titulo=:tit, descripcion=:descrip WHERE idCurso=:miId";

			$resultado=$base->prepare($sql);

			$resultado->execute(array(":miId"=>$id,":tit"=>$titulo,":descrip"=>$descripcion));

			header("Location:cursos.php");
		}
	?>	

	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table class="table">
			<thead class="thead-dark">
		  	<tr>
		  		<th class="col-4">Pregunta</th>
				<th class="col-7">Respuesta1</th>
				
				<th class="col-1">Opciones</th>
			</tr>	
		  	    <input name="id" type="hidden" value="<?php echo $id?>"></td>
			<tr>
				<td class="col-4"><textarea class="form-control" rows="4" name="titulo"><?php echo $titulo?></textarea></td> 
				<td class="col-7"> <textarea class="form-control" rows="4" name="descripcion"><?php echo $descripcion?></textarea> </td>
				
				<td class="col-1">  <input type="submit" name="actualizar" class="botonimagen" value=""></td>
			</tr>
		</table>
	</form>
</div>