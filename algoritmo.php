<?php
include_once("classes/classes.php");
include_once("includes/verificar_sesion.php");

 ?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Timbox | Algoritmo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/timbox.png">

        <!-- DataTables -->
        <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


    </head>

    <body data-topbar="dark" data-layout="horizontal">

        <!-- Begin page -->
        <div id="layout-wrapper">




            <?php include('includes/menu-superior.php');?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Algoritmo identificar palindromos</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                          <div class="col-sm-10 col-sm-offset-10">
                                                <h4 class="card-title">Ingresa las palabras a identificar si son palindromos </h4>
                                          </div>
                                        </div>

                                        <br><br>


                                        <?php if(isset($_GET['pass']) AND $_GET['pass']=='error'){ ?>
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <i class="fas fa-exclamation-circle"></i>
                                              <b>¡Error!</b> Las contraseñas no son identicas, intentalo de nuevo.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        <?php } ?>

                                        <?php if(isset($_GET['email']) AND $_GET['email']=='error'){ ?>
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <i class="fas fa-exclamation-circle"></i>
                                              <b>¡Error!</b> El correo proporcionado ya ha sido registrado.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        <?php } ?>

                                        <?php if(isset($_GET['rfc']) AND $_GET['rfc']=='error'){ ?>
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <i class="fas fa-exclamation-circle"></i>
                                              <b>¡Error!</b> El rfc proporcionado ya ha sido registrado.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        <?php } ?>

                                        <?php if(isset($_GET['insert']) AND $_GET['insert']=='ok'){ ?>
                                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                                              <i class="fas fa-check-circle"></i>
                                              <b>Perfecto!</b> Datos guardados correctamente.
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                          </div>
                                        <?php } ?>




                                        <form class="" action="algoritmo.php"  method="post">
                                          <div class="row">
                                              <div class="col-sm-12 col-md-12 col-lg-12">
                                                <b>Ingresa una cantidad N de palabras</b><br>
                                                <textarea name="cadena" class="form-control" rows="5" cols="80" required></textarea>
                                              </div>



                                              <div class="col-sm-12 col-md-6 col-lg-6">
                                                <br><br>
                                                <button  name="iniciar_algoritmo" type="submit" class="btn btn-primary "><li class="fas fa-search"></li> Buscar palindromos</button>
                                              </div>

                                          </div>
                                        </form>


                                  <?php if(isset($_POST['iniciar_algoritmo'])){ ?>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                  <br><br>
                                                  <table class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                      <thead>
                                                      <tr>
                                                          <th>Palabras ingresadas</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                        $numero_palindromos=0;
                                                        $cadena=explode(" ", $_POST['cadena']);
                                                        foreach($cadena as $key) {
                                                          if($key==strrev($key)){
                                                            $numero_palindromos++;
                                                          }
                                                         ?>
                                                         <tr>
                                                           <td><?php echo $key; ?></td>
                                                         </tr>
                                                        <?php } ?>

                                                      </tbody>
                                                  </table>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                  <br><br>
                                                  <table class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                      <thead>
                                                      <tr>
                                                          <th>Palabras que son palindromo</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                        <?php
                                                        if($numero_palindromos>0){
                                                        $palindromo = explode(" ", strtolower($_POST['cadena'])); //Convertimos la cadena a minusculas
                                                        $eliminar_espacios="";
                                                        foreach($palindromo as $variable){
                                                          if($variable==strrev($variable)){
                                                         ?>
                                                        <tr>
                                                          <td><?php echo $variable; ?></td>
                                                        </tr>
                                                      <?php } } ?>
                                                    <?php }else{ ?>
                                                      <tr>
                                                        <td>No haypalabras que sean palindromos.</td>
                                                      </tr>
                                                      <?php }  ?>
                                                      </tbody>
                                                  </table>
                                                </div>

                                            </div>

                                    <?php } ?>



                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div>

                </div>
                <!-- End Page-content -->

                <?php include('includes/footer.php');?>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- Required datatable js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

        <!-- Responsive examples -->
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/js/pages/datatables.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
