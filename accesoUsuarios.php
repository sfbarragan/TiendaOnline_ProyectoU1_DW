<?php
    require_once 'conexion.php';
    //Recibe datos desde el formulario
    $email = $_POST['email'];
    $pass = $_POST['contrasenia'];

    if(isset($user)){
        //Iniciar sesion
        session_start();

        //Consulta para verificar si el usuario existe
        $query = "SELECT * FROM cliente WHERE email = '$email' AND contrasenia = '$pass'";
        $q2 = “SELECT MAX(id_cliente) AS id FROM cliente”;

        session_start();

        //Ejecutar consulta
        $resultado = mysqli_query($conn, $query) or die(mysqli_connect_errno());
        $id_cliente = mysqli_query($conn, $query) or die(mysqli_connect_errno());
        //Almacenar el resultado de la consulta en un arreglo y tomo el siguiente
        $fila = mysqli_fetch_array($resultado);
        
        $_SESSION['idusuario'] = $fila['id_ciente'];

        //Controlar si llegan los datos
        if($fila['id_cliente'] == null){
            echo "Hola";
            //Redirigir al mismo index
            header('location: login.html');
        }else{
      
            header('location: index.html');
        }
    }else{
        header('location: login.html');
    }   

?>