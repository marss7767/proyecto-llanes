<?php

require_once __DIR__ . "/config/conexion.php";

$busqueda = $_GET["busqueda"] ?? "";
$busqueda = is_string($busqueda) ? trim($busqueda) : "";

if (mb_strlen($busqueda) > 100) {
    $busqueda = mb_substr($busqueda, 0, 100);
}

// Consulta con búsqueda opcional
$sql = "SELECT id_contacto, nombre, telefono, email
        FROM contactos";

if ($busqueda !== "") {
    $sql .= " WHERE nombre LIKE ? OR telefono LIKE ? OR email LIKE ?";
}

$sql .= " ORDER BY nombre ASC";

$stmt = $conexion->prepare($sql);

if ($busqueda !== "") {
    $parametro = "%" . $busqueda . "%";
    $stmt->bind_param("sss", $parametro, $parametro, $parametro);
}

$stmt->execute();
$resultado = $stmt->get_result();

$contactos = [];

while ($fila = $resultado->fetch_assoc()) {
    $contactos[] = $fila;
}

$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header>
        <h1>Agenda de Contactos</h1>
        <p>Organizá tus contactos en un solo lugar.</p>
    </header>

    <main>

        <?php if (isset($_GET["guardado"]) && $_GET["guardado"] === "1"): ?>
            <div class="mensaje-exito">Contacto guardado correctamente.</div>
        <?php endif; ?>

        <?php if (isset($_GET["actualizado"]) && $_GET["actualizado"] === "1"): ?>
            <div class="mensaje-exito">Contacto actualizado correctamente.</div>
        <?php endif; ?>

        <?php if (isset($_GET["eliminado"]) && $_GET["eliminado"] === "1"): ?>
            <div class="mensaje-exito">Contacto eliminado correctamente.</div>
        <?php endif; ?>

        <?php if (isset($_GET["error"])): ?>
            <div class="mensaje-error">
                <?php
                $errores = [
                    "datos" => "Revisá los datos ingresados.",
                    "guardar" => "No se pudo guardar el contacto.",
                    "actualizar" => "No se pudieron guardar los cambios.",
                    "eliminar" => "No se pudo eliminar el contacto.",
                    "noexiste" => "El contacto solicitado no existe.",
                ];

                $clave = is_string($_GET["error"]) ? $_GET["error"] : "";
                echo $errores[$clave] ?? "Ocurrió un error.";
                ?>
            </div>
        <?php endif; ?>

        <section>
            <h2>Agregar contacto</h2>

            <form action="guardar_contacto.php" method="post">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" maxlength="100" required>

                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" maxlength="30" required>

                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" maxlength="120" required>

                <button type="submit">Guardar contacto</button>
            </form>
        </section>

        <section>
            <h2>Buscar contacto</h2>

            <form action="index.php" method="get">
                <label for="busqueda">Buscar por nombre, teléfono o correo</label>
                <input
                    type="search"
                    id="busqueda"
                    name="busqueda"
                    maxlength="100"
                    placeholder="Ej.: Ana, 221..., correo..."
                    value="<?= htmlspecialchars($busqueda, ENT_QUOTES, 'UTF-8') ?>"
                >

                <button type="submit">Buscar</button>

                <?php if ($busqueda !== ""): ?>
                    <a href="index.php">Ver todos</a>
                <?php endif; ?>
            </form>
        </section>

        <section>
            <h2>
                <?= $busqueda !== ""
                    ? "Resultados para: \"" . htmlspecialchars($busqueda, ENT_QUOTES, 'UTF-8') . "\""
                    : "Mis contactos" ?>
            </h2>

            <?php if (count($contactos) === 0): ?>
                <p class="sin-contactos">
                    <?= $busqueda !== ""
                        ? "No se encontraron coincidencias."
                        : "Todavía no hay contactos guardados." ?>
                </p>
            <?php else: ?>
                <div class="tabla-scroll">
                    <table class="tabla-contactos">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($contactos as $contacto): ?>
                                <tr>
                                    <td><?= htmlspecialchars($contacto["nombre"], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($contacto["telefono"], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td>
                                        <a href="mailto:<?= htmlspecialchars($contacto["email"], ENT_QUOTES, 'UTF-8') ?>">
                                            <?= htmlspecialchars($contacto["email"], ENT_QUOTES, 'UTF-8') ?>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="acciones-contacto">
                                            <a href="editar_contacto.php?id=<?= (int) $contacto["id_contacto"] ?>">Editar</a>

                                            <form
                                                action="eliminar_contacto.php"
                                                method="post"
                                                onsubmit="return confirm('¿Eliminar este contacto?');"
                                            >
                                                <input
                                                    type="hidden"
                                                    name="id"
                                                    value="<?= (int) $contacto["id_contacto"] ?>"
                                                >
                                                <button type="submit" class="btn-eliminar">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>

    </main>

    <footer>
        <p>Proyecto grupal - EPET N.º 34</p>
    </footer>

</body>
</html>