<?php
include('db.php');
$usuario=$_POST['usuario'];
$correo=$_POST['correo'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("bfkmyblonbpkxiey3fnt-mysql.services.clever-cloud.com","ulvpmx6tb6deck0h","FqfhlHGXRPRLCxkPrSGp","bfkmyblonbpkxiey3fnt");
$numeror = rand(5000,8000);
$consulta="UPDATE usuarios SET token = '$numeror' WHERE correo = '$correo'";



if ($conexion->query($consulta) === TRUE) {
  
  header("location:Token.html");
} else {
  ?>
    <?php
    include("Recuperar.html");

  ?>
  <h1 class="bad">USUARIO NO REGISTRADO.</h1>
  <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);
