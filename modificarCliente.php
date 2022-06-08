<?php
//Requerismos la conexion 
require_once 'conexion.php';
/* 1. Consutar los datos y mostramos los datos en el formulario */
/* Validar si se envian los datos por el metodo get(URL) */
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    /* Contruyo la contulata */
    $query = 'SELECT * FROM cliente WHERE id_cliente=?';
    /* Preparar la sentencia */
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $_GET['id']);
        /* ejecuto la sentencia */
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            /* veo que si el numero de filas es igual a uno */
            if ($result->num_rows == 1) {
                /* obtenemos todos lo datos que estamos consultando */
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $nombre = $row['nombre_cliente'];
                $apellido = $row['apellido_cliente'];
                $direccion= $row['direccion'];
                $cedula = $row['cedula'];
                $telefono = $row['telefono'];
                $email = $row['email'];
                $contrasenia = $row['contrasenia'];
            } else {
                echo 'Error! No existen resultados';
                exit();
            }
        } else {
            echo 'ERROR! Revise la conexion con la base de datos :/';
            exit();
        }
    }
    $stmt->close();
    /* Tomamos el codigo realizado en el archivo leer.php */
    /* en este caso no cerramos la conecion para que se pueda actualizar la informacion */
    /* $conn->close(); */
} else {
    /* En caso de no pasar datos realizamos redireccionamiento hacia el index.php */
    header("localhost: index.html");
    exit();
}

/* 2. Tomamos lod datos editados y los actualizamos en la base de datos */
/* Agregamos el codigo que realizado en el archivo agregar.ph */
/* Tomar los datos editados y actualizamos en la base */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* Validar si se enviaron todos los datos */
    if (
        isset($_POST['nombrecli']) && isset($_POST['apellidocli']) && isset($_POST['direccioncli'])
        && isset($_POST['cedulacli']) && isset($_POST['telefonocli']) && isset($_POST['emailcli'] && isset($_POST['passwordcli']))
    ) {
        /* construir la consulta para la base de datos */
        /* enviamos los datos de manera anonima para preparar la sentencia y hacer un binding */
        $query = "UPDATE cliente SET nombre_cliente=?, apellido_cliente=?, direccion=?, cedula=?, 
        telefono=?, email=? , password=?  WHERE id_cliente=?";
        /* Prepara la sentencia */
        /* enviamos la consulta preparada */
        if ($stmt = $conn->prepare($query)) {
            /* enviamos los datos haciendo un binding de la variales de la tabla*/
            /* agregamos interger  */
            $stmt->bind_param(
                'ssssssi',
                $_POST['nombrecli'],
                $_POST['apellidocli'],
                $_POST['direccioncli'],
                $_POST['cedulacli'],
                $_POST['telefonocli'],
                $_POST['emailcli'],
                $_POST['passwordcli'],
                $_GET['id']
            );/* se evian los string */
            /* ejecutamos la sentencia */
            /* realizamos el control de la sentencia */
            if ($stmt->execute()) {
                header("location: login.html");
                exit();
            } else {
                /* en caso de haber un error en la conexion */
                echo "Error! intente mas tarde :3";
            }
            /* cerrar la sentencia stmt */
            $stmt->close();
        }
    }
    /* despues de realizar la conexion se debera cerrar */
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: rgb(28, 135, 223);
        }

        .contenedor {
            background-color: white;
            width: 60%;
            height: 50%;
            border-radius: 10px;
            box-shadow: 5px;
            padding: 70px;
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .contenedor form{
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <title>Modificar Cliente</title>
</head>

<body>
    <center>
        <div class="contenedor">
            <h2> Modificar un Cliente</h2>
            <p>Llene este formulario para actualizar un nuevo cliente a la base de datos</p>
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                <div>
                    <label>Nombre Cliente</label>
                    <input type="text" name="nombrecli" value="<?php echo $nombre ?>" required>
                    </div> <br>
                    <div>
                        <label>Apellido Cliente</label>
                        <input type="text"  style ="right" name="apellidocli" value="<?php echo $apellido ?>" required>
                    </div> <br>
                    <div>
                        <label>Direccion</label>
                        <input type="text" name="telefonocli" value="<?php echo $direccion ?>" required>
                    </div> <br>
                    <div>
                        <label>Cédula</label>
                        <input type="text"   name="direccioncli" value="<?php echo $cedula ?>" required>
                    </div> <br>
                    <div>
                        <label>Telefono</label>
                        <input type="text" name="cedulacli" value="<?php echo $telefono ?>"required>
                    </div> <br>
                    <div>
                        <label>Correo</label>
                        <input type="text" name="emailcli" value="<?php echo $email ?>" required>
                    </div> <br>
                    <div>
                        <label>Contraseña</label>
                        <input type="password" name="passwordcli" value="<?php echo $contrasenia ?>" required >
                </div> <br>
                <input type="submit" value="Modificar"> <br>
                <a href="index.html">Cancelar</a>
            </form>
        </div>
    </center>
</body>

</html>