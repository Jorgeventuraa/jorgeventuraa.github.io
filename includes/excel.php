<?php
require_once ("conexion.php");
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");
?>


<table class="table table-striped table-dark " id= "table_id">

                   
<thead>    
<tr>
<th>Nombres</th>
<th>Primer apellido</th>
<th>Segundo apellido</th>
<th>N° de Documento</th>
<th>Dependencia</th>
<th>Motivo</th>
<th>Fecha de registro</th>
<th>Fecha de salida</th>

</tr>
</thead>
<tbody>

<?php

$conexion=new mysqli("localhost","root","admin123","cvdb","3306");              
$SQL="SELECT
tblvisitor.ID, 
tblvisitor.last_name_dad, 
tblvisitor.last_name_mom, 
tblvisitor.`name`, 
tblvisitor.DNI, 
tblvisitor.WhomtoMeet, 
tblvisitor.Deptartment, 
tblvisitor.idOffice, 
tblvisitor.ReasontoMeet, 
tblvisitor.EnterDate, 
tblvisitor.remark, 
tblvisitor.outtime
FROM
tblvisitor";

$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
while($fila=mysqli_fetch_array($dato)){

?>
<tr>
<td><?php echo $fila['name'. " ". 'last_name_dad' . " ". 'last_name_mom']; ?></td>
<td><?php echo $fila['']; ?></td>
<td><?php echo $fila['']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['rol']; ?></td>



<?php
}

}
