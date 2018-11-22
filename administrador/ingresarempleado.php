<!doctype html>
<html lang="en">
  <head>
    <title>Ingresar empleado</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <body>
        <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
                <a class="navbar-brand" href="#">
                  <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                   Menu</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="administrador.html">Inicio <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active" href="ingresarempleado.html">Ingresar empleado</a>
                        <a class="nav-item nav-link active" href="asignarcajero.html">Asignar cajero</a>
                        <a class="nav-item nav-link active" href="asignarvendedor.html">Asignar vendedor</a>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle nav-item nav-link active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Mis consultas
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="empleados.php">Empleados</a>
                                      <a class="dropdown-item" href="ventas.html">Ventas</a>
                                     
                                </li>
                            </ul>
                          </div>
                  </div>
                </div>
            </nav>
        <br>
      <div class="container">
            <form class="weather-box" action="IngresoEmpleado" method="POST">
                    <h3>Ingreso de empleados</h3>
                    <br>
                    <div class="form-group">
                       <label for="nombre" >Nombre</label>
                       <input type="text" class="form-control" id="nombre"  asp-for="nombre">
                   </div>
                   <div class="form-group">
                       <label for="apellido" >Apellido</label>
                       <input type="text" class="form-control" id="apellido"  asp-for="apellido">
                   </div>
                   <div class="form-group">
                       <label for="dni" >DNI</label>
                       <input type="number" class="form-control" id="dni"  asp-for="dni">
                   </div>
                   <div class="form-group">
                       <label for="direccion" >Direccion</label>
                       <input type="text" class="form-control" id="direccion"  asp-for="direccion">
                   </div>        
                   <div class="form-group">
                       <label for="telefono" >Telefono</label>
                       <input type="number" class="form-control" id="telefono"  asp-for="telefono">
                   </div>
                   <div class="form-group">
                           <label for="exampleFormControlSelect1">Puesto</label>
                           <select class="form-control" id="exampleFormControlSelect1" name="ocupacion">
                               <option value="Administrador">Administrador</option>
                               <option value="Vendedor">Vendedor</option>
                               <option value="Cajero">Cajero</option>
                           
                           </select>
                   </div>
                       <br>
                       <br>
               
                    <h4>Credenciales de usuario</h4>   
                   
                   <div class="form-group">
                       <label for="password" >Password</label>
                       <input type="password" class="form-control" id="password"  name="password">
                   </div>
                       <div class="form-group text-center">
                           <button class="btn btn-primary " style="width:170px " name="IngresarProducto">Ingresar Empleado</button>
                       </div>
                   </div>
               </form>
      </div>
      <?php
      //conexion
      $usuario = "proyecto";
      $password = "oracle";
      $db = "localhost/xe";
      $con = oci_connect($usuario, $password, $db);
      
   
      //oracle query
      $stid = oci_parse($con, "INSERT INTO empleado (id_empleado,ocupacion,
     nombre,apellido,direccion,dni,telefono,contrasena,fecha)
     VALUES(:id_empleado,:ocupacion,:nombre,:apellido,:direccion,:dni,:telefono,:pass,:fecha)");
   
      //variables
      $id=['id_empleado'];
      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $dni=$_POST['dni'];
      $telefono=$_POST['telefono'];
      $direccion=$_POST['direccion'];
      $pass=$_POST['password'];
      $ocupacion=$_POST['ocupacion'];
      $fecha= sysdate();
   
      //binding    
      oci_bind_by_name($stid, ":id_empleado", $id);
      oci_bind_by_name($stid, ":ocupacion", $ocupacion);
      oci_bind_by_name($stid, ":nombre", $nombre);
      oci_bind_by_name($stid, ":apellido", $apellido);
      oci_bind_by_name($stid, ":direccion", $direccion);
      oci_bind_by_name($stid, ":dni", $dni);
      oci_bind_by_name($stid, ":telefono", $telefono);
      oci_bind_by_name($stid, ":pass", $pass);
      oci_bind_by_name($stid, ":fecha", $fecha);
     
      //ejecucion
      oci_execute($stid);                        
                     
                             
      oci_free_statement($stid);
   
      //cierre de conexion
      oci_close($con);  
   
  ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>