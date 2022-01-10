<?php
  function getPDO () {
    try{
        
        $base = new PDO('mysql:host=localhost;dbname=matriz','root','');
      	$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        
        return $base;
    }
    catch(Exception $e){
        die("Error: " . $e->getMessage());
        return null;
    }
 } 
   
?>