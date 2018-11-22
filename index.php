<!doctype html>
<html lang="en">
  <head>
    <title>Iniciar sesión</title>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/index.css" >
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <body>
    
    
      <div class="weather-box">
        <form action="index.php" method="post">
          <div class="form-row">
            <div class="col">
              <label for="id">Usuario:</label>
            </div>
            <div class="col">
              <input type="text" class="form-control" id="id" >
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col">
              <label for="pass">Contraseña:</label>
            </div>
            <div class="col">
              <input type="text" class="form-control" id="pass" >
            </div>
          </div>
          <div class="text-center p-3">
            <button type="submit" class="btn btn-primary" name="ingresar">Ingresar</button>
          </div>

        </form>  
           
      </div>
    
      <?php
        session_start();
        $con = oci_connect('SYSTEM', '1234', 'localhost/XE');
        if(isset($_POST['submit'])){
            $user = $_POST['id'];
            $pass = $_POST['pass'];
            $s = oci_parse($con, "select id_empleado,pass from empleado where id_empleado='$user' and pass='$pass'");       
            oci_execute($s);
            //$row = oci_fetch_all($s, $res);
            //if($row){
             //       $_SESSION['user']=$user;
            //        $_SESSION['time_start_login'] = time();
            echo "Ha ingresado";
            } else{
              echo "Usuario o contrasena equivocada";
            }
     ?>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>