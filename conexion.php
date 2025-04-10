<?php
$conexion = new mysqli("localhost", "floristeria", "123", "floristeria");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>