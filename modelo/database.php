<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php-login-1449415";

// Crear una nueva conexión a la base de datos utilizando PDO
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Conexión exitosa";
} catch(PDOException $e) {
  // echo "Error de conexión: " . $e->getMessage();
}

function verificarUsuario($username) {
  global $conn;
  $sql = "SELECT * FROM usuarios WHERE username = :username";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':username', $username);
  $stmt->execute();
  $row = $stmt->fetch(PDO::FETCH_ASSOC);

  return $row;
}

function crearUsuario($username, $password) {
  global $conn;
  // Hash de la contraseña del usuario
  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $password_hash);

  try {
    if ($stmt->execute()) {
      return TRUE;
    }else{
      return FALSE;
    }
  } catch (PDOException $e) {
    return $e;
  }
}
?>