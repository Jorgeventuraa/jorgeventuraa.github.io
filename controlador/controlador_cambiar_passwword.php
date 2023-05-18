<?php

if (!empty($_POST["btnmodificar"]) ) {
   if (!empty($_POST["txtpasswordactual"]) and !empty($_POST["txtpasswordnueva"]) and !empty($_POST["txtid"]) ) {
        $passActual=md5($_POST["txtpasswordactual"]);
        $passNueva=md5($_POST["txtpasswordnueva"]);
        $id=$_POST["txtid"];
        $verificarPassActual = $conexion->query(" select password from usuario where id_usuario=$id ");
        if ($verificarPassActual->fetch_object()->password == $passActual) { 
                 $sql=$conexion->query(" update usuario set password='$passNueva' where id_usuario=$id ");
                 if ($sql == true) { ?>
                    <script>
                        $(function notificacion(){
                            new PNotify({
                            title:"CORRECTO",
                            type:"success",
                            text:"Tu contraseña se modifico correctamente",
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
                        text:"Error al modificar contraseña",
                        styling:"bootstrap3"
                        })
                    })
                </script>
                 <?php }       
         } else { ?>
           <script>
                $(function notificacion(){ 
                    new PNotify({
                        title:"INCORRECTO",
                        type:"error",
                        text:"La contraseña actual es incorrecta",
                        styling:"bootstrap3"
                    })
                })
        </script>
       <?php  }
   } else { ?>
    <script>
            $(function notificacion(){ 
                new PNotify({
                    title:"INCORRECTO",
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