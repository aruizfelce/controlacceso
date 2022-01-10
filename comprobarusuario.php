<?php 
include("conexion.php");
    
$connexion=getPDO();

if ($connexion){ 
    sleep(1);
    if (isset($_POST)) {

        $sql="SELECT * FROM usuarios WHERE idUsuario = :login";
        
        $resultado = $base->prepare($sql);
        
        $username = (string)$_POST['idUsuario'];
                
        $resultado->bindValue(":login",$username);

        $resultado->execute();
        
        $numero_registros=$resultado->rowCount(); 

        if ($numero_registros>0){
            echo '<div class="alert alert-danger"><strong>Oh no!</strong> Nombre de usuario no disponible.</div>';
        } else {
            echo '<div class="alert alert-success"><strong>Enhorabuena!</strong> Usuario disponible.</div>';
        }
    }   
}
?>