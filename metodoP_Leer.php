<?php
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
    
    <title>Document</title>
</head>
<body>
    <div class="container_tab">
        <h2 class="pag_title">Productos</h2>
        <h4><a style="text-decoration: none; color: white;" href="metodosP_Agregar.php">Agregar Metodos</a></h4>
        <table class="table_products">
            <thead class="titles">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($result->num_rows>0){
                        while($row = $result -> fetch_assoc()){
                            echo '<tr>';
                            echo '<td>' . $row['id_modopago'] . '</td>';
                            echo '<td>' . $row['nombre'] .'</td>';
                            echo '<td>';
                            echo '<a href="metodosP_actualizar.php?id='.$row['id_modopago'].'">Actualizar</a>';
                            echo '<a href="metodosP_eliminar.php?id='.$row['id_modopago'].'">Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }else{
                        echo '<p><em>No existen datos registrados</em></p>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>