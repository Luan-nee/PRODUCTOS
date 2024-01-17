<?php
$SQL_BDD -> modify_product(
	$_SESSION['tmp_data_idProduct'],
	$_POST['name_producto'], 
	$_POST['description'],
	$_POST['unidad-medida'], // char <!-- ESCOGER LA UNIDAD MATEMÁTICA
	$_POST['cantidad_unidad_medida'],  // num <!-- ESCOGER el valor de la unidad math
	$_POST['costo'],
	$_POST['precio_mayor'], 
	$_POST['stock']
);
echo "<script>alert('datos guardados')</script>";
?>