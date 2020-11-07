<?php

require_once 'servicios.php';
require_once 'class.php';
require_once 'serviciosprim.php';
require_once 'servicioscookie.php';

$servicioscookie = new servidorcookie();
$servicios =new Servicios();
 
 if(isset($_GET['id'])){

$idestudiante=$_GET['id'];
$elemento=$servicioscookie->GetByid($idestudiante);


if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['materia1'])  && isset($_POST['materia2']) && isset($_POST['materia3'])
&& isset($_POST['carrera'])&& isset($_FILES['proPhoto'])) {

  $actualizar=new estudiante();
  $actualizar->iniciodatos($idestudiante, $_POST['nombre'], $_POST['apellido'], $_POST['materia1'], $_POST['materia2'],$_POST['materia3'],
  $_POST['carrera']);
   
 $servicioscookie->editar($idestudiante,$actualizar);

   header("location: index.php");
   exit();

 }
 }
 else
 {
header("location: index.php");
   exit();

 }

 ?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/framework/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <title>Document</title>
</head>
<body>
    
<div class="card border-success container ">
  <div class="card-header text-center text-success bg-transparent border-success">
      <h2> Registrar Estudiante</h2></div>
  <div class="card-body ">

  <form  action="update.php?id=<?php echo $elemento->id; ?>"
                        method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" value=<?php echo $elemento->nombre; ?> class="form-control " id="nombre"
                                name="nombre" placeholder="Nuevo Nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" value=<?php echo $elemento->apellido; ?> class="form-control"
                                id="apellido" name="apellido" placeholder="Nuevo Apellido">
                        </div>

                        <div class="form-group">
                            <label for="materia">Materias Favoritas</label>
                            <input type="text" value=<?php echo $elemento->materia1; ?> class="form-control"
                                id="materia" name="materia1" placeholder="Nueva Materia">
                        </div>
                        <div class="form-group">

                            <input type="text" value=<?php echo $elemento->materia2; ?> class="form-control"
                                id="materia" name="materia2" placeholder="Nuevo Materia ">
                        </div>
                        <div class="form-group">
                            <input type="text" value=<?php echo $elemento->materia3; ?> class="form-control"
                                id="materia" name="materia3" placeholder="Nuevo Materia">
                        </div>


                        <div class="form-group">
                            <label>selecciona</label>
                            <select class="form-control" id="carrera" name="carrera">

                                <?php

                foreach ($servicios->carrera as $key => $text) : ?>

                                <?php if($key == $elemento->idcarrera): ?>

                                <option selected value="<?php echo $key; ?>"><?php echo $text; ?></option>

                                <?php else: ?>

                                <option value="<?php echo $key; ?>"><?php echo $text; ?></option>

                                <?php endif;?>
                                <?php endforeach; ?>

                            </select>

                            <br>
                            <img class=" card-img-top"
                                src="<?php echo "imagenes/estudiante/" . $elemento->profilePhoto ?>" width="100%"
                                height="225" aria-label="Placeholder: Thumbnail">
                            <div class="form-group">
                                <label for="photo">Seleciona la Foto</label>
                                <input type="file" class="form-control" id="photo" name="profilePhoto">
                            </div>


                            <br>
                            <center>
                                <a href="index.php" class="btn btn-outline-secondary">Volver atras &nbsp;&nbsp; <i
                                        class="fas fa-reply-all"></i></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="submit" class="btn btn-outline-success">Enviar &nbsp;&nbsp; <i
                                        class="fas fa-check"></i></button>
                            </center>

                        </div>
                    </form>
        
  </div>
  <div class="card-footer bg-transparent border-success"> 
  <center>
  <p>Por: Daniel lopez</p>
  <p>Telefono: 809-260-5869</p>
  <p>Correo: 20186367@itla.edu.do</p>
  </center>
  </div>
</div>

</body>

<script src="https://kit.fontawesome.com/96e239109c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

</html>
