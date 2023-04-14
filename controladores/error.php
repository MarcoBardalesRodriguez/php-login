<?php
function loginError(){
    $error = [
        "success" => false,
        "message" => "Credenciales incorrectas"
    ];
    return $error;
}
function registerError(){
    $error = [
        "success" => false,
        "message" => "Registro incorrecto"
    ];
    return $error;
}
?>