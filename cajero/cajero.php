<!doctype html>
<html lang="en">
  <head>
    <title>Ordenes de venta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <body>
        <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="#">
                  <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                  Bootstrap
                </a>
                <a class="nav-item nav-link active" href="../index.html">Salir</a>

              </nav>
      <br>
      <br>
      <br>
      <div class="container">
            <form action="cajero.php" method="POST">
                    <div class="form-group ">
                        <label for="codigo">Nombre del cliente</label>
                        <input type="text" class="form-control" id="codigo"  name="nombre">
                    </div>
                    
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="width:170px " name="Ingresar">Buscar</button>
                    </div>
                    <br>
            </form>
            <?php
                 $usuario = "proyecto" ;
                 $contraseña = "oracle" ;
                 $db = "localhost/xe" ;
                 
                 $con = oci_connect( $usuario , $contraseña , $db ) ;
                 
                 if(isset($_POST['Ingresar'])){
                    /*el code php*/
                    
                    $nombre=$_POST['nombre'];
                 
                 
                 $stid1 = oci_parse( $con , "SELECT id_pedido,fecha,monto_total,nombre FROM pedido p
                 WHERE p.nombre like '$nombre%'            ") ;
                     oci_execute ( $stid1 ) ;
                    
                      echo "<div class='col m-auto'>";
                      echo "<table class='table table-striped text-center'>\n";
                    
                        echo "<thead >
                        <tr>
                           <th>Id pedido</th>
                           <th>Fecha</th>
                           <th>Monto total</th>
                           <th>Nombre</th>
                           
                        </tr>
                    </thead>";
                        while ($row1 = oci_fetch_array($stid1, OCI_ASSOC+OCI_RETURN_NULLS)) {
                            echo "<tr>\n";
                            foreach ($row1 as $item1) {
                                echo "    <td>" . ($item1 !== null ? htmlentities($item1, ENT_QUOTES) : "&nbsp;") . "</td>";
                                
                            }
                            echo "</tr>\n";
                        }
                     
                      
                     
                      echo "</table>\n";
                      
              echo "</div>";}
            ?>
                <?php
            $usuario = "proyecto" ;
            $contraseña = "oracle" ;
            $db = "localhost/xe" ;
            
            $con = oci_connect( $usuario , $contraseña , $db ) ;
             $stid = oci_parse( $con , "SELECT id_pedido,fecha,monto_total,nombre FROM pedido 
             order by fecha desc" ) ;
                 oci_execute ( $stid ) ;
                
                  echo "<div class='col m-auto'>";
                  echo "<table class='table table-striped text-center'>\n";
                  echo "<thead >
                              <tr>
                                 <th>Id pedido</th>
                                 <th>Fecha</th>
                                 <th>Monto total</th>
                                 <th>Nombre</th>
                                 
                              </tr>
                          </thead>";
                  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                      echo "<tr>\n";
                      foreach ($row as $item) {
                          echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
                          
                      }
                      echo "</tr>\n";
                  }
                 
                  echo "</table>\n";
                  
          echo "</div>";
        ?>
               
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>