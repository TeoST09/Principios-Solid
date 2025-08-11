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
        <input type="hidden" name="id" value="<?php echo $tarea['id']; ?>">
        
        <input type="text" name="titulo" value="<?php echo htmlspecialchars($tarea['titulo']); ?>" required>
        
        <input name="descripcion" value="<?php echo htmlspecialchars($tarea['descripcion']); ?> " required>
        
        <button type="submit" name="accion" value="editar">Guardar Cambios</button>
        <a href="../index.php">Cancelar</a>
    </form>
</div>
</body>
</html>
