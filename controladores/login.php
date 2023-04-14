<?php
include_once '../modelo/database.php';
include_once 'error.php';

session_start(); // Iniciar la sesión

// Obtener los datos del formulario de login
// Obtener los datos enviados por AJAX
$username = $_POST["username"];
$password = $_POST["password"];

// Consulta SQL para verificar las credenciales del usuario
$result = verificarUsuario($username);

// Verificar la contraseña del usuario
if ($result && password_verify($password, $result['password'])) {
    // Asignar los valores a las variables de sesión
    $_SESSION["usuario_id"] = $username; // Asignar el nombre de usuario a la variable de sesión "usuario_id"

    // Devolver una respuesta en formato JSON indicando que el inicio de sesión fue exitoso
    echo json_encode(array("success" => true, "message" => "Inicio de sesión exitoso"));

} else {
  // Las credenciales son incorrectas, mostrar un mensaje de error
  echo json_encode(loginError());
}

?>