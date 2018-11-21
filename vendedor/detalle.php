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
                        <a class="nav-item nav-link active" href="mispedidos.html">Mis pedidos</a>
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
            $stid = oci_parse( $con , "SELECT * FROM Producto where id_producto= '$id' ") ;
                 oci_execute ( $stid ) ;
                 oci_fetch($stid);
        echo " <form  method='POST' action=''>
            
        <div class='form-group'>
        <h3 for='foto' >Datos del producto</h3>
        <div>
            <table class='table table-striped'>
                <thead >
                    <tr>
                        <th scope='col'>Id</th>
                        
                    </tr>
                </thead>";
               
                while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) { ?>
                    echo'<tbody>
                            <tr>
                                <td scope="row">
                                <?=$row["id_producto"]?>
                                </td>
                            </tr>
                        </tbody>';

                    
              <?php  }
              echo
                "
                <thead>
                    <tr>
                        <th scope='col'>Descipción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope='row'>@Model.especificaciones</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th scope='col'>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope='row'>@Model.precio</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th scope='col'>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope='row'>@Model.stock</td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th scope='col'>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope='row'><img class=' img-fluid' src='@Model.foto'></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    
    
    <div class='form-group text-center'>
        <a href='~/Vendedor/Pedidos' type='submit' class='btn btn-primary' style='width:170px' name='IngresarProducto'>Agregar carrito</a>
    </div>
    
</form>"
        
           
        
        ?>
           
        </div>      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>