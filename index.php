<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tareas</title>
    <link rel="stylesheet" href="Style/style.css">
</head>
<body>
<div class="container">
    <h1>Gestión de Tareas</h1>

    <?php

    $titulo = $_POST['titulo'] ?? '';
    $descripcion = $_POST['descripcion'] ?? '';
    $tipo = $_POST['tipo'] ?? 'normal';
    $fechaLimite = $_POST['fecha_limite'] ?? '';
    ?>


    <form method="POST" action="Backend/Controller/tareaController.php">
        <input type="text" name="titulo" placeholder="Título de la tarea" value="<?= htmlspecialchars($titulo) ?>" required>
        <textarea name="descripcion" placeholder="Descripción" required><?= htmlspecialchars($descripcion) ?></textarea>

        <label for="tipo">Tipo de tarea:</label>
        <select name="tipo">
            <option value="normal" <?= $tipo === 'normal' ? 'selected' : '' ?>>Normal</option>
            <option value="urgente" <?= $tipo === 'urgente' ? 'selected' : '' ?>>Urgente</option>
        </select>

        <?php if ($tipo === 'urgente'): ?>
            <label for="fecha_limite">Fecha límite:</label>
            <input type="date" name="fecha_limite" value="<?= htmlspecialchars($fechaLimite) ?>" required>
        <?php endif; ?>

        <button type="submit" name="accion" value="crear">Crear Tarea</button>
    </form>

    <hr>


    <ul id="lista-tareas">
        <?php
        require_once("Config/db.php");

        $sql = "SELECT * FROM tareas";
        $tareas = mysqli_query($mysqli, $sql);

        foreach($tareas as $tarea) {
            echo "<li>
                <strong>{$tarea['titulo']}</strong>: {$tarea['descripcion']} 
                ({$tarea['tipo']}";
            if ($tarea['tipo'] === "urgente" && !empty($tarea['fecha_limite'])) {
                echo " - Fecha límite: {$tarea['fecha_limite']}";
            }
            echo ") 
                <form method='POST' action='Backend/Controller/eliminarController.php' style='display:inline;'>
                    <input type='hidden' name='id' value='{$tarea['id']}'>
                    <button type='submit' class='delete' name='accion' value='eliminar'>Eliminar</button>
                </form>
                
                <form method='GET' action='Frontend/editar.php' style='display:inline;'>
                    <input type='hidden' name='id' value='{$tarea['id']}'>
                    <button type='submit class='btn-editar'>Editar</button>
                </form>
            </li>";
        }
        ?>
    </ul>
</div>
</body>
</html>
