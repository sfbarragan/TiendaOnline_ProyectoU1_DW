<?php
//Iniciar la sesión
session_start();

//validar si se esta ingresando directamente sin loggueo
if(!$_SESSION){
    header("location:index.php");
}

require_once 'conexion.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    //validar si se envian todos los datos
    if(isset($_POST['nombrecategoria'])&& isset($_POST['descripcion'])){

        //Construir la consulta
        $query = "INSERT INTO categoria (nombre_categoria, descripcion) VALUES (?, ?)";
        
        if($stmt = $conn -> prepare($query)){
            //envio los datos haciendo un binding
            $stmt -> bind_param('ss', $_POST['nombrecategoria'], $_POST['descripcion']); 

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
        <h2 class="title">Agregar un nueva categoría</h2>
        <p>Llene este formulario para agregar una nueva categoría a la base de datos</p>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <div>
                <label>Nombre de la Categoría</label><br>
                <textarea name="nombrecategoria" required> </textarea>
            </div>
            <div>
                <label>Descripción</label><br>
                <textarea name="descripcion" required> </textarea>
            </div>
            <div>
                <input type="submit" class="custom-btn btn-2" value="Agregar">
                <button class="custom-btn btn-2"><a href="leer_categorias.php">Cancelar</a></button>
            </div>
        </form>
    </div>
</body>
</html>