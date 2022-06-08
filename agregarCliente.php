<?php
require_once 'conexion.php';

//Controlar si se estan enviando datos por el POST
if($_SERVER['REQUEST_METHOD']=='POST'){
    //validar si se envian todos los datos
    if(isset($_POST['nombrecli'])&& isset($_POST['apellidocli']) && isset($_POST['direccioncli'])&& isset($_POST['cedulacli'])&& isset($_POST['telefonocli'])
    && isset($_POST['emailcli'])&& isset($_POST['passwordcli'])){
        //Construir la consulta
        $query = "INSERT INTO cliente (nombre_cliente, apellido_cliente, direccion, cedula, telefono, email, contrasenia) VALUES (?,?,?,?,?,?,?)";

        //Prepara la sentencia
        if($stmt = $conn -> prepare($query)){
            //envio los datos haciendo un binding
            $stmt -> bind_param('sssssss', $_POST['nombrecli'], $_POST['apellidocli'], $_POST['direccioncli'], $_POST['cedulacli'], $_POST['telefonocli'], 
            $_POST['emailcli'],$_POST['passwordcli']); 

            //Ejecutar la sentencia
            if($stmt -> execute()){
                header("location:login.html");
                exit();
            }else{
                echo "Error! Por favor intente más tarde";
            }
            $stmt -> close();
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
    <link rel="stylesheet" href="CSS/agregar.css">
    <link rel="stylesheet" href="CSS/base.css">
    <title>Agregar Cliente</title>
</head>

<body>
    <center>
        <div class="cabecera">
            <h2>Agregar un nuevo Cliente</h2>
            <p> Formulario de Regisstro para Nuevo Cliente </p>
        </div> <br>
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF']?>"  method="post"> <br>
                <div>
                    <label style="text-align: left;">Nombre Cliente</label>
                    <input type="text" name="nombrecli" required>
                </div> <br>
                <div>
                    <label>Apellido Cliente</label>
                    <input type="text" name="apellidocli" required>
                </div> <br>
                <div>
                    <label>Cedula</label>
                    <input type="text" name="direccioncli" required>
                </div> <br>
                <div>
                    <label>Telefono</label>
                    <input type="text" name="cedulacli" required>
                </div> <br>
                <div>
                    <label>Direccion</label>
                    <input type="text" name="telefonocli" required>
                </div> <br>
                <div>
                    <label>Correo</label>
                    <input type="text" name="emailcli" required>
                </div> <br>
                <div>
                    <label>Contraseña</label>
                    <input type="password" name="passwordcli"  required >
                </div> <br>
                <input type="submit"  class="btn" value="Agregar">
                <a href="login.html"><input type="sumbit" class="btn" value="Cancelar"> </a>
            </form>
        </div>
    </center>
</body>

</html>