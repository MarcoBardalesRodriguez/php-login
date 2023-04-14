<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ya ha iniciado sesión
if(isset($_SESSION["usuario_id"])){
    // Redirigir a la página de inicio del usuario
    header("Location: inicio.php");
    exit;
}

$page_title = 'login';
include_once './componentes/header.php';

?>

<div class="container d-flex flex-column justify-content-around align-items-center py-4">
    <div class="container d-flex justify-content-center p-5">
        <!-- icono login -->
        <i class="fa fa-user-o text-dark" aria-hidden="true" style="font-size: 250px"></i>
    </div>
    <div class="d-flex justify-content-center">
        <!-- ingresar con un usuario existente -->
        <!-- Button trigger modal -->
        <button id="btn-login" type="button" class="btn btn-primary btn-lg mx-5" data-toggle="modal" data-target="#exampleModalCenter">
            Ingresar
        </button>
        <!-- registrar un nuevo usuario -->
        <!-- Button trigger modal -->
        <button id="btn-register" type="button" class="btn btn-primary btn-lg mx-5" data-toggle="modal" data-target="#exampleModalCenter">
            Registrarse
        </button>
    </div>
</div>

<?php
include_once './componentes/form-modal.php';
include_once './componentes/footer.php';
?>