<?php
  require_once 'conexion.php';
  session_start();
  if(!$_SESSION){
    header("location:index.php");
  }
  $id_producto = $_GET['id'];

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
        header("localhost: index.html");
        exit();
    }
  }

// }echo $_GET['precio'];
      if($_SERVER['REQUEST_METHOD']=='POST'){
          /* Validar si se enviaron todos los datos */
          if(isset($_POST['num_tarjeta']) && isset($_POST['cvv_tarjeta']) && isset($_POST['precio_producto']) && isset($_POST['cantidad'])){
              /* construir la consulta para la base de datos */
              /* enviamos los datos de manera anonima para preparar la sentencia y hacer un binding */
              $query2 = 'INSERT INTO factura(id_cliente, id_modopago, fecha, subtotal, IVA, total) VALUES (?, ?, ?, ?, ?, ?)';
              /* Prepara la sentencia */
              /* enviamos la consulta preparada */
              if($stmt = $conn->prepare($query2)){
                  $subtotal = floatval($_POST['precio_producto'])*intval($_POST['cantidad']);
                  $IVA = $subtotal*0.12;
                  $total = $subtotal+$IVA;
                  $id_modopago = $_POST['modopago'];
                  $fecha = date('Y-m-d', time());  
                  $stmt->bind_param('iisddd', $_SESSION['id_cliente'], $id_modopago, $fecha, $subtotal, $IVA, $total);/* se evian los string */
                  /* ejecutamos la sentencia */
                  /* realizamos el control de la sentencia */
                  if($stmt->execute()){
                      $qfactura='SELECT * FROM factura WHERE id_factura = (SELECT MAX(id_factura) FROM factura)';
                      if($stmt = $conn -> prepare($qfactura)){
                        //ejecuto la sentencia
                        if($stmt -> execute()){
                            $result = $stmt -> get_result();
                            if($result -> num_rows == 1){
                                $row = $result -> fetch_array(MYSQLI_ASSOC);
                                $id_factura = $row['id_factura'];

                                $query3 = 'INSERT INTO detalle(id_factura, id_producto, cantidad, precio) VALUES (?, ?, ?, ?)';
                                /* Prepara la sentencia */
                                /* enviamos la consulta preparada */
                                $total = round($total,2);
                                $cantidad = intval(($_POST['cantidad']));
                                
                                if($stmt = $conn->prepare($query3)){
                                    $stmt->bind_param('iiid', $id_factura, $id_producto, $cantidad, $total);/* se evian los string */
                                    /* ejecutamos la sentencia */
                                    /* realizamos el control de la sentencia */
                                    if($stmt->execute()){
                                      header("location:detalleFactura.php?cantidad=".$cantidad);
                                    }
                                  }
                                exit();
                            }else{
                                echo 'Error! No existen resultados';
                            }
                        }else{
                            echo 'Error de conexi??n con la base de datos';
                            exit();
                        }
                    }
                  }else{
                      /* en caso de haber un error en la conexion */
                      echo "Error! intente mas tarde.";
                  }
                  /* cerrar la sentencia stmt */
                  $stmt->close();
              }      
          }
          /* despues de realizar la conexion se debera cerrar */
          $conn->close();
      }
//   }else{
//     echo '<script language="javascript">alert("Error! No hay productos disponibles.");window.location.href="index.html"</>';
//   }
// ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>M??todo de Pago</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico" />

  <link rel="stylesheet" href="CSS/base.css" />
  <link rel="stylesheet" href="CSS/facturaMain.css">
  <link rel="stylesheet" href="CSS/factura.css">
  <script src="JS/footer.js"></script>
  <script src="JS/menu.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</head>

