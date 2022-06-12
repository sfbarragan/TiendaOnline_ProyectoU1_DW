<?php
    session_start();

    //validar si se esta ingresando directamente sin loggueo
    if(!$_SESSION){
        header("location:index.php");
    }
    require_once 'conexion.php';

    //consulta de datos
    $query = "SELECT p.id_producto, p.nombre_producto, p.precio, p.stock, p.foto, c.nombre_categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id_categoria";

    //ejecuto la consulta
    $result = $conn -> query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/base.css">
    <link rel="stylesheet" href="CSS/productos.css">
    <title>Document</title>

</head>
<body>
<script type="text/javascript">
    function Delete(){
        var res = confirm("¿Desea eliminar el usuario?");
        if(res == true){
            return true;
        }else{
            return false;
        }
    }
</script>
    <div class="container_tab">
        <h2 class="pag_title">Productos</h2>
        <div class="container">
            <button class="btn rounded"><span class="text-green"> <a href="agregar_producto.php" class="enlace">Agregar Producto</a></span></button>
        </div>
        <table class="table_products">
            <thead class="titles">
                <th>#</th>
                <th>Nombre Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Foto</th>
                <th>Categoria</th>
            </thead>
            <tbody class="content">
                <?php
                    $cont = 1;
                    if($result->num_rows > 0){
                        while($row = $result -> fetch_assoc()){
                            echo '<tr>';
                            echo '<td style="padding-right: 10px;">'.$cont.'</td>';
                            echo '<td style="text-align: left;">'.$row['nombre_producto'].'</td>';
                            echo '<td>'.$row['precio'].'</td>';
                            echo '<td>'.$row['stock'].'</td>';
                            echo '<td> <img height="80px" class="item-img" src="data:image/jpeg;base64,'.base64_encode($row['foto']).'"/></td>';
                            echo '<td>'.$row['nombre_categoria'].'</td>';
                            echo '<td>';
                            echo '<a class="enlace_add" href="modificar_producto.php?id='.$row['id_producto'].' ">Actualizar</a><br> ';
                            echo '<a class="enlace_add"  href="eliminar_producto.php?id='.$row['id_producto'].'"onclick="return Delete()" ">Eliminar</a> <br>';
                            echo '</br>';
                            echo '</tr>';
                            $cont = $cont + 1;
                        }
                    }else{
                        echo '<p><em>No existen datos registrados</em></p>';
                    }
                
                ?>
            </tbody>
        </table>
        <button class="btn_salir"><a href="cerrar_sesion.php" class="enlace">Salir</a></button>
        <button class="btn_salir"><a href="admin.php" class="enlace">Regresar</a></button>
    </div>

    
</body>
</html>