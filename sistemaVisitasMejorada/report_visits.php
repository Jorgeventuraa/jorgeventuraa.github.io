


<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">REPORTE DE VISITAS POR FECHAS</h4>

    <?php 
    #llamando la conexion a la base datos
    include "includes/conexion.php";
    $sql=$conexion->query(" select * from tblvisitor ");
    ?>


    <form action="fpdf/GenerarReporteIngresoFecha.php" target="_blank">
        <input required type="date" name="txtfechainicio" class="input input__text mb-2">
        <input required type="date" name="txtfechafinal" class="input input__text mb-2">
        <select required name="txtvisitante" class="input input__select mb-2">
        <option value="todos">Todos los visitantes</option>
            <?php
            while ($datos = $sql->fetch_object() ) { ?>
                <option hidden value="<?= $datos->id_registro?>"> <?= $datos->nombre ." ".  $datos->apellido_Paterno ." ". $datos->apellido_Materno?> </option>
           <?php  }
            ?>
        </select>
        <button type="submit" name="btngenerar" class="btn btn-primary w-100 p-3">Generar reporte</button>
    </form>







</div>
</div>
<!-- fin del contenido principal -->
