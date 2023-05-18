<?php
if (!empty($_POST["btnrmodificar"])) {
    if (!empty($_POST["txtid"]) and !empty($_POST["txtnombreentidad"]) and !empty($_POST["txttelefonoentida"])  and !empty($_POST["txtubicacion"]) and !empty($_POST["txtRUC"]) ) {
        $id = $_POST["txtid"];
        $NombreEntidad= $_POST["txtnombreentidad"];
        $TelefonoEntidad = $_POST["txttelefonoentida"];
        $ubicacion = $_POST["txtubicacion"];
        $ruc = $_POST["txtRUC"];

        $sql=$conexion->query(" update empresa set nombre='$NombreEntidad', telefono='$TelefonoEntidad', ubicacion='$ubicacion ', ruc='$ruc' where id_empresa=$id");
        if ($sql == true) { ?>
            <script>
                    $(function notificacion(){
                        new PNotify({
                        title:"CORRECTO",
                        type:"success",
                        text:"Datos de la entidad modificado correctamente en la base datos",
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
                        text:"Error al modificar datos de la entidad",
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
                   text:"Campo vacio",
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