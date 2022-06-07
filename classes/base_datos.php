<?php
class ConectaraBD{
    public static function Conexion(){
     $Server = "localhost";
     $User = "root";
     $Password = "";
     $Conexion = mysqli_connect($Server,$User,$Password);
     mysqli_query($Conexion,"SET NAMES 'utf8'");
     mysqli_select_db($Conexion, "timbox");
     if (mysqli_connect_errno()) {
        printf("Conexión fallida: %s\n", mysqli_connect_error());
        exit();
    }
     return $Conexion;
    }
}

 ?>
