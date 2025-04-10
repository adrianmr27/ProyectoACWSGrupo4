<?php
include 'conexion.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT id, nombre, password FROM usuarios WHERE email = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        echo "Bienvenido, " . $row['nombre'];
    } else {
        echo "Contraseña incorrecta." . $row['password'];
    }
} else {
    echo "No se encontró el usuario.";
}
?>
