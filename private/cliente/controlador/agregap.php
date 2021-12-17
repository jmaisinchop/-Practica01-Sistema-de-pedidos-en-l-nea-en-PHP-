<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    $link = mysqli_connect("localhost","root","");
     if($link){
         mysqli_select_db($link, "pedidosOnline");
         mysqli_select_db($link, "SET NAMES 'utf8'");


     }
    
     $codigo = $_GET["codigo"];
     $pro_codigo = $_GET["pro_codigo"];
     $res_codigo = $_GET["res_codigo"];
     $pro_cantidad=$_GET['cantidad'];
     $pro_precio=$_GET['pro_precio'];
     $iva=12;
     $p=100;
     $subtotal=$pro_cantidad *$pro_precio;
     $s=$subtotal * $iva;
     $s1=$s/$p;
     $total=$subtotal + $s1;
     date_default_timezone_set("America/Guayaquil");
     $fecha = date('Y-m-d H:i:s', time());

     /***buscar codido cliente****** */
   
     $sql = "SELECT cli_codigo FROM clientes where cli_usu_codigo='$codigo'";
     $ejecutar_buscar_sql=mysqli_query($link, $sql);
     $row = $ejecutar_buscar_sql->fetch_assoc();

     /*********************/

/***ver si el cliente tiene alguna factura */
        $sql9 = "SELECT * FROM pedido_cab where cab_cli_codigo=".$row['cli_codigo'].  "";
        $ejecutar_buscar_sql9=mysqli_query($link, $sql9);

/*********************** */
if($ejecutar_buscar_sql9->num_rows== 0){/***si no hay datos ingresamos a pedidos */
    $sql = "INSERT INTO pedido_cab VALUES (0, '$fecha', '$iva', '$res_codigo','".$row['cli_codigo']. "','$subtotal','$total')";
     $ejecutar_insertar_sql=mysqli_query($link, $sql);
     $uId= mysqli_insert_id($link);
     $sql2 = "INSERT INTO pedido_det VALUES (0, '$pro_cantidad', '$subtotal', '$uId','$pro_codigo')";
     $ejecutar_insertar_sql2=mysqli_query($link, $sql2);
     header("Location: ../vista/index.php?codigo=$codigo");
      
  }else if ($ejecutar_buscar_sql9->num_rows == 1) {/****si hay entoces usamos otro metodo */
        
        $sql8 = "SELECT * FROM pedido_cab where cab_res_codigo=$res_codigo";
        $ejecutar_buscar_sql8=mysqli_query($link, $sql8);
       


        if ($ejecutar_buscar_sql8->num_rows ==1) { /***buscamos el pedido del cliente */
            $row30 = $ejecutar_buscar_sql8->fetch_assoc();
            $sql7 = "SELECT * FROM pedido_det where  det_cab_codigo=".$row30['cab_codigo']. " && det_pro_codigo='$pro_codigo' ";
            $ejecutar_buscar_sql7=mysqli_query($link, $sql7);
            $row4 = $ejecutar_buscar_sql7->fetch_assoc();

            $sql6 = "SELECT cab_subtotal,cab_total FROM pedido_cab where cab_cli_codigo=".$row['cli_codigo']. " ";
            $ejecutar_buscar_sql6=mysqli_query($link, $sql6);
            $row3 = $ejecutar_buscar_sql6->fetch_assoc();
            $sql29 = "SELECT SUM(det_subtotal) AS value_sum FROM pedido_det where  det_cab_codigo=".$row30['cab_codigo']. "";
            $ejecutar_sum=mysqli_query($link, $sql29);
            $row56 = $ejecutar_sum->fetch_assoc();
            $sum = $row56['value_sum'];

            if ($ejecutar_buscar_sql7->num_rows == 1) {
                $tcant=0;
                $detsubT=0;
                $cST=0;
                $c=0;
                $c1=0;
                $nTotal=0;
                $detcanti= 0;
                $detsubtotal=0;
                $cabSubtotal=0;
                $cabtotal=0;
                $detcanti= $row4['det_canitdad'];
               $detsubtotal= $row4['det_subtotal'];
                $cabSubtotal=$row3['cab_subtotal'];
                $cabtotal= $row3['cab_total'];
                $tcant=$detcanti + $pro_cantidad;
             
                $detsubT=$tcant*$pro_precio;
               
                $cST=$sum+$pro_precio ;
               
                $c=$iva*$cST;
                $c1=$c/$p;
                $nTotal=$cST+$c1;
               

                $sql11 = "UPDATE pedido_cab " .
               "SET cab_subtotal = '$cST', " .
               "cab_total = '$nTotal', " .
                "cab_fecha_hora = '$fecha' " .
                "WHERE cab_res_codigo = $res_codigo  && cab_cli_codigo=".$row['cli_codigo']. "";
                $ejecutar_insertar1=mysqli_query($link, $sql11);

                $sql10 = "UPDATE pedido_det " .
               "SET det_canitdad = '$tcant', " .
               "det_subtotal = '$detsubT' " .
                "WHERE det_pro_codigo = $pro_codigo && det_cab_codigo=".$row30['cab_codigo']. "";
                
                $ejecutar_insertar2=mysqli_query($link, $sql10);

                if( $ejecutar_insertar1==TRUE && $ejecutar_insertar2 === TRUE){
                    echo "agregado correctamente";
                   
                }



                 
            } else if ($ejecutar_buscar_sql7->num_rows == 0) {
                $cST1=0;
                $ct1=0;
                $ct2=0;
                $cTtotal=0;
                $cabtotal=0;
                $cabSubtotalB1=0;
                $sql5 = "SELECT cab_subtotal,cab_total FROM pedido_cab where cab_cli_codigo=".$row['cli_codigo']. " ";
                $ejecutar_buscar_sql5=mysqli_query($link, $sql5);
                $row7 = $ejecutar_buscar_sql5->fetch_assoc();
               $cabSubtotalB1=$row7['cab_subtotal'];
                $cabtotal= $row7['cab_total'];
                $cST1=$sum+$pro_precio;
                $ct1=$cST1*$iva;
                $ct2=$ct1/$p;
                $cTtotal=$ct2+$cST1;

                $sql13 = "UPDATE pedido_cab " .
                "SET cab_subtotal = '$cST1', " .
                "cab_total = '$cTtotal', " .
                 "cab_fecha_hora = '$fecha' " .
                 "WHERE cab_res_codigo = $res_codigo && cab_cli_codigo=".$row['cli_codigo']. "";
                 $ejecutar_insertar4=mysqli_query($link, $sql13);

           
         
               $sql25 = "SELECT cab_codigo FROM pedido_cab where cab_cli_codigo=".$row['cli_codigo']. " ";
            $ejecutar_buscar_sql25=mysqli_query($link, $sql25);
            $row25 = $ejecutar_buscar_sql25->fetch_assoc();
            $cabt= $row25['cab_codigo'];
           
                $sql26 = "INSERT INTO pedido_det VALUES (0, '$pro_cantidad', '$subtotal', '$cabt','$pro_codigo')";
                $ejecutar_insertar_sql62=mysqli_query($link, $sql26);
            

            }
            

        } else if($ejecutar_buscar_sql8->num_rows == 0) {
            echo "SOLO PUEDE PEDIR DE UN MISMO RESTAURANTE";
        }
        
       
    }
    
    //cerrar la base de datoss
    $link->close();
   
    header("Location: ../vista/index.php?codigo=$codigo");

    ?>
</body>

</html>
