<?php
    require_once 'conexion.php';


    //1. Consultar los datos y mostrarlos en los Input
    //validar si se envian los datos por el metodo  get 
    if(isset($_GET['id']) && !empty(trim($_GET['id']))){
        //construir la consulta
        $query1 = 'SELECT p. id_producto, p.nombre_producto, p.precio, p.stock, p.foto, c.nombre_categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id_categoria WHERE id_producto=?';
        //preparar la sentencia 
        
        if($stmt = $conn -> prepare($query1)){
            $stmt -> bind_param('i',  $_GET['id']);
            //ejecuto la sentencia
            if($stmt -> execute()){
                $result = $stmt -> get_result();
                if($result -> num_rows == 1){
                    $row = $result -> fetch_array(MYSQLI_ASSOC);
                    $nombre_producto = $row['nombre_producto'];
                    $precio = $row['precio'];
                    $stock = $row['stock'];
                    $foto = $row['foto'];
                    $categoria = $row['nombre_categoria'];
                }else{
                    echo 'Error! No existen resultados';
                }
            }else{
                echo 'Error de conexión con la base de datos';
                exit();
            }
            $stmt -> close();
        }
    }

        //2. Tomar los datos editados y almacenarlos en la base de datos
        //Controlar si se estan enviando datos por el POST
        if($_SERVER['REQUEST_METHOD']=='POST'){
            //validar si se envian todos los datos
            if(isset($_POST['nombreprod'])&& isset($_POST['precioprod']) && isset($_POST['stockprod'])&& isset($_POST['categoriaprod'])){
                $nombre_imagen= $_FILES["archivo"]["name"];
                $tipo_imagen = $_FILES["archivo"]["type"];
                $tamagno_imagen = $_FILES["archivo"]["size"];
        
                $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/img/';
        
                move_uploaded_file($_FILES["archivo"]["tmp_name"], $carpeta_destino.$nombre_imagen);
        
                $archivo_objetivo = fopen($carpeta_destino.$nombre_imagen, "r");
                $contenido = fread($archivo_objetivo, $tamagno_imagen);
                $contenido = addslashes($contenido);
        
        
                fclose($archivo_objetivo);
                //Construir la consulta
                $query2 = "UPDATE producto SET nombre_producto = ?, precio = ?, stock = ?, foto = '$contenido', id_categoria = ? WHERE id_producto = ?";
                
                if($stmt = $conn -> prepare($query2)){
                    //envio los datos haciendo un binding
                    $stmt -> bind_param('sdiii', $_POST['nombreprod'], $_POST['precioprod'], $_POST['stockprod'], $_POST['categoriaprod'], $_GET['id']); 
        
                    //Ejecutar la sentencia
                    if($stmt -> execute()){
                        header("location:leer_productos.php");
                        exit();
                    }else{
                        echo "Error! Por favor intente más tarde";
                    }
                    $stmt -> close();
                }else{
                    echo "no se a subido el archivo";
                }
            }
            $conn -> close();
        }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/modificar_producto.css">
    <link rel="stylesheet" href="CSS/base.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 class="title">Actualizar los datos del Producto</h2>
        <p>Llene este formulario para actualizar los datos del Producto en la base de datos</p>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data">
            <div>
                <textarea name="nombreprod" required><?php echo $nombre_producto; ?>   </textarea> 
            </div>
            <div>
                <label>Precio</label><br>
                <input type="number" step=0.01 name="precioprod" value="<?php echo $precio; ?>" size="50" required>
            </div>
            <div>
                <label>Stock</label><br>
                <input type="number" name="stockprod" value="<?php echo $stock; ?>" size="50" required>
            </div>
            <div>
                <label>Foto del producto</label><br>
                <?php 
                    echo '<td> <img height="80px" class="item-img" src="data:image/jpeg;base64,'.base64_encode($foto).'"/></td>';
                ?>
                <br>
                <input type="file" id="image" name="archivo" required>
            </div>
            <div>
            <label>Categoria</label><br>
                <select name="categoriaprod" >
                <?php
                    require_once 'conexion.php';
                    $query2 = 'SELECT * FROM categoria';

                    $result2 = $conn -> query($query2);

                    if($result2 ->num_rows > 0){
                        while($row2 = $result2 -> fetch_assoc()){
                            echo '<option value='.$row2['id_categoria'].'>'.$row2['nombre_categoria'].'</option>';
                        }
                    }else{
                        echo '<p><em>No existen datos registrados</em></p>';
                    }
                ?>
            </div><br>
            <div>
                <input type="submit" class="custom-btn btn-2" value="Actualizar">
                <button class="custom-btn btn-2"><a href="leer_productos.php">Cancelar</a></button>
            </div>
            
        </form>
    </div>
</body>
</html>