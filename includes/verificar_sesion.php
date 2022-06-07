<?php
include_once("classes/classes.php");
if(isset($_SESSION["id_user"])){
    //$acceso = true;
}else{
    header('Location: index.php?nopermitido');
}

 ?>
