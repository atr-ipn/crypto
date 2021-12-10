<?php
include('db.php');
$toke=$_POST['token'];
session_start();

$conexion=mysqli_connect("bfkmyblonbpkxiey3fnt-mysql.services.clever-cloud.com","ulvpmx6tb6deck0h","FqfhlHGXRPRLCxkPrSGp","bfkmyblonbpkxiey3fnt");

$consulta="SELECT*FROM usuarios where token='$toke'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:CambiarContraseña.html");

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
