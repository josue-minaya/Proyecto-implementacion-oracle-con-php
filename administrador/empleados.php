<!doctype html>
<html lang="en">
  <head>
    <title>Empleados</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
        
            <?php
            $usuario = "proyecto" ;
            $contraseña = "oracle" ;
            $db = "localhost/xe" ;
            $con = oci_connect( $usuario , $contraseña , $db ) ;
           
         
            $stid = oci_parse( $con , 'SELECT * FROM empleado' ) ;
        oci_execute ( $stid ) ;
         echo "<div class='col-12 text-center'>";
        echo "<table class='table table-striped table-responsive-lg'>\n";
        echo "<thead >
                    <tr>
                        <th>Codigo empleado</th>
                        <th>Ocupacion</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Dni</th>
                        <th>Telefono</th>
                        <th>Contraseña</th>
                        <th>Fecha</th>
                        <th></th>
                        
                    </tr>
                </thead>";
        while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
            echo "<tr>\n";
            foreach ($row as $item) {
                echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                
            }
            echo " <td><a href='#'><i class='far fa-trash-alt'></i></a></i></td>";
            echo "</tr>\n";
        }
        echo "</table>\n";
         echo "</div>";



         $stid2 = oci_parse( $con , 'SELECT * FROM vendedor' ) ;
        oci_execute ( $stid2 ) ;
         echo "<div class='col-6 m-auto'>";
         echo "<table class='table table-striped table-responsive-lg'>\n";
         echo "<thead >
                     <tr>
                        <th>Codigo vendedor</th>
                        <th>Sueldo base</th>
                        <th>Codigo empleado</th>
                         
                     </tr>
                 </thead>";
         while ($row = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) {
             echo "<tr>\n";
             foreach ($row as $item) {
                 echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                 
             }
             echo " <td><a href='#'><i class='far fa-trash-alt'></i></a></i></td>";
             echo "</tr>\n";
         }
         echo "</table>\n";
          echo "</div>";
        

          $stid3 = oci_parse( $con , 'SELECT * FROM cajero' ) ;
          oci_execute ( $stid3 ) ;
           echo "<div class='col-6 m-auto'>";
           echo "<table class='table table-striped table-responsive-lg'>\n";
           echo "<thead >
                       <tr>
                          <th>Codigo cajero</th>
                          <th>Numero de caja</th>
                          <th>Sueldo</th>
                          <th>Codigo empleado</th>
                           
                       </tr>
                   </thead>";
           while ($row = oci_fetch_array($stid3, OCI_ASSOC+OCI_RETURN_NULLS)) {
               echo "<tr>\n";
               foreach ($row as $item) {
                   echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";
                   
               }
               echo " <td><a href='#'><i class='far fa-trash-alt'></i></a></i></td>";
               echo "</tr>\n";
           }
           echo "</table>\n";
            echo "</div>";
        ?>
        

        
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>