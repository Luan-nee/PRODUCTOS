<?php 
if($_GET){
  include("../conexion.php");
  $SQL_BDD -> deleteProduct($_GET['getid']);
  header("location:../index.php");
}
?>