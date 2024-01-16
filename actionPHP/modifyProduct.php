<?php
if($_POST){
	$SQL_BDD -> modify_product(
    $_POST['id_product'], 
		$_POST['name_producto'], 
    $_POST['description'],
		$_POST['unidad-medida'], 
    $_POST['cantidad_unidad_medida'], $_POST['costo'],
		$_POST['precio_mayor'], 
    $_POST['stock']
	);
}
?>