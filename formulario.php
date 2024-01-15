<?php 
include("conexion.php");
include("header.php"); 
?>
    <title>Registrar Producto</title>
    <link rel="stylesheet" href="css/registroProducto.css">
    <script defer src="js/imgInput.js"></script>
</head>
    <?php

    if(isset($_GET["getid"])){
      $info_Product = $SQL_BDD -> getOneProduct($_GET["getid"]);
    }

    $unidades = array("kilogramos","gramos","litro","mililitros","unidad");
    ?>
<body>
	<section class="header_title">
		<h2>Registrar Producto</h2>
	</section>
    <section class="link-formulario">
        <a href="index.php">REGRESAR AL INICIO</a>
    </section>
	<section class="conteiner-form">
		<form 
    class="formulario-producto" 
    action="<?php echo (isset($_GET['getid']))?"actionPHP/modifyProduct.php":"actionPHP/saveProduct.php"; ?>" 
    method="post" 
    enctype="multipart/form-data">

			<section class="foto-producto">
				<label style="position: relative;" class="label-img" for="img-producto">
          <?php if(isset($_GET['getid'])){ ?>
              <img id="preVisual"src="data:image/jpeg;base64,<?php echo base64_encode($info_Product[0]['foto']);?>" alt="">
          <?php }else{ ?>
              <img id="preVisual" src="../../img/icono/img-producto.png" alt="">
          <?php } ?>
					<input style="position: absolute;" type="file" accept="image/*" name="img_product" onchange="verElement()" id="img-producto">
				</label>
            </section>
            <section class="datos-producto">
                <input type="text" name="name_producto" 
                placeholder="Nombre del producto" 
                value="<?php echo (isset($_GET['getid']))?$info_Product[0]['nombre']:"";?>">

                <textarea name="description" cols="28" rows="4" placeholder="Descripción del producto"><?php echo (isset($_GET['getid']))?$info_Product[0]['description']:"";?>
                </textarea>
                <div class="dato-precio">
                    <select name="unidad-medida">

                      <?php if(isset($_GET['getid'])){?>
                        <option value="<?php echo $info_Product[0]['medition'];?>">
                          <?php echo $info_Product[0]['medition'];?>
                        </option>

                        <?php
                          for ($i=0; $i < sizeof($unidades) ; $i++) { 
                            if($unidades[$i] != $info_Product[0]['medition']){
                        ?>
                          <option value="<?php echo $unidades[$i];?>">
                            <?php echo $unidades[$i];?>
                          </option>
                      <?php
                            } 
                          } 
                      ?>
                    <?php }else{?>
                      <?php for($i=0; $i < sizeof($unidades) ; $i++){ ?>
                        <option value="<?php echo $unidades[$i];?>">
                          <?php echo $unidades[$i];?>
                        </option>
                    <?php 
                        } 
                      } 
                    ?>
                    </select>
                    <input type="number" class="input_precio" min="1"
                    max="999" name="cantidad_unidad_medida" 
                    placeholder="cant." step="0.01"
                    value="<?php echo $info_Product[0]['unidad_medida'];?>"
                    title="La cantidad de dicha unidad.">
                </div>

                <input type="number" step="0.01" 
                name="costo" min="1" max="999" 
                placeholder="S/ Costo por venta"
                value="<?php echo $info_Product[0]['unidad_precio'];?>"
                title="El precio del producto por cada unidad">

                <input type="number" step="0.01" 
                class="conteiner-precio_mayor" 
                name="precio_mayor" min="1" 
                max="999" name="stock" 
                placeholder=" S/ Precio por mayor"
                value="<?php echo $info_Product[0]['precio_por_mayor'];?>"
                title="El precio por paquete del producto">

                <input type="number" step="1" 
                min="1" max="999" name="stock" 
                placeholder="stock"
                value="<?php echo $info_Product[0]['stock'];?>"
                title="Cantidad de unidades que sobran para vender">

                <!-- input escondido -->
                <input type="radio" checked 
                name="id_product"
                value="<?php echo $info_Product[0]['id']; ?>"
                style="display:none;">

                <input type="submit" value="publicar producto"> 
            </section>
		</form>
	</section>
</body>
</html>