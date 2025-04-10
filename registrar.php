<?php
include 'conexion.php';

$nombre = $_POST['name'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, email, telefono, password) VALUES (?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param('ssss', $nombre, $email, $telefono, $password);
$stmt->execute();

echo "Nuevo registro creado.";
?>