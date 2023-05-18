<?php
if (!empty($_POST["btnregistrar"])) {
    #Validando que ningun campo este vacio
    if (!empty($_POST["txtapellidopaterno"]) and !empty($_POST["txtapellidomaterno"]) and !empty($_POST["txtnombres"])  and !empty($_POST["txtDNI"]) and !empty($_POST["txtusuario"]) and !empty($_POST["txtpassword"]) ) {
        # recogiendo datos en una variable cuando presiona el boton Registrar
        $apellidopaterno = $_POST["txtapellidopaterno"];
        $apellidomaterno = $_POST["txtapellidomaterno"];
        $nombre = $_POST["txtnombres"];
        $dni = $_POST["txtDNI"];
        $usuario = $_POST["txtusuario"];
        $password = md5($_POST["txtpassword"]);
        #echo $nombre;

        # Para que no aya duplicado de Usuarios
        $sql=$conexion->query(" select count(*) as 'total' from registrador where usuario='$usuario' ");
        
        #para verificar si el usuario existe o no
        if ($sql->fetch_object()->total > 0) {?>
         <script>
            $(function notificacion(){
                new PNotify({
                   title:"ERROR",
                   type:"error",
                   text:"El usuario <?=$usuario ?> registrador ya se encuentra registrado en la base datos",
                   styling:"bootstrap3"
                })
            })
         </script>


        <?php } else {
            
            $registro=$conexion->query(" insert into registrador(apellido_paterno,apellido_materno,nombre,dni,usuario,password)values('$apellidopaterno','$apellidomaterno','$nombre','$dni','$usuario','$password') ");
            if ($registro==true) {?>
             <script>
                $(function notificacion(){
                    new PNotify({
                    title:"CORRECTO",
                    type:"success",
                    text:"El usuario se a registrado correctamente en la base datos",
                    styling:"bootstrap3"
                    })
                })
             </script>
            <?php } else {?>
                <script>
                    $(function notificacion(){
                        new PNotify({
                        title:"ERROR",
                        type:"error",
                        text:"Error al registrar usuario",
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
    <?php }?>

    <script>
            setTimeout(() => {
                window.history.replaceState(null,null,window.location.pathname);
            },  0);
    </script>

<?php }

?>