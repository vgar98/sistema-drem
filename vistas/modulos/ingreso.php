<?php
ob_start();
session_start();
if($_SESSION!=null){
	header("location:ruteador.php?ruta=grifo");
}
else{
	

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DREM-LORETO</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<br>




<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-5 d-none d-lg-block"><div class="container"><img src="iniciologo.jpg" width="300" height="300"></div></div>
              <div class="col-lg-7">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Dirección Técnica de Hidrocarburos</h1>
                  </div>
                  
				  <form  method="post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="usuarioI" id="usuarioI" aria-describedby="usuarioI" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="claveI" id="claveI" placeholder="Contraseña">
                    </div>
                    
					<input class="btn btn-primary btn-user btn-block" type="submit" value="Ingresar">
                    <hr>
                    
                    
                  </form>

				  <?php

					$ingreso = new AdminC();
					$ingreso -> IngresoC();
					
					?>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#">¿Olvidó su contraseña?</a>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <?php
}
?>