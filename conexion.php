<?php
    //Datos para la conexión ahacia la base de datos
    define('SERVERNAME', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DBNAME', 'sistema_ventas');

    //Creación de la conexión a la base de datos con mysqli
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

    //Controlar la conexión
    if($conn -> connect_error){
        die('Conexión fallida'. $conn -> connect_error);
    }
?>