
<?php
require_once "conexion.php";

// Obtener el texto ingresado en el buscador
$buscar = trim($_GET['buscar'] ?? '');

// Consultar los contactos en MySQL
if ($buscar !== '') {
    $sql = "SELECT * FROM contactos
            WHERE nombre LIKE ?
            ORDER BY nombre ASC";

    $stmt = $conexion->prepare($sql);
    $termino = "%" . $buscar . "%";
    $stmt->bind_param("s", $termino);
    $stmt->execute();

    $contactos = $stmt->get_result();
} else {
    $sql = "SELECT * FROM contactos ORDER BY nombre ASC";
    $contactos = $conexion->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <header>
        <h1>Agenda de Contactos</h1>
        <p>Organizá tus contactos en un solo lugar.</p>
    </header>

    <main>

        <!-- Mensaje de confirmación -->
        <?php if (isset($_GET["guardado"]) && $_GET["guardado"] == "1"): ?>
            <p class="mensaje-exito">
                ¡Contacto guardado correctamente!
            </p>
        <?php endif; ?>

        <!-- Agregar contacto -->
        <section>
            <h2>Agregar contacto</h2>

            <form action="guardar_contacto.php" method="POST">

                <label for="nombre">Nombre completo:</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    maxlength="100"
                    required
                >

                <label for="telefono">Teléfono:</label>
                <input
                    type="tel"
                    id="telefono"
                    name="telefono"
                    maxlength="20"
                >

                <label for="email">Correo electrónico:</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    maxlength="100"
                >

                <button type="submit">Guardar contacto</button>
            </form>
        </section>

        <!-- Buscar contacto -->
        <section>
            <h2>Buscar contacto</h2>

            <form action="index.php" method="GET">
                <label for="buscar">Nombre del contacto:</label>

                <input
                    type="text"
                    id="buscar"
                    name="buscar"
                    placeholder="Ingresá un nombre..."
                    value="<?php echo htmlspecialchars($buscar, ENT_QUOTES, 'UTF-8'); ?>"
                >

                <button type="submit">Buscar</button>

                <a href="index.php">Mostrar todos</a>
            </form>
        </section>

        <!-- Lista de contactos -->
        <section>
            <h2>Mis contactos</h2>

            <?php if ($contactos && $contactos->num_rows > 0): ?>

                <div class="lista-contactos">

                    <?php while ($contacto = $contactos->fetch_assoc()): ?>

                        <article class="contacto">

                            <h3>
                                <?php
                                echo htmlspecialchars(
                                    $contacto['nombre'],
                                    ENT_QUOTES,
                                    'UTF-8'
                                );
                                ?>
                            </h3>

                            <p>
                                <strong>Teléfono:</strong>
                                <?php
                                echo htmlspecialchars(
                                    $contacto['telefono'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?: 'No especificado';
                                ?>
                            </p>

                            <p>
                                <strong>Correo electrónico:</strong>
                                <?php
                                echo htmlspecialchars(
                                    $contacto['email'] ?? '',
                                    ENT_QUOTES,
                                    'UTF-8'
                                ) ?: 'No especificado';
                                ?>
                            </p>

                            <!-- Espacio reservado para editar y eliminar -->
                            <div class="acciones-contacto">
                                <!-- Próximamente: botones Editar y Eliminar -->
                            </div>

                        </article>

                    <?php endwhile; ?>

                </div>

            <?php else: ?>

                <p class="sin-contactos">
                    <?php if ($buscar !== ''): ?>
                        No se encontraron contactos que coincidan con
                        "<?php echo htmlspecialchars($buscar, ENT_QUOTES, 'UTF-8'); ?>".
                    <?php else: ?>
                        Todavía no hay contactos registrados en la agenda.
                    <?php endif; ?>
                </p>

            <?php endif; ?>

        </section>

    </main>

    <footer>
        <p>Proyecto grupal - EPET N.º 34</p>
    </footer>

</body>
</html>
