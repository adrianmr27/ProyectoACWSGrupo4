<?php
include 'conexion.php';

session_start();

if (isset($_POST['name'], $_POST['email'], $_POST['telefono'], $_POST['password'])) {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, telefono, password, tipo_usuario) VALUES (?, ?, ?, ?, 'cliente')";
    $stmt = $conexion->prepare($sql);
    
    $stmt->bind_param('ssss', $nombre, $email, $telefono, $password);

    if ($stmt->execute()) {
        $_SESSION['email'] = $email;
        
        // Redirigir a cuenta.html enviando email por qs
        header("Location: cuenta.php?email=" . urlencode($email));

        exit();
    } else {
        echo "Error al registrar el usuario.";
    }
} else {
    echo "Faltan datos en el formulario.";
}
?>