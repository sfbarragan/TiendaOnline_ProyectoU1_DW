
<?php
    require_once 'conexion.php';

    //consulta de datos
    $query = "SELECT p.id_producto, p.nombre_producto, p.precio, p.stock, p.foto, c.nombre_categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id_categoria";

    //ejecuto la consulta
    $result = $conn -> query($query);
    
    $productos = array();
    if($result->num_rows > 0){
      while($row = $result -> fetch_assoc()){
          array_push($productos, $row['id_producto']);
          array_push($productos, $row['nombre_producto']);
          array_push($productos, $row['precio']);
          array_push($productos, $row['stock']);
          array_push($productos, $row['foto']);
          array_push($productos, $row['nombre_categoria']);
        }
      
    }else{
      echo '<p><em>No existen datos registrados</em></p>';
    }

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
      <a href=""></a>
      <div class="item">
        <?php 
        echo '<img height="400px" class="item-img" src="data:image/jpeg;base64,'.base64_encode($productos["4"]).'"/>';
        ?>
        
        <div class="item-text">
          <?php 
            echo '<h3>'.$productos[5].'</h3>';
          ?>
          <p>
            <?php 
            echo '<a href="facturacion.php?id='.$productos[0].'&precio='.$productos[2].'&stock='.$productos[3].'" class="enlaces" id="item1">'.$productos[1]. ", USD$ " .$productos[2].'</a>';
            ?>
            
          </p>
        </div>
      </div>
      <div class="item">
        <?php 
        echo '<img height="400px" class="item-img" src="data:image/jpeg;base64,'.base64_encode($productos["10"]).'"/>';
        ?>
        <div class="item-text">
          <?php 
            echo '<h3>'.$productos[11].'</h3>';
          ?>
           <p>
            <?php 
            echo '<a href="facturacion.php?id='.$productos[6].'&precio='.$productos[8].'&stock='.$productos[9].'" class="enlaces" id="item1">'.$productos[7]. ", USD$ " .$productos[8].'</a>';
            ?>
          </p>
        </div>
      </div>
      <div class="item">
      <?php 
        echo '<img height="400px" class="item-img" src="data:image/jpeg;base64,'.base64_encode($productos["16"]).'"/>';
        ?>
        <div class="item-text">
          <?php 
            echo '<h3>'.$productos[17].'</h3>';
          ?>
           <p>
            <?php 
            echo '<a href="facturacion.php?id='.$productos[12].'&precio='.$productos[14].'&stock='.$productos[15].'" class="enlaces" id="item1">'.$productos[13]. ", USD$ " .$productos[14].'</a>';
            ?> 
          </p>
        </div>
      </div>
      <div class="item">
        <?php 
        echo '<img height="400px" class="item-img" src="data:image/jpeg;base64,'.base64_encode($productos["22"]).'"/>';
        ?>
        <div class="item-text">
          <?php 
            echo '<h3>'.$productos[23].'</h3>';
          ?>
           <p>
            <?php 
            echo '<a href="facturacion.php?id='.$productos[18].'&precio='.$productos[20].'&stock='.$productos[21].'" class="enlaces" id="item1">'.$productos[19]. ", USD$ " .$productos[20].'</a>';
            ?>          
          </p>
        </div>
      </div>
      <div class="item">
        <?php 
          echo '<img height="400px" class="item-img" src="data:image/jpeg;base64,'.base64_encode($productos["28"]).'"/>';
        ?>
        <div class="item-text">
          <?php 
            echo '<h3>'.$productos[29].'</h3>';
          ?>
          <p>
            <?php 
            echo '<a href="facturacion.php?id='.$productos[24].'&precio='.$productos[26].'&stock='.$productos[27].'" class="enlaces" id="item1">'.$productos[25]. ", USD$ " .$productos[26].'</a>';
            ?>     
          </p>
        </div>
      </div>
      <div class="item">
        <?php 
          echo '<img height="400px" class="item-img" src="data:image/jpeg;base64,'.base64_encode($productos["34"]).'"/>';
        ?>
        <div class="item-text">
          <?php 
            echo '<h3>'.$productos[35].'</h3>';
          ?>
          <p>
            <?php 
            echo '<a href="facturacion.php?id='.$productos[30].'&precio='.$productos[32].'&stock='.$productos[33].'" class="enlaces" id="item1">'.$productos[31]. ", USD$ " .$productos[32].'</a>';
            ?>     
          </p>
        </div>
      </div>
    </div>
    <center><button class="css-button-sliding-to-left--red"><a href="catalogo_completo.php" class="mas">Mas Productos</a></button></center>
    
  </body>
  <pag-footer></pag-footer>
</html>
