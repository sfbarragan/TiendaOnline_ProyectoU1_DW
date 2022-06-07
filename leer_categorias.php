<?php
    require_once 'conexion.php';

    //consulta de datos
    $query = "SELECT * FROM categoria";

    //ejecuto la consulta
    $result = $conn -> query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/base.css">
    <link rel="stylesheet" href="CSS/categorias.css">
    <title>Document</title>

</head>
<body>
    <div class="container_tab">
        <h2 class="pag_title">Categoría</h2>
        <div class="container">
            <button class="btn rounded"><span class="text-green"> <a href="agregar_categorias.php" class="enlace">Agregar Categoría</a></span></button>
        </div>
        <table class="table_products" style="width: 80%">
            <div><thead class="titles">
                <th>#</th>
                <th>Nombre de la Categoría</th>
                <th>Descripción</th>
            </thead>
            <tbody class="content">
                <?php
                    $cont = 1;
                    if($result->num_rows > 0){
                        while($row = $result -> fetch_assoc()){
                            echo '<tr>';
                            echo '<td style="padding-right: 10px;">'.$cont.'</td>';
                            echo '<td style="text-align: left;">'.$row['nombre_categoria'].'</td>';
                            echo '<td style="text-align: left;">'.$row['descripcion'].'</td>';
                            echo '<td>';
                            echo '<a class="enlace_add" href="modificar_categorias.php?id='.$row['id_categoria'].' ">Actualizar</a><br> ';
                            echo '<a class="enlace_add" href="eliminar_categorias.php?id='.$row['id_categoria'].' ">Eliminar</a> <br>';
                            echo '</br>';
                            echo '</tr>';
                            $cont = $cont + 1;
                        }
                    }else{
                        echo '<p><em>No existen datos registrados</em></p>';
                    }
                
                ?>
            </tbody>
        </div>
            
        </table>
    </div>
</body>
</html>