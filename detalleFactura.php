<?php
  require_once 'conexion.php';
  session_start();
    if(isset($_SESSION['id_cliente']) && !empty(trim($_SESSION['id_cliente']))){
      /* Contruyo la contulata */
      $query='SELECT * FROM cliente WHERE id_cliente=?';
      /* Preparar la sentencia */
      if($stmt=$conn->prepare($query)){
          $stmt->bind_param('i', $_SESSION['id_cliente']);
          /* ejecuto la sentencia */
          if($stmt->execute()){
              $result=$stmt->get_result();
              /* veo que si el numero de filas es igual a uno */
              if($result->num_rows==1){
                  /* obtenemos todos lo datos que estamo consultando */
                  $row=$result->fetch_array
                      (MYSQLI_ASSOC);
                      $nombre = $row['nombre_cliente'];
                      $apellido = $row['apellido_cliente'];
                      $direccion = $row['direccion'];
                      $cedula = $row['cedula'];
                      $telefono = $row['telefono'];
              }else{
                  echo 'Error! No existen resultados';
                  exit();
              }
          }else{
              echo 'ERROR! Revise la conexion con la base de datos.';
              exit();
          }
          $stmt -> close();
      /* Tomamos el codigo realizado en el archivo leer.php */
      /* en este caso no cerramos la conecion para que se pueda actualizar la informacion */
      /* $conn->close(); */
  }else{
      /* En caso de no pasar datos realizamos redireccionamiento hacia el index.php */
      header("localhost: index.php");
      exit();
  }
}

      if(isset($_GET['id']) && !empty(trim($_GET['id']))){
        //construir la consulta
        $query1 = 'SELECT p. id_producto, p.nombre_producto, p.precio, p.stock, p.foto, c.nombre_categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id_categoria WHERE id_producto=?';
        //preparar la sentencia 
        
        if($stmt = $conn -> prepare($query1)){
            $stmt -> bind_param('i',  $_GET['id']);
            //ejecuto la sentencia
            if($stmt -> execute()){
                $result = $stmt -> get_result();
                if($result -> num_rows == 1){
                    $row = $result -> fetch_array(MYSQLI_ASSOC);
                    $nombre_producto = $row['nombre_producto'];
                    $precio = $row['precio'];
                    $stock = $row['stock'];
                    $foto = $row['foto'];
                    $categoria = $row['nombre_categoria'];
                }else{
                    echo 'Error! No existen resultados';
                }
            }else{
                echo 'Error de conexión con la base de datos';
                exit();
            }
            $stmt -> close();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Factura</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation-flex.min.css">
    <link rel="stylesheet" href="CSS/base.css" />
    <link rel="stylesheet" href="CSS/detalleFactura.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.js"></script>
    <script src="JS/footer.js"></script>
    <script src="JS/menu.js"></script>
</head>
<body>
<pag-menu></pag-menu>
<div  class="row expanded">
  <main class="columns" style="margin:0 0 50px 0">
    <div class="inner-container">
    <section class="row align-center">
      <div class="callout large invoice-container">
        <table class="invoice">
          <tr class="header">
            <td class="align-right">
              <h2>Detalle Factura</h2>
            </td>
          </tr>
          <tr class="intro">
            <td class="">
              Hola, <?php echo $nombre.' '.$apellido?>.<br>
              Gracias por tu compra.
            </td>
            <td class="text-right">
              <span class="num">Order #00302</span><br>
              October 18, 2017
            </td>
          </tr>
          <tr class="details">
            <td colspan="2">
              <table>
                <thead>
                  <tr>
                    <th class="desc">Item Description</th>
                    <th class="qty">Quantity</th>
                    <th class="amt">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="item">
                    <td class="desc">Name or Description of item</td>
                    <td class="qty">1</td>
                    <td class="amt">$100.00</td>
                  </tr>
                </tbody>
              </table>
            </td> 
          </tr>
          <tr class="totals">
            <td></td>
            <td>
              <table>
                <tr class="subtotal">
                  <td class="num">Subtotal</td>
                  <td class="num">$100.00</td>
                </tr>
                <tr class="fees">
                  <td class="num">Shipping & Handling</td>
                  <td class="num">$0.00</td>
                </tr>
                <tr class="tax">
                  <td class="num">Tax (7%)</td>
                  <td class="num">$7.00</td>
                </tr>
                <tr class="total">
                  <td>Total</td>
                  <td>$107.00</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </section>
    </div>
  </main>

</div>
<pag-footer></pag-footer>
</body>
</html>