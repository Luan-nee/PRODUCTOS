<?php
include("../conexion.php");

$_SESSION['id_user'] = 1;

if($_POST){
	$nombre = (isset($_POST['name_producto']))?$_POST['name_producto']:"";
	$description = (isset($_POST['description']))?$_POST['description']:"";
	$medition = (isset($_POST['unidad-medida']))?$_POST['unidad-medida']:"";
	$unidad_medida = (isset($_POST['cantidad_unidad_medida']))?$_POST['cantidad_unidad_medida']:"";
	$unidad_precio = (isset($_POST['costo']))?$_POST['costo']:"";
	$precio_por_mayor = (isset($_POST['precio_mayor']))?$_POST['precio_mayor']:"";
	$stock = (isset($_POST['stock']))?$_POST['stock']:"";
	$foto = addslashes(file_get_contents($_FILES['img_product']['tmp_name']));
	
	if($_FILES['img_product']['size'] > 3*1024*1024){
			echo "<script> alert('EL ARCHIVO ES SUPERIOR A 3MB')</script>";
	}else{
			// $SQL_BDD -> save_producto($_SESSION['id_user'],$name_product, $precio, $descrip, $img);
			$SQL_BDD -> save_producto($_SESSION['id_user'], $nombre, $description, $foto, $unidad_medida, $medition, $unidad_precio, $precio_por_mayor, $stock);
			echo "<script> alert('PRODUCTO ALMACENADO')</script>";
	}
}
?>