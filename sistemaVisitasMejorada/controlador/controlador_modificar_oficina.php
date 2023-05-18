<?php
#validando que se presione el boton Guardar Cambios(btnmodificar)
if (!empty($_POST["btnmodificar"])) {
    # Validando que todos los campos esten correctamente
    if (!empty($_POST["txtid"]) and !empty($_POST["txtoficinagerencia"]) ) {
        # recogiendo datos en una variable cuando presiona el boton Guardar Cambios
        $id = $_POST["txtid"];
        $NombreOficina = $_POST["txtoficinagerencia"];
        # Para que no aya duplicado de oficinas
        $verificarNombre=$conexion->query(" select count(*) as 'total' from oficina where nombreOficina='$NombreOficina' and id_oficina!=$id");

        #para verificar si el usuario existe o no
        if ($verificarNombre->fetch_object()->total > 0) { ?>
            <script>
            $(function notificacion(){
                new PNotify({
                   title:"ERROR",
                   type:"error",
                   text:"Gerencia y/o Oficina ya se encuentra registrado en la base datos",
                   styling:"bootstrap3"
                })
            })
         </script>


        <?php } else {
            $sql=$conexion->query(" update oficina set nombreOficina='$NombreOficina' where id_oficina=$id");

            #para verificar si se modifico
            if ($sql == true) { ?>
                <script>
                    $(function notificacion(){
                        new PNotify({
                        title:"CORRECTO",
                        type:"success",
                        text:"Gerencia y/o Oficina se modifico correctamente en la base datos",
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
                        text:"Error al modificar Gerencia-Oficina",
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