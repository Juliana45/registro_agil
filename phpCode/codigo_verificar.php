<?php

    include "../conexi/conexion.php";

    $search = $_POST['busqueda'];
    /* $cedula = 
    if (mysqli_num_rows($cedula)>30){
        $cedula = search.substr(52,62);
    } */

    $query = mysqli_query($conexion, "SELECT * FROM tbl_elementos WHERE numero_serial_elemento='$search'");
   /*  $json[]=array(); */
    if(mysqli_num_rows($query)>0){
        
        while($row = mysqli_fetch_array($query)){
            ?>
             <tr>
               <td align="center"><?php echo $row['numero_serial_elemento'];?></td>
               <td align="center"><?php echo $row['nombre_elemento'];?></td>
               <td align="center"><?php echo $row['descripcion_elemento'];?></td>
           </tr> 
           
           <?php 
        }
        /* echo $cedula; */
    }
?>