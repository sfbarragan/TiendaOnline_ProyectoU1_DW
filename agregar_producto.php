<?php
require_once 'conexion.php';
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
        $query = "INSERT INTO producto (nombre_producto, precio, stock, foto, id_categoria) VALUES (?, ?, ?,'$contenido',?)";
        
        if($stmt = $conn -> prepare($query)){
            
            //envio los datos haciendo un binding
            $stmt -> bind_param('sdii', $_POST['nombreprod'], $_POST['precioprod'], $_POST['stockprod'], $_POST['categoriaprod']); 

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
        <h2 class="title">Agregar un nuevo Producto</h2>
        <p>Llene este formulario para agregar un nuevo cliente a la base de datos</p>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <div>
                <label>Nombre del Producto</label><br>
                <textarea name="nombreprod" required> </textarea>
            </div>
            <div>
                <label>Precio</label><br>
                <input type="number" step=0.01 name="precioprod" required>
            </div>
            <div>
                <label>Cantidad en Stock</label><br>
                <input type="number" name="stockprod" required>
            </div>
            <div>
                <label>Imagen del Producto</label><br>
                <input type="file" id="archivo" name="archivo"  required>
            </div>
            <div>
                <label>Categoria</label><br>
                <select name="categoriaprod" id="">
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
                
                </select>
            </div><br>
            <div>
                <input type="submit" class="custom-btn btn-2" value="Agregar">
                <button class="custom-btn btn-2"><a href="leer_productos.php">Cancelar</a></button>
            </div>
        </form>
    </div>
</body>
</html>