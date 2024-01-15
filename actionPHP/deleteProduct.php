<?php 
if($_POST){
  include("../conexion.php");
  $SQL_BDD -> deleteProduct($_POST['btn_eliminar']);
  header("location:../index.php");
}
?>