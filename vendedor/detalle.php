<!doctype html>
<html lang="en">
  <head>
    <title>Detalle producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <body>
        <nav class="navbar navbar-dark bg-primary">
                <a class="navbar-brand" href="#">
                  <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                   Menu</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="vendedor.html">Inicio <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link active" href="ingresarproducto.html">Ingresar producto</a>
                        <a class="nav-item nav-link active" href="buscarproducto.html">Buscar producto</a>
                        <a class="nav-item nav-link active" href="carrito.html">Carrito</a>
                        <a class="nav-item nav-link active" href="mispedidos.php">Mis pedidos</a>
                        <a class="nav-item nav-link active" href="misventas.html">Mis ventas</a>
                        <a class="nav-item nav-link active" href="../index.html">Salir</a>
                    </div>
                </div>
        </nav>
            <br>
            <div class="container">    
        <?php
            $usuario = "proyecto" ;
            $contraseña = "oracle" ;
            $db = "localhost/xe" ;
            $con = oci_connect( $usuario , $contraseña , $db ) ;
           
         $id=$_POST['Id'];
             $stid = oci_parse( $con , "SELECT id_producto FROM producto where id_producto='$id'" ) ;
                 oci_execute ( $stid ) ;
                 $stid1 = oci_parse( $con , "SELECT nombre FROM producto where id_producto='$id'" ) ;
                 oci_execute ( $stid1 ) ;
                 $stid2 = oci_parse( $con , "SELECT precio FROM producto where id_producto='$id'" ) ;
                 oci_execute ( $stid2 ) ;
                 $stid3 = oci_parse( $con , "SELECT stock FROM producto where id_producto='$id'" ) ;
                 oci_execute ( $stid3 ) ;
                 $stid4 = oci_parse( $con , "SELECT foto FROM producto where id_producto='$id'" ) ;
                 oci_execute ( $stid4 ) ;
                  echo "<div class='col m-auto'>";
                  echo "<table class='table table-striped '>\n";
                  echo "<thead >
                              <tr>
                                 <th>Id</th>
                              </tr>
                          </thead>";
                  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                      echo "<tr>\n";
                      foreach ($row as $item) {
                          echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
                          
                      }
                      echo "</tr>\n";
                  }
                  echo "<thead >
                              <tr>
                                 <th>Nombre</th>
                                
                                  
                              </tr>
                          </thead>";
                          while ($row = oci_fetch_array($stid1, OCI_ASSOC+OCI_RETURN_NULLS)) {
                            echo "<tr>\n";
                            foreach ($row as $item) {
                                echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
                                
                            }
                            echo "</tr>\n";
                        }       

                   echo "<thead >
                              <tr>
                                 <th>Precio</th>
                                
                                  
                              </tr>
                          </thead>";

                          while ($row = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) {
                            echo "<tr>\n";
                            foreach ($row as $item) {
                                echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
                                
                            }
                            echo "</tr>\n";
                        }
                          echo "<thead >
                          <tr>
                             <th>Stock</th>
                            
                              
                          </tr>
                      </thead>";
                      while ($row = oci_fetch_array($stid3, OCI_ASSOC+OCI_RETURN_NULLS)) {
                        echo "<tr>\n";
                        foreach ($row as $item) {
                            echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
                            
                        }
                        echo "</tr>\n";
                    }

                      echo "<thead >
                      <tr>
                         <th>Foto</th>
                        
                          
                      </tr>
                  </thead>";
                  while ($row = oci_fetch_array($stid4, OCI_ASSOC+OCI_RETURN_NULLS)) {
                    echo "<tr>\n";
                    foreach ($row as $item) {
                        echo "    <td><img src='$item' class='img-fluid'></td>";
                        
                    }
                    echo "</tr>\n";
                }
                 
                     
                   
        
                  echo "</table>\n";
                  echo "</div>";
           
        
        ?>
        <div class="text-center">
            <input type="submit" value="Agregar" class="btn btn-primary">
        </div>
           
        </div>      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>