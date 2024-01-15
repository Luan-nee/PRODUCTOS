<?php
include("../conexion.php"); 
if($_POST){
	//error en esta linea. VERIFICAR QUE SUCEDE
	$foto = addslashes(file_get_contents($_FILES['img_product']['tmp_name']));
	$SQL_BDD -> modify_product($_POST['id_product'], $_POST['name_producto'], $_POST['description'],
	$foto,
	$_POST['unidad-medida'], $_POST['cantidad_unidad_medida'], $_POST['costo'],
	$_POST['precio_mayor'], $_POST['stock']);
	echo "DATOS MODIFICADOS";
}
?>