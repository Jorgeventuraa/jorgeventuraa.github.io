<?php
session_start();
session_destroy();
#en sistemaVisitas(Ay puede ir el nombre del proyecto)
header("location:/sistemaVisitas/index.php");
?>