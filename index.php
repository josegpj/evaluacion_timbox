<?php
  if(isset($_POST['iniciar_sesion'])){
    include_once("classes/classes.php");

    $username=addslashes($_POST['username']);
    $password=md5($_POST['password']);

    $HacerLogin= new ParaLogin();
    $QueryHacerLogin=$HacerLogin->Login($username, $password);

  }
 ?>
<!doctype html>
<html lang="es">

    <head>

        <meta charset="utf-8" />
        <title>Timbox | Evaluación</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/timbox.png">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                        <img src="assets/images/timbox.png" alt="" height="100" class="auth-logo logo-dark mx-auto">
                                                        <img src="assets/images/timbox.png" alt="" height="100" class="auth-logo logo-light mx-auto">
                                                </div>

                                                <h4 class="font-size-18 mt-4">¡Bienvenid@ de vuelta!</h4>
                                                <p class="text-muted">Inicia sesión para continuar</p>
                                            </div>

                                            <div class="p-2 mt-5">


                                            <!-- MENSAJE CUANDO LOGIN FALLE -->
                                            <?php if(isset($_GET['login']) AND $_GET['login']=='error'){ ?>
                                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                  <i class="fas fa-exclamation-circle"></i>
                                                  <b>¡Error!</b> Los valores introducidos no coinciden con los
registrados en el sistema.
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            <?php } ?>


                                            <!-- MENSAJE DESPUÉS DE LOGOUT -->
                                            <?php if(isset($_GET['login']) AND $_GET['login']=='off'){ ?>
                                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  <i class="fas fa-check-circle"></i>
                                                  <b>Éxito!</b> Nos vemos pronto
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            <?php } ?>


                                            <?php if(isset($_GET['insert']) AND $_GET['insert']=='ok'){ ?>
                                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  <i class="fas fa-check-circle"></i>
                                                  <b>Perfecto!</b> Usuario registrado.
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            <?php } ?>


                                            <?php if(isset($_GET['passw']) AND $_GET['passw']=='ok'){ ?>
                                              <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                  <i class="fas fa-check-circle"></i>
                                                  <b>Perfecto!</b> Contraseña restablecida.
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              </div>
                                            <?php } ?>



                                                <form class="" action="index.php" method="post">

                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon" style="color: red;"></i>
                                                        <label for="username">Nombre de usuario</label>
                                                        <input type="text" class="form-control" name="username" id="username" required placeholder="Ingresa username" autocomplete="off">
                                                    </div>

                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon" style="color: red;"></i>
                                                        <label for="userpassword">Contraseña</label>
                                                        <input type="password" class="form-control" name="password" id="userpassword" required placeholder="Ingresa password" autocomplete="off">
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-secondary w-md waves-effect waves-light"  onclick="return validar();" name="iniciar_sesion">Iniciar sesión</button>
                                                        <br><br>
                                                        <a href="registrar-nuevo-usuario.php" ><i class="fas fa-user-plus" ></i> Registrar nuevo usuario</a>
                                                        <br><br>
                                                        <a href="recuperar-cuenta.php" ><i class="fas fa-lock" ></i> Restablecer password</a>

                                                    </div>



                                                    <script type="text/javascript">
                                                      function validar(){

                                                        //VALIDAMOS SI EL CAMPO CORREO ESTA LLENO
                                                        if(document.getElementById("username").value.length==0 ){
                                                            document.getElementById("username").style.borderColor = "red";
                                                        }else{
                                                          document.getElementById("username").style.borderColor = "blue";
                                                        }



                                                        //VALIDAMOS SI EL CAMPO PASSWORD ESTA LLENO
                                                        if(document.getElementById("userpassword").value.length==0 ){
                                                            document.getElementById("userpassword").style.borderColor = "red";
                                                        }else{
                                                          document.getElementById("userpassword").style.borderColor = "blue";
                                                        }




                                                        return true;

                                                      }
                                                    </script>



                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p>© <script>document.write(new Date().getFullYear())</script> Creado por José Guadalupe Peña Jiménez</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
