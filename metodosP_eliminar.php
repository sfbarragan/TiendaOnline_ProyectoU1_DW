<?php 
    //Requerismos la conexion 
    require_once 'conexion.php';
    /* 1. Consutar los datos y mostramos los datos en el formulario */
    /* Validar si se envian los datos por el metodo get(URL) */
    if(isset($_GET['id']) && !empty(trim($_GET['id']))){
        /* Contruyo la contulata */
        $query='DELETE FROM modo_pago WHERE id_modopago=?';
        /* Preparar la sentencia */
        if($stmt=$conn->prepare($query)){
            $stmt->bind_param('i', $_GET['id']);
            /* ejecuto la sentencia */
            if($stmt->execute()){
            header("location: metodoP_Leer.php");
            exit();
            }else{
                echo 'ERROR! Revise la conexion con la base de datos :/';
                exit();
            }
            
        }else{
            $stmt->close();
        }
        /* Tomamos el codigo realizado en el archivo leer.php */
        /* en este caso no cerramos la conecion para que se pueda actualizar la informacion */
        /* $conn->close(); */
    }else{
        header("localhost: metodoP_Leer.php");
        exit();
    }
?>