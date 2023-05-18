<?php
#validando que se presione el boton Guardar Cambios(btnmodificar)
if (!empty($_POST["btnmodificar"])) {
    # Validando que todos los campos esten correctamente
    if (!empty($_POST["txtapellidopaterno"]) and !empty($_POST["txtapellidomaterno"]) and !empty($_POST["txtnombres"]) and !empty($_POST["txtusuario"]) ) {
        # recogiendo datos en una variable cuando presiona el boton Guardar Cambios
        $id = $_POST["txtid"];
        $apellidopaterno = $_POST["txtapellidopaterno"];
        $apellidomaterno = $_POST["txtapellidomaterno"];
        $nombre = $_POST["txtnombres"];
        $usuario = $_POST["txtusuario"];
        # Para que no aya duplicado de Usuarios
        $sql=$conexion->query(" select count(*) as 'total' from registrador where usuario='$usuario' and id_registrador!=$id ");

        #para verificar si el usuario existe o no
        if ($sql->fetch_object()->total > 0) { ?>
            <script>
            $(function notificacion(){
                new PNotify({
                   title:"ERROR",
                   type:"error",
                   text:"El usuario registrador <?=$usuario ?> ya se encuentra registrado en la base datos",
                   styling:"bootstrap3"
                })
            })
         </script>


        <?php } else {
            # Si en caso de que el usuario no este registrado vamos proceder a modificar
            #$modificar = es una variable
            $modificar=$conexion->query(" update registrador set apellido_paterno='$apellidopaterno', apellido_materno='$apellidomaterno', nombre='$nombre ', usuario='$usuario' where id_registrador=$id");

            #para verificar si se modifico
            if ($modificar == true) { ?>
                <script>
                    $(function notificacion(){
                        new PNotify({
                        title:"CORRECTO",
                        type:"success",
                        text:"El usuario se a actualizado correctamente en la base datos",
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
                        text:"Error al modificar usuario",
                        styling:"bootstrap3"
                        })
                    })
                </script>
            <?php }
            
        }
        
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