<?php 

  require_once 'servicios.php';
  require_once 'class.php';
  require_once 'serviciosprim.php';
  require_once 'servicioscookie.php';
  
  $servicioscookie = new servidorcookie();

$id=isset($_GET['id']);

if($id){

    $listaestudent=$_GET['id'];
    $servicioscookie->eliminar($listaestudent);

}

header("location: index.php");
exist();

?>