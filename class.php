<?php

class estudiante{

public $id;
public $nombre;
public $apellido;
public $materia1;
public $materia2;
public $materia3;
public $idcarrera;
public $proPhoto;
    
private $servicio;

public function __construct(){
    
    $this->servicio= new Servicios();
}

public function iniciodatos($id,$nombre,$apellido,$materia1,$materia2,$materia3,$idcarrera){
    
    $this->id=$id;
    $this->nombre=$nombre;
    $this->apellido=$apellido;
    $this->materia1=$materia1;
    $this->materia2=$materia2;
    $this->materia3=$materia3;
    $this->idcarrera=$idcarrera;
}

public function set($data){
    foreach ($data as $key => $value)$this->{$key} = $value;
}

function getcarrera(){

    if($this->idcarrera !=0 && $this->idcarrera != null)
    { 
        return $this->servicio->carrera[$this->idcarrera];
    }
}
}

?>