<?php
    session_start();

    //validar si se esta ingresando directamente sin loggueo
    if(!$_SESSION){
        header("location:index.php");
    }
    require_once 'conexion.php';
    //1. Consultar los datos y mostrarlos
    //consulta de datos
    $query = "SELECT id_modopago, nombre FROM modo_pago";

    //ejecuto la consulta
    $result = $conn -> query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/metodos_pago.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Work+Sans:wght@200;500&display=swap');
    </style>
    
    <title>Métodos de Pago</title>
</head>
<script type="text/javascript">
    function Delete(){
        var res = confirm("¿Desea eliminar el usuario?");
        if(res == true){
            return true;
        }else{
            return false;
        }
    }
</script>
<body>
    <div class="container_tab">
        <h2 class="pag_title">Métodos de Pago</h2>
        <button><a class="textoAgregar" href="metodosP_Agregar.html">Agregar Metodos</a></button> <br>
        <table class="table_products">
            <thead class="titles">
                <tr>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($result->num_rows>0){
                        while($row = $result -> fetch_assoc()){
                            echo '<tr>';
                            echo '<td>' . $row['nombre'] .'</td>';
                            echo '<td>';
                            echo '<button><a class="textoAgregar" href="metodosP_eliminar.php?id='.$row['id_modopago'].'"onclick="return Delete()">Eliminar</a></button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }else{
                        echo '<p><em>No existen datos registrados</em></p>';
                    }
                ?>
            </tbody>
        </table>
        <button class="btn_salir"><a href="cerrar_sesion.php" class="enlace">Salir</a></button>
        <button class="btn_salir"><a href="admin.php" class="enlace">Regresar</a></button>
    </div>
</body>
</html>