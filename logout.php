<?php
session_start(); // Iniciar la sesión
session_destroy(); // Cerrar la sesión
header("Location: index.php");
exit;
?>