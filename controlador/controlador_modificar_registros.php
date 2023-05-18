<?php
if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtid"]) and !empty($_POST["txtapellidopaterno"]) and !empty($_POST["txtapellidomaterno"])  and !empty($_POST["txtnombres"]) and !empty($_POST["txtoficina"]) ) {
        $id = $_POST["txtid"];
        $apellidopaterno = $_POST["txtapellidopaterno"];
        $apellidomaterno = $_POST["txtapellidomaterno"];
        $nombre = $_POST["txtnombres"];
        $oficina = $_POST["txtoficina"];

        $sql=$conexion->query(" update registro set apellido_Paterno='$apellidopaterno', apellido_Materno='$apellidomaterno', nombre='$nombre ', oficina='$oficina' where id_registro=$id");
        if ($sql == true) { ?>
            <script>
                    $(function notificacion(){
                        new PNotify({
                        title:"CORRECTO",
                        type:"success",
                        text:"El visitante se a modificado correctamente en la base datos",
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
                        text:"Error al modificar visitante",
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