<?php
include_once '../modelo/database.php';
include_once 'error.php';

session_start(); // Iniciar la sesión

// Obtener los datos del formulario de registro
$username = $_POST["username"];
$password = $_POST["password"];

if(trim($username) === ''|| trim($password) === '') {
  // Devolver una respuesta en formato JSON indicando que los campos no pueden estar vacios
  echo json_encode(array("success" => false, "message" => "Los campos no pueden estar vacios"));

}else{
  // Consulta SQL para insertar un nuevo usuario en la base de datos
  $response = crearUsuario($username, $password);
  if ($response === TRUE) {
    // Asignar los valores a las variables de sesión
    $_SESSION["usuario_id"] = $username; // Asignar el nombre de usuario a la variable de sesión "usuario_id"
  
    // Devolver una respuesta en formato JSON indicando que el inicio de sesión fue exitoso
    echo json_encode(array("success" => true, "message" => "Registro exitoso"));
  
  } else {
    // Si se produce una excepción, verificar si es debido a una duplicidad de nombre de usuario
    if ($response->getCode() == 23000) {
      // El nombre de usuario ya está en uso, mostrar un mensaje de error en formato JSON
      echo json_encode(array("success" => false, "message" => "El nombre de usuario ya está en uso, por favor elija otro."));
    } else {
      // Otro tipo de excepción, mostrar un mensaje de error en formato JSON
      echo json_encode(array("success" => false, "message" => "Error en el registro"));
    }
  
  }
}
?>