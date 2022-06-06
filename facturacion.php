<?php
    require_once 'conexion.php';
 
    // Validar si se envian los datos por el método get
    if(isset($_GET['id']) && !empty(trim($_GET['id']))){
        /* Contruyo la contulata */
        $query='SELECT * FROM producto WHERE id_producto=?';
        /* Preparar la sentencia */
        if($stmt=$conn->prepare($query)){
            $stmt->bind_param('i', $_GET['id']);
            /* ejecuto la sentencia */
            if($stmt->execute()){
                $result=$stmt->get_result();
                /* veo que si el numero de filas es igual a uno */
                if($result->num_rows==1){
                    /* obtenemos todos lo datos que estamo consultando */
                    $row=$result->fetch_array
                        (MYSQLI_ASSOC);
                        $nombre = $row['nombre_producto'];
                        $precio = $row['precio'];
                        $stock = $row['stock'];      
                }else{
                    echo 'Error! No existen resultados';
                    exit();
                }
            }else{
                echo 'ERROR! Revise la conexion con la base de datos.';
                exit();
            }
        }
        $stmt->close();
        /* Tomamos el codigo realizado en el archivo leer.php */
        /* en este caso no cerramos la conecion para que se pueda actualizar la informacion */
        /* $conn->close(); */
    }else{
        /* En caso de no pasar datos realizamos redireccionamiento hacia el index.php */
        header("localhost: index.html");
        exit();
    }
    /* 2. Tomamos lod datos editados y los actualizamos en la base de datos */
    /* Agregamos el codigo que realizado en el archivo agregar.ph */
    /* Tomar los datos editados y actualizamos en la base */
    if($stock>0){
      if($_SERVER['REQUEST_METHOD']=='POST'){
          /* Validar si se enviaron todos los datos */
          if (isset($_POST['num_tarjeta']) && isset($_POST['mes_tarjeta']) && isset($_POST['año_tarjeta']) 
          && isset($_POST['cvv_tarjeta']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['direccion'])
          && isset($_POST['cedula']) && isset($_POST['telefono']) && isset($_POST['cantidad'])){
              /* construir la consulta para la base de datos */
              /* enviamos los datos de manera anonima para preparar la sentencia y hacer un binding */
              $query = "INSERT factura SET id_cliente=?, fecha=?, subtotal=?, IVA=?, 
              	total=?;
              /* Prepara la sentencia */
              /* enviamos la consulta preparada */
              if($stmt = $conn->prepare($query)){
                  /* enviamos los datos haciendo un binding de la variales de la tabla*/
                  /* agregamos interger  */
                  $subtotal = $_POST['cantidad']*$precio;
                  $IVA = $subtotal * 0,12;
                  $total $subtotal+$IVA;
                  $fecha = '00-'.$_POST['mes_tarjeta'].'-'.$_POST['año_tarjeta'].';
                  $stmt->bind_param('isddd', 1, $fecha, $subtotal, $IVA, $total);/* se evian los string */
                  /* ejecutamos la sentencia */
                  /* realizamos el control de la sentencia */
                  if($stmt->execute()){
                      header("location: index.php");
                      exit();
                  }else{
                      /* en caso de haber un error en la conexion */
                      echo "Error! intente mas tarde :3";
                  }
                  /* cerrar la sentencia stmt */
                  $stmt->close();
              }      
          }
          /* despues de realizar la conexion se debera cerrar */
          $conn->close();
      }
      require_once 'facturacion.html';
  }else{
    echo '<script language="javascript">alert("Error! No hay productos disponibles.");window.location.href="index.html"</script>';
  }
?>
