<?php

    include "../conexi/conexion.php";

    /**
     * Buscador de elementos 
     */
    $search = $_POST['busqueda'];
    
    $query = mysqli_query($conexion, "SELECT * FROM tbl_elementos WHERE numero_serial_elemento='$search'");

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

    }
?>