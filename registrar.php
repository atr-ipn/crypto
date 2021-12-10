<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$correo = $_POST['correo'];
$confirmar = $_POST['confirmar'];

session_start();
$_SESSION['usuario']=$usuario;

if ($contraseña == $confirmar)
{
  $cifrado = md5($contraseña);

  $conexion=mysqli_connect("bfkmyblonbpkxiey3fnt-mysql.services.clever-cloud.com","ulvpmx6tb6deck0h","FqfhlHGXRPRLCxkPrSGp","bfkmyblonbpkxiey3fnt");
  $validar = "SELECT * FROM usuarios WHERE correo = '$correo' || usuario = '$usuario'";
  $validando = $conexion->query($validar);
  if($validando->num_rows>0){
    ?>
    <?php
    include("Registro.html");

  ?>
  <h1 class="bad">USUARIO O CORREO YA REGISTRADOS.</h1>
  <?php
    
  } else {
    $query="INSERT INTO usuarios (id_usuario, usuario, contraseña, correo) VALUES (NULL, '$usuario', '$cifrado', '$correo')";
    $resultado=mysqli_query($conexion,$query) or die("Could Not Perform the Query");
    header("location:Principal.html");
  }
} else {
  ?>
    <?php
    include("Registro.html");

  ?>
  <h1 class="bad">LAS CONTRASEÑAS NO COINCIDEN.</h1>
  <?php
}

mysqli_close($conexion);
