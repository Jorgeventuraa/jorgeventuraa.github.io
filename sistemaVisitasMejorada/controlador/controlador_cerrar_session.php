<?php
session_start();
session_destroy();
#aca rederige al login.php a los que no iniciaron sesion
#en sistemaVisitas(Ay puede ir el nombre del proyecto)
header("location:/sistemaVisitas/vista/login/login.php");
?>