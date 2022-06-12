<?php
session_start();

//validar si se esta ingresando directamente sin loggueo
if(!$_SESSION){
    header("location:index.php");
}
require_once 'conexion.php';

//controlar si se enviaron datos por el POST
if($_SERVER['REQUEST_METHOD']=='POST'){
    //validar si se envian todos los datos
    if(isset($_POST['nombremetodo'])){
        //construir la consulta
        $query = "INSERT INTO modo_pago (nombre) VALUES (?)";
        //Preparar la sentencia
        if($stmt = $conn->prepare($query)){
            //enviar los datos haciendo un binding
            $stmt -> bind_param('s', $_POST['nombremetodo']);
            //ejecutar la sentencia
            if($stmt -> execute()){
                header("location: metodoP_Leer.php");
                exit();
            }else{
                echo "Error! Por favor intente más tarde";
            }
            //cerrar la sentencia o stmt
            $stmt -> close();
        }
    }
    $conn -> close();
}
?>