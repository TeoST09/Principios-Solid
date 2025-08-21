<?php
require_once("../Config/db.php");

if (!isset($_GET['id'])) {
    die("ID no especificado");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM tareas WHERE id = $id";
$result = mysqli_query($mysqli, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Tarea no encontrada");
}

$tarea = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="../Style/style.css">
</head>
<body>
<div class="container">
    <h1>Editar Tarea</h1>
    <form method="POST" action="../Backend/Controller/editarController.php">
        <input type="hidden" name="id" value="<?= $tarea['id']; ?>">

        <input type="text" name="titulo" value="<?= htmlspecialchars($tarea['titulo']); ?>" required>

        <textarea name="descripcion" required><?= htmlspecialchars($tarea['descripcion']); ?></textarea>

        <label for="tipo">Tipo de tarea:</label>
        <select name="tipo">
            <option value="normal" <?= $tarea['tipo'] === 'normal' ? 'selected' : '' ?>>Normal</option>
            <option value="urgente" <?= $tarea['tipo'] === 'urgente' ? 'selected' : '' ?>>Urgente</option>
        </select>

        <?php if ($tarea['tipo'] == 'urgente'): ?>
            <label for="fecha_limite">Fecha límite:</label>
            <input type="date" name="fecha_limite" value="<?=($tarea['fechaLimite']); ?>" required>
        <?php endif; ?>

        <button type="submit" name="accion" value="editar">Guardar Cambios</button>
        <a href="../index.php">Cancelar</a>
    </form>
</div>
</body>
</html>
