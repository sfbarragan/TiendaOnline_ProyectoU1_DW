
<?php
    require_once 'conexion.php';

    //consulta de datos
    $query = "SELECT p.id_producto, p.nombre_producto, p.precio, p.stock, p.foto, c.nombre_categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id_categoria";

    //ejecuto la consulta
    $result = $conn -> query($query);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="CSS/base.css" />
    <link rel="stylesheet" href="CSS/catalogo.css">
    <script src="JS/footer.js"></script>
    <script src="JS/menu.js"></script>
    <title>Catalogo</title>
  </head>
  <body>
    <pag-menu></pag-menu>

    <div class="contenido">
      <div><h1>Encuentra los mejores productos</h1></div>
      <div></div>

        <?php
             if($result->num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo '<div class="item">';
                    echo '<img height="400px" class="item-img" src="data:image/jpeg;base64,'.base64_encode($row['foto']).'"/>';
                    echo '<div class="item-text">';
                    echo '<h3>'.$row['nombre_categoria'].'</h3>';
                    echo '<p>';
                    echo '<a href="facturacion.php?id='.$row['id_producto'].'" class="enlaces" id="item1">'.$row['nombre_producto']. ", USD$ " .$row['precio'].'</a>';
                    echo '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            }else{
                echo '<p><em>No existen datos registrados</em></p>';
            }


        ?>
    </div>
    
  </body>
  <pag-footer></pag-footer>
</html>
