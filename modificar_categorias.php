<?php
    require_once 'conexion.php';


    //1. Consultar los datos y mostrarlos en los Input
    //validar si se envian los datos por el metodo  get 
    if(isset($_GET['id']) && !empty(trim($_GET['id']))){
        //construir la consulta
        $query1 = "SELECT * FROM categoria WHERE id_categoria=?";

        //preparar la sentencia 
        
        if($stmt = $conn -> prepare($query1)){
            $stmt -> bind_param('i',  $_GET['id']);
            //ejecuto la sentencia
            if($stmt -> execute()){
                $result = $stmt -> get_result();
                if($result -> num_rows == 1){
                    $row = $result -> fetch_array(MYSQLI_ASSOC);
                    $nombre_categoria = $row['nombre_categoria'];
                    $descripcion = $row['descripcion'];
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
            if(isset($_POST['nombrecategoria'])&& isset($_POST['descripcion'])){
                
                //Construir la consulta
                $query2 = "UPDATE categoria SET nombre_categoria = ?, descripcion = ? WHERE id_categoria = ?";
                
                if($stmt = $conn -> prepare($query2)){
                    //envio los datos haciendo un binding
                    $stmt -> bind_param('ssi', $_POST['nombrecategoria'], $_POST['descripcion'], $_GET['id']); 
        
                    //Ejecutar la sentencia
                    if($stmt -> execute()){
                        header("location:leer_categorias.php");
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
        <h2 class="title">Actualizar los datos de la categoría</h2>
        <p>Llene este formulario para actualizar los datos de la categoría en la base de datos</p>
        <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data">
            <div>
                <label>Nombre Categoría</label><br>
                <textarea name="nombrecategoria" required><?php echo $nombre_categoria; ?>   </textarea> 
            </div>

            <div>
                <label>Descripción</label><br>
                <textarea name="descripcion" required><?php echo $descripcion; ?>   </textarea> 
            </div>
            <div>
                <input type="submit" class="custom-btn btn-2" value="Actualizar">
                <button class="custom-btn btn-2"><a href="leer_categorias.php">Cancelar</a></button>
            </div>
            
        </form>
    </div>
</body>
</html>