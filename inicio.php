<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION["usuario_id"])){
    // Redirigir a la página de login
    header("Location: index.php");
    exit;
}
// Obtener el nombre de usuario de la sesión
$nombreUsuario = $_SESSION["usuario_id"];

//Encabezado html
$page_title = 'inicio';
include_once './componentes/header.php';
?>

<!-- Mostrar un mensaje de bienvenida al usuario -->
<div class="container d-flex flex-column justify-content-around align-items-center py-4">
    <h1>Bienvenido <?php echo $nombreUsuario ?></h1>

    <img class="img-fluid mb-4" src="./src/a-cat.jpg" alt="code-imagen" srcset="" style="max-height:500px; width: auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 8px;">

    <a role="button" class="btn btn-primary btn-lg" href="./logout.php">cerrar sesion</a>
</div>

<?php
include_once './componentes/footer.php';
?>