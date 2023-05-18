<?php

session_start();

#CONDICION PARA INICIAR SESION
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
        $usuario=$_POST["usuario"];
        $password=md5($_POST["password"]);
        $sql=$conexion->query(" select * from registrador where usuario='$usuario' and password='$password'" );
        if ($datos=$sql->fetch_object()) {
            #Almacenando Nombre de Usuario
            $_SESSION["nombre"]=$datos->nombre;
            $_SESSION["apellido"]=$datos->apellido_paterno ." ". $datos->apellido_materno;
            $_SESSION["id"]=$datos->id_registrador;

            #en sistemaVisitas(Ay puede ir el nombre del proyecto)
            header("location:../sistemaVisitas/index2.php");
        } else {
            echo "<div class ='alert alert-danger'>El usuario no existe</div>";
        }
    } else {
        echo "<div class ='alert alert-danger'>Los campos estan vacios</div>";
    }
    
}
?>