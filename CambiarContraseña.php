<?php
include('db.php');
$contraseña=$_POST['contraseña'];
$correo = $_POST['correo'];
$confirmar = $_POST['confirmar'];

session_start();

if ($contraseña == $confirmar)
{
  $cifrado = md5($contraseña);


  $conexion=mysqli_connect("bfkmyblonbpkxiey3fnt-mysql.services.clever-cloud.com","ulvpmx6tb6deck0h","FqfhlHGXRPRLCxkPrSGp","bfkmyblonbpkxiey3fnt");

  $query="UPDATE usuarios SET contraseña = '$cifrado' WHERE correo = '$correo'";
  $resultado=mysqli_query($conexion,$query) or die("Could Not Perform the Query");
  header("location:Principal.html");
  
} else {
  ?>
    <?php
    include("Registro.html");

  ?>
  <h1 class="bad">LAS CONTRASEÑAS NO COINCIDEN.</h1>
  <?php
}


mysqli_free_result($resultado);
mysqli_close($conexion);