<body>
  <pag-menu></pag-menu>
  <form method="post">
    <div class="grid-container" style="margin-bottom: 100px;">
      <div class="grid-100 tablet-grid-100 mobile-grid-100">
        <div class="grid-35 tablet-grid-100 mobile-grid-100">
          <h4 class="heading">Confirme su M??todo de Pago</h4>
        </div>
      </div>
      
      <div class="grid-100 tablet-grid-100 mobile-grid-100 ap-inputs">
        <div class="grid-50 tablet-grid-50 mobile-grid-100" style="margin-bottom: 20px;">
          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <h6>Informaci??n de la Tarjeta de Cr??dito o PayPal</h6>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100 ap-inputs">
            <select name="modopago" id="" required>
              <option value="M??todo de Pago" disabled>Seleccione el M??todo de Pago</option>
                <?php
                    require_once 'conexion.php';
                    $query2 = 'SELECT * FROM modo_pago';
                    $result2 = $conn -> query($query2);
                    if($result2 ->num_rows > 0){
                        while($row2 = $result2 -> fetch_assoc()){
                            echo '<option value='.$row2['id_modopago'].'>'.$row2['nombre'].'</option>';
                        }
                    }else{
                        echo '<p><em>No existen datos registrados</em></p>';
                    }
                ?>   
            </select>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <input required class="cc-number-input" name="num_tarjeta" id="cc" type="text" data-inputmask="'mask': '9999 9999 9999 9999'"/>
            <label alt="N??mero de Tarjeta de Cr??dito" placeholder="N??mero de la Tarjeta de Cr??dito"></label>
          </div>
          <div class="grid-75 tablet-grid-50 mobile-grid-50 grid-parent">
            <div class="grid-75 tablet-grid-100 mobile-grid-100"> 
              <input required name="fecha_expiracion" type="text" id="date" data-inputmask="'alias': 'date'"/>
              <label alt="Fecha de expiraci??n" placeholder="Fecha de expiraci??n"></label>
            </div>
          </div>
          <div class="grid-25 tablet-grid-50 mobile-grid-50 grid-parent">
            <div class="grid-100 tablet-grid-40 mobile-grid-90">
              <input name="cvv_tarjeta" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                maxlength = "3" />
              <label alt="CVV" placeholder="CVV"></label>
            </div>
          </div>
        </div>
        <div class="grid-50 tablet-grid-50 mobile-grid-100">
          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <h6>Datos Cliente</h6>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
            <div class="grid-50 tablet-grid-100 mobile-grid-100">
              <input readonly name="nombre" type="text" value="<?php echo $nombre?>" />
              <label alt="Nombre" placeholder="Nombre"></label>
            </div>
            <div class="grid-50 tablet-grid-100 mobile-grid-100">
              <input readonly name="apellido" type="text" value="<?php echo $apellido?>"/>
              <label alt="Apellido" placeholder="Apellido"></label>
            </div>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <input readonly name="direccion" type="text" value="<?php echo $direccion?>" />
            <label alt="Direcci??n" placeholder="Direcci??n"></label>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <input readonly name="cedula" type="number" maxlength="10"  value="<?php echo $cedula?>" />
            <label alt="C??dula" placeholder="C??dula"></label>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
            <div class="grid-50 tablet-grid-100 mobile-grid-100">
              <input readonly name="telefono" type="tel" maxlength=" 10" value="<?php echo $telefono?>" />
              <label alt="Tel??fono" placeholder="Tel??fono"></label>
            </div>
            <div class="grid-25 tablet-grid-100 mobile-grid-100">
              <?php
                echo '<input name="cantidad" type="number" value="1" max="'.$_GET['stock'].'" step="1" min="1"/>'
              ?>
              <label alt="Cantidad" placeholder="Cantidad"></label>
            </div>
            <div class="grid-25 tablet-grid-100 mobile-grid-100">
              <?php
                echo '<input readonly type="number" name="precio_producto" value="'.$_GET['precio'].'"/>'
              ?>
              <label alt="Precio" placeholder="Precio"></label>
            </div>
          </div>
          <br/>
          <br/>
          <div class="grid-35 tablet-grid-100 mobile-grid-100">
            <input type="submit" value="Comprar" />
          </div>
          <div class="grid-25 tablet-grid-100 mobile-grid-100">
            <a href="catalogo.php">
            <input type="button" style="background-color: #c00;" value="Cancelar" />
            </a>
          </div>
        </div>
      </div>
    </div>
  </form>
  <pag-footer></pag-footer>
  <script>
    $(":input").inputmask();
    Inputmask("9{2}[-]9[-]9{2}", {
                    placeholder: "-",
                    greedy: false
                }).mask('#date');
  </script>
</body>

</html>
