<?php
if (!empty($_POST["btnrmodificar"])) {
    if (!empty($_POST["txtnombres"]) and !empty($_POST["txtapellidopaterno"]) and !empty($_POST["txtapellidomaterno"]) and !empty($_POST["txtusuario"]) ) {
        $nombre = $_POST["txtnombres"];
        $apellidopaterno = $_POST["txtapellidopaterno"];
        $apellidomaterno = $_POST["txtapellidomaterno"];
        $usuario = $_POST["txtusuario"];
        $id = $_POST["txtid"];

        $sql = $conexion->query(" update usuario set nombre='$nombre', apellido_paterno='$apellidopaterno', apellido_materno='$apellidomaterno', usuario='$usuario' where id_usuario=$id ");
        if ($sql == true) { ?>
            <script>
                    $(function notificacion(){
                        new PNotify({
                        title:"CORRECTO",
                        type:"success",
                        text:"Tus datos se modificaron correctamente en la base datos",
                        styling:"bootstrap3"
                        })
                    })
            </script>
        <?php } else { ?>
            <script>
                    $(function notificacion(){ 
                        new PNotify({
                        title:"INCORRECTO",
                        type:"error",
                        text:"Error al modificar datos",
                        styling:"bootstrap3"
                        })
                    })
            </script>
        <?php }
        
    } else { ?>
        <script>
            $(function notificacion(){
                new PNotify({
                   title:"ERROR",
                   type:"error",
                   text:"Los campos estan vacios",
                   styling:"bootstrap3"
                })
            })
        </script>
    <?php } ?>

    <script>
            setTimeout(() => {
                window.history.replaceState(null,null,window.location.pathname);
            },  0);
    </script>
    
<?php }
?>