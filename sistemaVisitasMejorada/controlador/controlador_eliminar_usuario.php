<?php
#validanddo que se haya enviado correctamente la ID
if (!empty($_GET["id"])) {
    # Almacenamos la Id
    $id=$_GET["id"];
    #eliminando el registro de la id que se envio a Almacenando Id
    $sql=$conexion->query(" delete from usuario where id_usuario=$id");
    #validando si realmente se elimino o no
    if ($sql==true) {?>
        <script>
            $(function notificacion(){
                new PNotify({
                   title:"CORRECTO",
                   type:"success",
                   text:"Usuario eliminado correctamente de la base datos",
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