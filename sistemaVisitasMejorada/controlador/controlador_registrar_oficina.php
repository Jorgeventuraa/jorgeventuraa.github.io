<?php
if (!empty($_POST["btnregistrar"]) ) {
    #Validando que ningun campo este vacio
    if (!empty($_POST["txtgerenciasoficinas"]) ) {
        # recogiendo datos en una variable cuando presiona el boton Registrar
        $gerenciasoficinas = $_POST["txtgerenciasoficinas"];

        # Para que no aya duplicado de gerencias y o oficinas
        $verificarNombre=$conexion->query(" select count(*) as 'total' from oficina where nombreOficina='$gerenciasoficinas' ");

        if ($verificarNombre->fetch_object()->total > 0) { ?>
            <script>
                $(function notificacion(){
                    new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"La Gerencia y/o Oficina ya se encuentra registrado en la base datos",
                    styling:"bootstrap3"
                    })
                })
            </script>
        <?php } else {
                    $sql=$conexion->query("insert into oficina(nombreOficina)values('$gerenciasoficinas')" );
                    if ($sql == true) { ?>
                        <script>
                            $(function notificacion(){
                                new PNotify({
                                title:"CORRECTO",
                                type:"success",
                                text:"Gerencia y/o Oficina registrado correctamente en la base datos",
                                styling:"bootstrap3"
                                })
                            })
                        </script>
                    <?php } else { ?>
                        <script>
                            $(function notificacion(){
                                new PNotify({
                                title:"ERROR",
                                type:"error",
                                text:"Error al registrar Gerencia y/o Oficina",
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
                   text:"El campos estan vacio ingrese datos por favor",
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