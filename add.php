<?php

require_once 'servicios.php';
require_once 'class.php';
require_once 'serviciosprim.php';
require_once 'servicioscookie.php';

$servicioscookie = new servidorcookie();
$servicios =new Servicios();

if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['materia1'])  && isset($_POST['materia2']) && isset($_POST['materia3'])
&& isset($_POST['carrera']) && isset($_FILES['proPhoto'])) {

$newestudiante = new Estudiante();

$newestudiante->iniciodatos(0,$_POST['nombre'],$_POST['apellido'],$_POST['materia1'],$_POST['materia2'],$_POST['materia3'],$_POST['carrera']);

$listaestudent->añadir($newestudiante);


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


                   <form  action=" add.php" method="post">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control " id="nombre" name="nombre" placeholder="Ingrse su nombre">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Ingrse su apellido">
                        </div>

                        <div class="form-group">
                            <label for="matreias">Materias Favorita</label>
                            <input type="text" class="form-control" id="materia1" name="materia1"
                                placeholder="Materias Favorita">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="materia2" name="materia2"
                                placeholder="Materia Favorita">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="materia3" name="materia3"
                                placeholder="Materia Favorita">
                        </div>

                        <div class="form-group">
                            <label>Selecciona Su Carrera</label>
                            <select class="form-control" id="carrera" name="carrera">
                                <?php

                              foreach ($servicios->carrera as $key => $text) : ?>
                                <option value="<?php echo $key; ?>"><?php echo $text; ?>
                                </option>
                             <?php endforeach; ?>

                            </select>
                            <br>
                            <div class="form-group">
                                <label for="photo">Seleciona la Foto</label>
                                <input type="file" class="form-control" id="photo" name="proPhoto">
                            </div>
                            <br>
                            <center>
                                <a href="index.php" class="btn btn-outline-secondary"> Atras &nbsp;&nbsp;
                                    <i class="fas fa-reply-all"></i></a>
                                <button type="submit" class="btn btn-outline-success">Enviar &nbsp;&nbsp; <i class="fas fa-paper-plane"></i></button>
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
