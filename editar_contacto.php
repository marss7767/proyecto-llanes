<?php

require_once __DIR__ . "/config/conexion.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT id_contacto, nombre, telefono, email
        FROM contactos
        WHERE id_contacto = ?";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$contacto = $resultado->fetch_assoc();

$stmt->close();
$conexion->close();

if (!$contacto) {
    header("Location: index.php?error=noexiste");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar contacto - Agenda de Contactos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <header>
        <h1>Editar contacto</h1>
        <p>Modificá los datos y guardá los cambios.</p>
    </header>

    <main>

        <?php if (isset($_GET["error"])): ?>
            <div class="mensaje-error">
                <?= $_GET["error"] === "actualizar"
                    ? "No se pudieron guardar los cambios. Intentá nuevamente."
                    : "Revisá los datos ingresados." ?>
            </div>
        <?php endif; ?>

        <section>
            <h2>Datos del contacto</h2>

            <form action="actualizar_contacto.php" method="post">
                <input type="hidden" name="id" value="<?= (int) $contacto["id_contacto"] ?>">

                <label for="nombre">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    maxlength="100"
                    required
                    value="<?= htmlspecialchars($contacto["nombre"], ENT_QUOTES, 'UTF-8') ?>"
                >

                <label for="telefono">Teléfono</label>
                <input
                    type="text"
                    id="telefono"
                    name="telefono"
                    maxlength="30"
                    required
                    value="<?= htmlspecialchars($contacto["telefono"], ENT_QUOTES, 'UTF-8') ?>"
                >

                <label for="email">Correo electrónico</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    maxlength="120"
                    required
                    value="<?= htmlspecialchars($contacto["email"], ENT_QUOTES, 'UTF-8') ?>"
                >

                <button type="submit">Guardar cambios</button>
                <a href="index.php">Cancelar</a>
            </form>
        </section>

    </main>

    <footer>
        <p>Proyecto grupal - EPET N.º 34</p>
    </footer>

</body>
</html>