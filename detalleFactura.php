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
                    $nombre_cliente = $row['nombre_cliente'];
                    $apellido = $row['apellido_cliente'];
            }else{
                echo 'Error! No existen resultados';
                exit();
            }
        }else{
            echo 'ERROR! Revise la conexion con la base de datos.';
            exit();
        }
        $stmt -> close();
}else{
    header("localhost: index.html");
    exit();
}
}
        //consulta de datos
        $detalleFactura = 'SELECT * FROM detalle WHERE id_detalle = (SELECT MAX(id_detalle) FROM detalle)';
        if($stmt = $conn -> prepare($detalleFactura)){
          //ejecuto la sentencia
          if($stmt -> execute()){
              $result = $stmt -> get_result();
              if($result -> num_rows == 1){
                $row = $result -> fetch_array(MYSQLI_ASSOC);
                $id_detalleFactura = $row['id_detalle'];

                $query = 'SELECT p.nombre_producto, p.precio, d.cantidad, f.fecha, f.subtotal, f.IVA, f.total FROM detalle d INNER JOIN producto p ON d.id_producto = p.id_producto INNER JOIN factura f ON d.id_factura = f.id_factura WHERE id_detalle=?';
                if($stmt = $conn -> prepare($query)){
                  $stmt -> bind_param('i',  $id_detalleFactura);
                  //ejecuto la sentencia
                  if($stmt -> execute()){
                    $result = $stmt -> get_result();
                    if($result -> num_rows == 1){
                      $row = $result -> fetch_array(MYSQLI_ASSOC);
                      $nombre_producto = $row['nombre_producto'];
                      $precio = $row['precio'];
                      $fecha = $row['fecha'];
                      $subtotal = $row['subtotal'];
                      $IVA = $row['IVA'];
                      $total = $row['total'];
                      $cantidad = $row['cantidad'];
                    }
                  }
                }
              }
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.js"></script> -->
    
    <link rel="stylesheet" href="CSS/facturaMain.css">
  <link rel="stylesheet" href="CSS/factura.css">

    <script src="JS/footer.js"></script>
    <script src="JS/menu.js"></script>
    <script src="JS/imprimir.js"></script>
</head>
<body>
<pag-menu></pag-menu>
<div class="landscape row expanded">
  <main data-print-content class="columns" style="margin:0 0 50px 0">
    <div class="inner-container">
    <section class="row align-center">
      <div class="callout large invoice-container">
        <table class="invoice">
          <tr class="header">
            <td class="align-right">
              <h2 style="text-align:left">Detalle Factura</h2>
            </td>
            <td>

            </td>
          </tr>
          <tr class="intro">
            <td class="">
              Hola, <?php echo $nombre_cliente.' '.$apellido?>.<br>
              ¡Gracias por tu compra!
            </td>
            <td class="text-right">
              <span class="num">Orden #00<?php echo $id_detalleFactura?></span><br>
              <?php echo $fecha?>
            </td>
          </tr>
          <tr class="details">
            <td colspan="2">
              <table>
                <thead>
                  <tr>
                    <th class="desc">Descripción del Producto</th>
                    <th class="qty">Precio Unitario</th>
                    <th class="qty">Cantidad</th>
                    <th class="amt">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="item">
                    <td class="desc"><?php echo $nombre_producto?></td>
                    <td class="qty"><?php echo '$'.$precio?></td>
                    <td class="qty"><?php echo $cantidad?></td>
                    <td class="amt"><?php echo '$'.$subtotal?></td>
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
                  <td class="num"><?php echo '$'.$subtotal?></td>
                </tr>
                <tr class="tax">
                  <td class="num">IVA (12%)</td>
                  <td class="num"><?php echo '$'.$IVA?></td>
                </tr>
                <tr class="total">
                  <td>Total</td>
                  <td><?php echo '$'.$total?></td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <input type="button" class="print" value="Imprimir" />
         <a href="catalogo.php">
            <input type="button" style="background-color: #c00;" value="Cancelar" />
            </a>
      </div>
    </section>
    </div>
  </main>
</div>
<pag-footer></pag-footer>
</body>
</html>