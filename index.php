<?php
    include("conexion.php");
    include("header.php");
    if($_POST){
        if(isset($_POST['btn_eliminar'])){
            header("location:actionPHP/deleteProduct.php");
        }else if(isset($_POST['btn_update'])){
            header("location:actionPHP/modifi.php?num=20");
        }
    }
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
            <section class="producto">

                <section class="img-product">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($product['foto']);?>" alt=""> 
                </section>

                <section class="title-product">
                    <h2>
                        <?php echo $product['nombre']; ?>
                    </h2>
                    <a 
                    class="btn_update" 
                    href="formulario.php?getid=<?php echo $product['id']; ?>"
                    >MODIFICAR PRODUCT</a>
                    
                    <a 
                    class="btn_eliminar"
                    href="actionPHP/deleteProduc.php?getid=<?php echo $product['id']; ?>"
                    >ELIMINAR</a>
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
                    <p><?php echo "S/ ".$product['unidad_precio']; ?></p>

                    <h3>correo electrónico:</h3>
                    <p>correo@electronio.com</p>
                </article>

                <section class="conteiner-precio">
                    <p>Cantidad:
                        <?php echo $product['unidad_medida']." ".$product['medition']; ?>
                    </p>
                    <p>Precio: 
                        <?php echo "S/ ".$product['unidad_precio']; ?>
                    </p>
                    <p>
                        Precio por mayor:
                        <?php echo "S/ ".$product['precio_por_mayor']; ?>
                    </p>
                    <p>Stock:
                        <?php echo $product['stock']." ".$product['medition']."es"; ?>
                    </p>
                    <p>Fecha de publicación: 
                        <?php echo $product['fecha_public']; ?>
                    </p>
                </section>

                <button class="btn_obtener" type="button">obtener producto</button>
            </section>
        <?php } ?>
    </section>
</body>
</html>