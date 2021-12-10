<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$descifrado = md5($contraseña);

$conexion=mysqli_connect("bfkmyblonbpkxiey3fnt-mysql.services.clever-cloud.com","ulvpmx6tb6deck0h","FqfhlHGXRPRLCxkPrSGp","bfkmyblonbpkxiey3fnt");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$descifrado'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:Principal.html");

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
