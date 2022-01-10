<?php

require_once('conn.php');
$ReadSql = "SELECT * FROM `accesos`";
$res = mysqli_query($conn, $ReadSql);
include("header.php");
?>
<div style="width: 100%; height: 10px; clear: both;"></div>
	<h2>Mantenimiento de registros insertados con PHP Excel</h2>
		<table class="table"> 
		<thead> 
			<tr> 
				<th>#</th> 
				<th>Nombres</th> 
				<th>Apellidos</th> 
				<th>Cedula</th> 
				<th>Empresa</th> 
				<th>Estatus</th> 
				<th>Fecha</th> 
				<th>Tipo</th>
				<th>Localidad</th> 
			</tr> 
		</thead> 
		<tbody> 
		<?php 
		$i=0;
		while($r = mysqli_fetch_assoc($res)){$i++;
		?>
			<tr> 
				<th scope="row"><?php echo $i; ?></th> 
				<td><?php echo $r['nombre']; ?></td> 
				<td><?php echo $r['apellido']; ?></td> 
				<td><?php echo $r['cedula']; ?></td> 
				<td><?php echo $r['empresa']; ?></td> 
				<td><?php echo $r['status']; ?></td> 
                <td><?php echo $r['fecha_registro']; ?></td> 
				<td><?php echo $r['tipo']; ?></td> 
				<td><?php echo $r['localidad']; ?></td> 

	
			</tr> 
		<?php } ?>
		</tbody> 
		</table>
	</div>
</div>

  


<?php include ("footer.php"); ?>