<?php
#aca se usa la variable id que usamos en inicio.php -> <td><a href="inicio.php?id=<?=$datos->id_asistencia?
if (!empty($_GET["entrada"])) {
    # Almacenamos la Id
    $entradas=$_GET["entrada"];
    #eliminando el registro de la id que se envio a Almacenando Id
    $sql=$conexion->query(" delete from registro where entrada=$entradas");
    #validando si realmente se elimino o no
    if ($sql==true) {?>
        <script>
            $(function notificacion(){
                new PNotify({
                   title:"CORRECTO",
                   type:"success",
                   text:"Visita eliminada correctamente de la base datos",
                   styling:"bootstrap3"
                })
            })
        </script>
    <?php } else {?>
        <script>
            $(function notificacion(){
                new PNotify({
                   title:"INCORRECTO",
                   type:"error",
                   text:"Error al eliminar",
                   styling:"bootstrap3"
                })
            })
        </script>
   <?php }?>
    <!-- Script para eliminar el error de cuando eliminas sigue apareciendo la alerta eliminda de la base datos-->
        <script>
            setTimeout(() => {
                window.history.replaceState(null,null,window.location.pathname);
            },  0);
        </script>


   <?php }
?>