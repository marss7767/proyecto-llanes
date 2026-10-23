
<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$nombre = trim($_POST["nombre"] ?? "");
$telefono = trim($_POST["telefono"] ?? "");
$email = trim($_POST["email"] ?? "");

if ($nombre === "") {
    die("El nombre es obligatorio.");
}

if ($email !== "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("El correo electrónico no es válido.");
}

$sql = "INSERT INTO contactos (nombre, telefono, email)
        VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $nombre, $telefono, $email);

if ($stmt->execute()) {
    header("Location: index.php?guardado=1");
    exit;
} else {
    echo "Error al guardar el contacto.";
}

$stmt->close();
$conexion->close();
?>
