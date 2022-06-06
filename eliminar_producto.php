<?php
    require_once 'conexion.php';

    //validar si se envian los datos por el metodo  get 
    if(isset($_GET['id']) && !empty(trim($_GET['id'])))
        //construir la consulta
        $query = 'DELETE FROM producto WHERE id_producto=?';
        //preparar la sentencia 
        if($stmt = $conn -> prepare($query)){
            $stmt -> bind_param('i',  $_GET['id']);
            //ejecuto la sentencia
            if($stmt -> execute()){
                header ("location:leer_productos.php");
                exit();
                
            }else{
                echo 'Error de conexión con la base de datos';
                exit();
            }
            $stmt -> close();
            $conn -> close();
        }else{
            echo 'Error! intente más tarde';
            exit();
        }
?>