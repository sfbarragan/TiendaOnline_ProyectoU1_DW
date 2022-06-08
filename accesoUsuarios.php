<?php
    require_once 'conexion.php';
    //Recibe datos desde el formulario
    $email = $_POST['email'];
    $pass = $_POST['contrasenia'];

    if(isset($email)){
        //Iniciar sesion
        session_start();

        //Consulta para verificar si el usuario existe
        $query = "SELECT * FROM cliente WHERE email = '$email' AND contrasenia = '$pass'";

        //Ejecutar consulta
        $resultado = mysqli_query($conn, $query) or die(mysqli_connect_errno());

        //Almacenar el resultado de la consulta en un arreglo y tomo el siguiente
        $fila = mysqli_fetch_array($resultado);
        
        //Controlar si llegan los datos
        if($fila['id_cliente'] == null){
            //Consulta para verificar si el usuario existe
            $query2 = "SELECT * FROM admins WHERE email = '$email' AND contra = '$pass'";
    
            //Ejecutar consulta
            $resultado2 = mysqli_query($conn, $query2) or die(mysqli_connect_errno());
    
            //Almacenar el resultado de la consulta en un arreglo y tomo el siguiente
            $fila2 = mysqli_fetch_array($resultado2);
            
            //Controlar si llegan los datos
            if($fila2['id_user'] == null){
                //Redirigir al mismo login
                header('location: login.html');
            }else{
                header('location: admin.html');
            }
        }else{
      
            header('location: index.html');
        }
    }else {
      
        header('location: login.html');
    }

?>