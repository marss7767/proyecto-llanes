<?php
// Asegurarse de que la conexión esté disponible
if (!isset($conexion)) {
    require_once "conexion.php";
}

$sql = "SELECT * FROM contactos ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>

<section>
    <h2>Mis contactos</h2>
    <?php if ($resultado && $resultado->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($contacto = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($contacto['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($contacto['telefono']); ?></td>
                        <td><?php echo htmlspecialchars($contacto['email']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron contactos guardados.</p>
    <?php endif; ?>
<<<<<<< Updated upstream
</section>
=======
</section>
>>>>>>> Stashed changes
