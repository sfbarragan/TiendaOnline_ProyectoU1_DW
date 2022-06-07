<?php
    require_once 'conexion.php';
 
    // // Validar si se envian los datos por el método get
    // if(isset($_GET['id']) && !empty(trim($_GET['id']))){
    //     /* Contruyo la contulata */
    //     $query='SELECT * FROM producto WHERE id_producto=?';
    //     /* Preparar la sentencia */
    //     if($stmt=$conn->prepare($query)){
    //         $stmt->bind_param('i', $_GET['id']);
    //         /* ejecuto la sentencia */
    //         if($stmt->execute()){
    //             $result=$stmt->get_result();
    //             /* veo que si el numero de filas es igual a uno */
    //             if($result->num_rows==1){
    //                 /* obtenemos todos lo datos que estamo consultando */
    //                 $row=$result->fetch_array
    //                     (MYSQLI_ASSOC);
    //                     $nombre = $row['nombre_producto'];
    //                     $precio = $row['precio'];
    //                     $stock = $row['stock'];      
    //             }else{
    //                 echo 'Error! No existen resultados';
    //                 exit();
    //             }
    //         }else{
    //             echo 'ERROR! Revise la conexion con la base de datos.';
    //             exit();
    //         }
    //     }
    //     $stmt->close();
    //     /* Tomamos el codigo realizado en el archivo leer.php */
    //     /* en este caso no cerramos la conecion para que se pueda actualizar la informacion */
    //     /* $conn->close(); */
    // }else{
    //     /* En caso de no pasar datos realizamos redireccionamiento hacia el index.php */
    //     header("localhost: index.html");
    //     exit();
    // }
    /* 2. Tomamos lod datos editados y los actualizamos en la base de datos */
    /* Agregamos el codigo que realizado en el archivo agregar.ph */
    /* Tomar los datos editados y actualizamos en la base */
// }
      if($_SERVER['REQUEST_METHOD']=='POST'){
          /* Validar si se enviaron todos los datos */
          if(isset($_POST['num_tarjeta']) && isset($_POST['mes_tarjeta']) && isset($_POST['año_tarjeta'])
          && isset($_POST['cvv_tarjeta']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['direccion'])
          && isset($_POST['cedula']) && isset($_POST['telefono']) && isset($_POST['cantidad'])){
              /* construir la consulta para la base de datos */
              /* enviamos los datos de manera anonima para preparar la sentencia y hacer un binding */
              $query = 'INSERT INTO factura(id_cliente, id_modopago, fecha, subtotal, IVA, total) VALUES (?, ?, ?, ?, ?,?)';
              /* Prepara la sentencia */
              /* enviamos la consulta preparada */
              if($stmt = $conn->prepare($query)){
                  /* enviamos los datos haciendo un binding de la variales de la tabla*/
                  /* agregamos interger  */
                //   $precio = 2.50;
                //   $subtotal = $_POST['cantidad']*($precio);
                //   $IVA = ($subtotal)*0.12;
                //   $total ($subtotal)+($IVA);
                  $fecha = $_POST['año_tarjeta'].'-'.$_POST['mes_tarjeta'].'-01';
                  $stmt->bind_param('iisddd', 1, 1, $fecha, 15.99, 2.50, 17.44);/* se evian los string */
                  /* ejecutamos la sentencia */
                  /* realizamos el control de la sentencia */
                  if($stmt->execute()){
                      header("location: index.php");
                      exit();
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
//     echo '<script language="javascript">alert("Error! No hay productos disponibles.");window.location.href="index.html"</script>';
//   }
// ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Método de Pago</title>
  <link rel="stylesheet" href="https://content.resale.ticketmaster.com/css/generated/tmr.min.css">

  <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <link rel="stylesheet" href="CSS/base.css" />
    <link rel="stylesheet" href="css/factura.css">
  <script src="JS/footer.js"></script>
    <script src="JS/menu.js"></script>
</head>

<body>
  <pag-menu></pag-menu>
  <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <div class="grid-container" style="margin-top: 20px;">
      <div class="grid-100 tablet-grid-100 mobile-grid-100">
        <div class="grid-35 tablet-grid-100 mobile-grid-100">
          <h4 class="heading">Confirme su Tarjeta de Crédito</h4>
        </div>
      </div>
      <div class="grid-100 tablet-grid-100 mobile-grid-100 ap-inputs">
        <div class="grid-50 tablet-grid-50 mobile-grid-100" style="margin-bottom: 20px;">
          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <h6>Información de la Tarjeta de Crédito</h6>
          </div>

          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <input name="num_tarjeta" type="number" maxlength="16" required />
            <label alt="Credit Card Number" placeholder="Número de la Tarjeta de Crédito"></label>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
            <div class="grid-50 tablet-grid-100 mobile-grid-100">
              <select name="mes_tarjeta" type="select" />
              <option disabled selected value="">Seleccione el mes</option>
              <option selected value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              </select>
            </div>
            <div class="grid-50 tablet-grid-100 mobile-grid-100">
              <select name="año_tarjeta" type="select" />
              <option disabled selected value="">Seleccione el año</option>
              <option selected value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              </select>
            </div>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
            <div class="grid-40 tablet-grid-40 mobile-grid-90">
              <input name="cvv_tarjeta" type="number" maxlength="4" required />
              <label alt="CVV" placeholder="CVV"></label>
            </div>
            <div class="grid-100 tablet-grid-10 mobile-grid-10 info-icon">
              <img src="img/tarjeta.png" alt="Tarjeta de Crédito">
            </div>
          </div>
        </div>
        <div class="grid-50 tablet-grid-50 mobile-grid-100">
          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <h6>Billing Address</h6>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
            <div class="grid-50 tablet-grid-100 mobile-grid-100">
              <input name="nombre" type="text" required />
              <label placeholder="Nombre"></label>
            </div>
            <div class="grid-50 tablet-grid-100 mobile-grid-100">
              <input name="apellido" type="text" required />
              <label  placeholder="Apellido"></label>
            </div>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <input name="direccion" type="text" required />
            <label placeholder="Dirección"></label>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100">
            <input name="cedula" type="number" maxlength="10"  required />
            <label  placeholder="Cédula"></label>
          </div>
          <div class="grid-100 tablet-grid-100 mobile-grid-100 grid-parent">
            <div class="grid-50 tablet-grid-100 mobile-grid-100">
              <input name="telefono" type="number" maxlength=" 10" required />
              <label  placeholder="Teléfono celular"></label>
            </div>
            <div class="grid-50 tablet-grid-100 mobile-grid-100">
              <input value="1" name="cantidad" type="number" step="1" min="1" required />
              <label placeholder="Cantidad del producto"></label>
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
</body>

</html>
