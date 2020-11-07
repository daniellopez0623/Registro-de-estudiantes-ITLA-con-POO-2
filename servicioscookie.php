<?php

class servidorcookie implements serviciosprim{
 
    private $utilities;
    private $cookienombre;
    
    public function __construct(){
        
        $this->servicios = new Servicios();
        $this->cookienombre = "estudiante";
    }
public function Getlista(){

$listaestudiante = array();

if(isset($_COOKIE[$this->cookienombre])){

$listaestudiantedecode= json_decode ($_COOKIE[$this->cookienombre],false);

   
foreach ($listaestudiantedecode as $elementoD) {
    $element=new estudiante();
$element->set($elementoD);
    
        array_push($listaestudiante,$element);
    }


}else{
    setcookie($this->cookienombre,json_encode($listaestudiante),$this->servicios->cookietime(),"/");
}
return $listaestudiante;

}

public function GetByid($id){
    
    $listaestudiante = $this->Getlista();
    $estudiante = $this->servicios->buscar($listaestudiante,'id',$id)[0];
    return $estudiante;
}

public function añadir($entidad)
{
    $listaestudiante=$this->Getlista();
    $idestudiante=1;
    
    if(!empty($listaestudiante)){
        $lastestudiante=$this->servicios->getLastElement($listaestudiante);
        $idestudiante=$lastestudiante->id+1;
    }
$entidad->id=$idestudiante;
$entidad->proPhoto = "";

if(isset($_FILES['proPhoto'])){
    
    $photofile=$_FILES['proPhoto'];

    if($photofile['error']==4){
    
    $entidad->proPhoto = "";
    
   }else{

$typeReplace = str_replace("image/", "", $_FILES['proPhoto']['type']);
 $type= $photofile['type'];
 $size= $photofile['size'];
 $name= $idestudiante . '.' . $typeReplace;
 $tmpname= $photofile['tmp_name'];
 
 $success=$this->servicios->uploadImage('imagenes/estudiante/',$name,$tmpname,$type,$size);
 
 if($success){
     $entidad->proPhoto= $name;
 }
}
}

array_push($listaestudiante,$entidad);

 setcookie($this->cookienombre,json_encode($listaestudiante),$this->servicios->cookietime(),"/");
    
}

public function editar($id,$entidad){
    
$elemento=$this->GetByid($id);
    $listaestudiante = $this->Getlista();

    $elementoindex=$this->servicios->getelemento($listaestudiante,'id',$id);

if(isset($_FILES['proPhoto'])){
    
    $photofile=$_FILES['proPhoto'];
    
if($photofile['error']==4){
    
    $entidad->proPhoto = $elemento->proPhoto;
    
}else{
    
$typeReplace = str_replace("image/", "", $_FILES['proPhoto']['type']);
 $type= $photofile['type'];
 $size=$photofile['size'];
 $name=$id . '.' . $typeReplace;
 $tmpname=$photofile['tmp_name'];
 
 $success=$this->servicios->uploadImage('imagenes/estudiante/',$name,$tmpname,$type,$size);
 
 if($success){
     $entidad->proPhoto= $name;
 }
    
}
}
 
$listaestudiante[$elementoindex]=$entidad;
setcookie($this->cookienombre,json_encode($listaestudiante),$this->servicios->cookietime(),"/");
    
}


    public function eliminar($id){

        
        $listaestudiante=$this->Getlista();
        $elementoindex=$this->servicios->getelemento($listaestudiante,'id',$id);

unset($listaestudiante[$elementoindex]);
$listaestudiante=array_values($listaestudiante);
setcookie($this->cookienombre,json_encode($listaestudiante),$this->servicios->cookietime(),"/");



}

}

?>