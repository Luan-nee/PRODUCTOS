<?php
    include("conexion.php");
    include("header.php");
?>

    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <script defer src="main.js"></script>
</head>
<body>
    <h1 class="header_title">
        LISTA DE ARTICULOS
    </h1>
    <section class="link-formulario">
        <a href="formulario.php">AGREGAR PRODUCTOS</a>
    </section>

    <section id="conteiner_producto" class="conteiner_producto">
        <?php 
        $AllProduct = $SQL_BDD -> getAllProduct();

        foreach($AllProduct as $product){ ?>
            <form class="producto" action="actionPHP/deleteProduct.php" method="post">

                <section class="img-product">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($product['foto']);?>" alt=""> 
                </section>

                <section class="title-product">
                    <h2>
                        <?php echo $product['nombre']; ?>
                    </h2>
                    <button 
                    class="btn_eliminar"
                    type="submit" 
                    value="<?php echo $product['id']; ?>" 
                    name="btn_eliminar"
                    >ELIMINAR</button>
                </section>

                <section class="header">
                    <section>
                        <img src="img/user.jpg" alt="">                  
                    </section>
                    <h4>nombre completo del usuario que publicó la foto</h4>
                </section>

                <section class="description">
                    <h3>Description:</h3>
                    <p>
                        <?php
                        echo $product['description'];
                        ?>
                    </p>
                </section>

                <article class="producto-credencial">
                    <h3>Precio:</h3>
                    <p><?php echo $product['unidad_precio']; ?></p>

                    <h3>correo electrónico:</h3>
                    <p>correo@electronio.com</p>
                </article>

                <section class="conteiner-precio">
                    <p>Cantidad:
                        <?php echo $product['unidad_medida']; ?>
                    </p>
                    <p>Precio: 
                        <?php echo "S/ ".$product['unidad_precio']; ?>
                    </p>
                    <p>
                        Precio por mayor:
                        <?php echo "S/ ".$product['precio_por_mayor']; ?>
                    </p>
                    <p>Stock:
                        <?php echo $product['stock']; ?>
                    </p>
                    <p>Fecha de publicación: 
                        <?php echo $product['fecha_public']; ?>
                    </p>
                </section>

                <button class="btn_obtener">obtener producto</button>
            </form>
        <?php } ?>
    </section>
</body>
</html>