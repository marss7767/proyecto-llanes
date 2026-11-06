<?php
if (!isset($conexion)) {
    require_once "conexion.php";
}

$busqueda = trim($_GET['busqueda'] ?? '');
$resultadoBusqueda = null;

if ($busqueda !== '') {
    $sql = "SELECT * FROM contactos WHERE nombre LIKE ? OR telefono LIKE ? ORDER BY id DESC";
    $stmt = $conexion->prepare($sql);
    $param = "%" . $busqueda . "%";
    $stmt->bind_param("ss", $param, $param);
    $stmt->execute();
    $resultadoBusqueda = $stmt->get_result();
}
?>

<section>
    <h2>Buscar contacto</h2>
    <form action="index.php" method="GET">
        <input 
            type="text" 
            name="busqueda" 
            placeholder="Buscar por nombre o teléfono..." 
            value="<?php echo htmlspecialchars($busqueda); ?>"
            required
        >
        <button type="submit">Buscar</button>
        <?php if ($busqueda !== ''): ?>
            <a href="index.php">Ver todos</a>
        <?php endif; ?>
    </form>

    <?php if ($busqueda !== ''): ?>
        <div class="resultados-busqueda">
            <h3>Resultados para: "<?php echo htmlspecialchars($busqueda); ?>"</h3>
            <?php if ($resultadoBusqueda && $resultadoBusqueda->num_rows > 0): ?>
                <ul>
                    <?php while ($c = $resultadoBusqueda->fetch_assoc()): ?>
                        <li><strong><?php echo htmlspecialchars($c['nombre']); ?></strong> - <?php echo htmlspecialchars($c['telefono']); ?> (<?php echo htmlspecialchars($c['email']); ?>)</li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p>No se encontraron coincidencias.</p>
            <?php endif; ?>
        </div>
        <?php 
        if (isset($stmt)) {
            $stmt->close();
        }
        ?>
    <?php endif; ?>
</section>
