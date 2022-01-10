<?php
	require'conn.php';
	if(ISSET($_POST['search'])){
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($conn, "SELECT * FROM accesos WHERE fecha_registro BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
	    <td><?php echo $fetch['nombre']?></td>
		<td><?php echo $fetch['apellido']?></td>
		<td><?php echo $fetch['cedula']?></td>
		<td><?php echo $fetch['localidad']?></td>
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Registros no Existen</center></td>
			</tr>';
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM accesos") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query))
		{
?>
	<tr>
		<td><?php echo $fetch['nombre']?></td>
		<td><?php echo $fetch['apellido']?></td>
		<td><?php echo $fetch['cedula']?></td>
		<td><?php echo $fetch['localidad']?></td>
	</tr>
<?php
		}
	}
?>
