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
        <h2 class="pag_title">Métodos de Pago</h2>
        <button><a class="textoAgregar" href="metodosP_Agregar.php">Agregar Metodos</a></button> <br>
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
<<<<<<< HEAD
                            echo '<button><a class="textoAgregar" href="metodosP_eliminar.php?id='.$row['id_modopago'].'">Eliminar</a></button>';
=======
                            echo '<a href="metodosP_eliminar.php?id='.$row['id_modopago'].'">Eliminar</a>';
>>>>>>> 5f360f3003f5b688996ce8b19d8055f55838b886
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