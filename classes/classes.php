<?php
include("base_datos.php");
date_default_timezone_set('America/Mexico_City');
session_start();
/////////////
class ParaLogin{
  public function Login($email, $password){
    $QuerySelect="SELECT * FROM tab_usuarios WHERE correo ='$email' AND password='$password'";
    $EjecutarConsulta=mysqli_query(ConectaraBD::Conexion(),$QuerySelect);
        $ParaLogin = mysqli_num_rows($EjecutarConsulta);
        if($ParaLogin == 0){
            header("Location: index.php?login=error");
        }else{
          if( $UsuarioActivo = mysqli_fetch_array($EjecutarConsulta)){
              $_SESSION["id_user"] = $UsuarioActivo["id_usuario"];
              $_SESSION["nombre_completo"] = $UsuarioActivo["nombre_completo"];
              header("Location: dashboard.php");
          }
        }
  }

}
///////////////////////////////////////////////////////////////////////////////////////////////////
/* REPORTE SALONES ELIMINADOS */
//
class Usuario{
  public function ConsultaCorreo($correo){
      $QuerySelect="SELECT * FROM tab_usuarios WHERE correo='$correo'";
      $ResultadoDeConsulta = mysqli_query(ConectaraBD::Conexion(),$QuerySelect);
      return $ResultadoDeConsulta ;
  }

  public function ConsultaRFC($rfc){
      $QuerySelect="SELECT * FROM tab_usuarios WHERE rfc='$rfc'";
      $ResultadoDeConsulta = mysqli_query(ConectaraBD::Conexion(),$QuerySelect);
      return $ResultadoDeConsulta ;
  }

  public function RegistrarUsuario($nombre, $correo, $rfc, $password){
    $QueryInsert ="INSERT INTO tab_usuarios(nombre_completo, correo, rfc, password, borrado) VALUES('$nombre', '$correo', '$rfc', '$password', NULL)";
      if(mysqli_query(ConectaraBD::Conexion(),$QueryInsert)){
        header("location: index.php?insert=ok");
      }else{
        header("location: registrar-nuevo-usuario.php?error=ok");
      }
  }

}
///////////////////////////////////////////////////////////////////////////////////////////////////
/* CONFIGURACION DEL USUARIO */
//
class ConfiguracionCuenta{
  public function ConsultaUsuario($id_usuario){
      $QuerySelect="SELECT * FROM tab_usuarios WHERE id_usuario=$id_usuario";
      $ResultadoDeConsulta = mysqli_query(ConectaraBD::Conexion(),$QuerySelect);
      return $ResultadoDeConsulta ;
  }

  public function ConsultaCorreo($correo, $id_usuario){
      $QuerySelect="SELECT * FROM tab_usuarios WHERE correo='$correo' AND id_usuario!=$id_usuario";
      $ResultadoDeConsulta = mysqli_query(ConectaraBD::Conexion(),$QuerySelect);
      return $ResultadoDeConsulta ;
  }

  public function ConsultaRFC($rfc, $id_usuario){
      $QuerySelect="SELECT * FROM tab_usuarios WHERE rfc='$rfc' AND id_usuario!=$id_usuario";
      $ResultadoDeConsulta = mysqli_query(ConectaraBD::Conexion(),$QuerySelect);
      return $ResultadoDeConsulta ;
  }

  public function EditarUsuario($id_usuario, $nombre, $correo, $rfc, $password){
    $QueryInsert ="UPDATE tab_usuarios SET nombre_completo='$nombre', correo='$correo', rfc='$rfc', password='$password' WHERE id_usuario=$id_usuario";
      if(mysqli_query(ConectaraBD::Conexion(),$QueryInsert)){
        header("location: configuracion-cuenta.php?insert=ok");
      }else{
        header("location: configuracion-cuenta.php?error=ok");
      }
  }

}
///////////////////////////////////////////////////////////////////////////////////////////////////
/* CONFIGURACION DEL USUARIO */
//
class Usuarios{
  public function RegistrarUsuario($id_usuario, $nombre, $rfc, $telefono, $website, $direccion){
    $QueryInsert ="INSERT INTO tab_user(id_registra, nombre, rfc, direccion, telefono, website, borrado) VALUES($id_usuario, '$nombre', '$rfc', '$direccion', '$telefono', '$website', NULL)";
      if(mysqli_query(ConectaraBD::Conexion(),$QueryInsert)){
        header("location: usuarios.php?insert=ok");
      }else{
        header("location: registrar-usuario.php?error=ok");
      }
  }

  public function EditarUsuario($id_usuario, $nombre, $rfc, $telefono, $website, $direccion){
    $QueryInsert ="UPDATE tab_user SET nombre='$nombre', rfc='$rfc', direccion='$direccion', telefono='$telefono', website='$website' WHERE id_user=$id_usuario";
      if(mysqli_query(ConectaraBD::Conexion(),$QueryInsert)){
        header("location: usuarios.php?insert=ok");
      }else{
        header("location: editar-usuario.php?usr=$id_usuario&error=ok");
      }
  }


  public function ConsultaUsuario($id_usuario){
      $QuerySelect="SELECT * FROM tab_user WHERE id_registra=$id_usuario AND borrado IS NULL ORDER BY nombre ASC";
      $ResultadoDeConsulta = mysqli_query(ConectaraBD::Conexion(),$QuerySelect);
      return $ResultadoDeConsulta ;
  }

  public function EliminarUsuario($id_usuario){
    $QueryInsert ="UPDATE tab_user SET borrado='SI' WHERE id_user=$id_usuario";
      if(mysqli_query(ConectaraBD::Conexion(),$QueryInsert)){
        header("location: usuarios.php?delete=ok");
      }else{
        header("location: usuarios.php?error=ok");
      }
  }

  public function ConsultaUser($id_usuario){
      $QuerySelect="SELECT * FROM tab_user WHERE id_user=$id_usuario";
      $ResultadoDeConsulta = mysqli_query(ConectaraBD::Conexion(),$QuerySelect);
      return $ResultadoDeConsulta ;
  }

}
///////////////////////////////////////////////////////////////////////////////////////////////////
/* PARA RESTABLECER EL PASSWORD */
//
class RestablecerPassword{
  public function ConsultaDatos($correo, $rfc){
      $QuerySelect="SELECT * FROM tab_usuarios WHERE correo='$correo' AND rfc='$rfc' AND borrado IS NULL";
      $ResultadoDeConsulta = mysqli_query(ConectaraBD::Conexion(),$QuerySelect);
      return $ResultadoDeConsulta ;
  }

  public function UpdatePassword($id_usuario, $password){
    $QueryInsert ="UPDATE tab_usuarios SET password='$password' WHERE id_usuario=$id_usuario";
      if(mysqli_query(ConectaraBD::Conexion(),$QueryInsert)){
        header("location: index.php?passw=ok");
      }else{
        header("location: usuarios.php?passw=error");
      }
  }

}

?>
