<?php
if (!empty($_POST["btnregistrarvisitante"])) {
     #Validando que ningun campo este vacio
     if (!empty($_POST["txtdni"]) and !empty($_POST["txtapellidop"]) and !empty($_POST["txtapellidom"])  and !empty($_POST["txtnombre"]) and !empty($_POST["txtoficina"]) ) {
        # recogiendo datos en una variable cuando presiona el boton Registrar
        $dni = $_POST["txtdni"];
        $apellidopaterno = $_POST["txtapellidop"];
        $apellidomaterno = $_POST["txtapellidom"];
        $nombre = $_POST["txtnombre"];
        $oficina = $_POST["txtoficina"];

        $sql=$conexion->query("insert into registro(dni,apellido_Paterno,apellido_Materno,nombre,oficina)values('$dni','$apellidopaterno','$apellidomaterno','$nombre','$oficina')" );

        if ($sql==true) { ?>
            <script type="text/javascript">
            alert("EL VISITANTE <?=$nombre ?> SE A REGISTRADO CORRECTAMENTE EN LA BASE DATOS");
            window.location.href="index2.php";
        </script>
       <?php } else { ?>
        <script type="text/javascript">
            alert("ERROR AL REGISTRAR VISITANTE");
            window.location.href="index2.php";
        </script>
        <?php }


     } else { ?>
        <script type="text/javascript">
            alert("LOS CAMPOS ESTAN VACIOS");
            window.location.href="index2.php";
        </script>
     <?php } ?> 
     <script>
            setTimeout(() => {
                window.history.replaceState(null,null,window.location.pathname);
            },  0);
    </script>
<?php }
?>