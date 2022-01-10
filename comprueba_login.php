<?php
    include("conexion.php");
	
    	$base=getPDO();

      if ($base) 
        {
	
        $sql = "SELECT * FROM tst WHERE usuario = :login AND password= :password";

        $resultado = $base->prepare($sql);

        $login = htmlentities(addslashes($_POST["id"]));
        $password = htmlentities(addslashes($_POST["password"]));

        $resultado->bindValue(":login",$login);
        $resultado->bindValue(":password",$password);

        $resultado->execute();
        
        $numero_registros=$resultado->rowCount(); //almacena el numero de registros que puede ser 0 o 1
        
        //almacena el nombre del usuario: Nombre concatenado con Apellido
        $arr = $resultado->fetch(PDO::FETCH_ASSOC);
        $nombreUsuario = $arr['nombre'] . " " . $arr['apellido'];
        $administrador= $arr['administrador'];
        $Usuario= $arr['id'];
        
        if($numero_registros!=0){ //Si existe el usuario
            session_start();  //inicia la sesion asignando a la variable de sesion usuario el nombre del usuario
            $_SESSION["usuario"] = $nombreUsuario; 
            $_SESSION["idusuario"] = $usuario; 
            if ($administrador == 1)
                $_SESSION["administrador"] = 1;
            else
                $_SESSION["administrador"] = 0;
            
            header("location:menu.php");  //redirecciona al menu

        }else{ //si el password es incorrecto crea una variable de sesion llamada nologin indicando que los datos son incorectos
            session_start();
            $_SESSION["nologin"] = "Id o password incorrectos"; 
            header("location:ingresar.php"); //redirige a la pagina login para que vuelva a colocar los datos
        }
    }else{
        echo "Hubo un error con la conexion";
    }
?>