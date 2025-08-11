
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
        <form id="form-tarea" method="POST" action="Backend/Controller/tareaController.php">
            <input type="hidden" name="id" id="tarea-id">
            <input type="text" name="titulo" id="titulo" placeholder="Título de la tarea" required>
            <textarea name="descripcion" id="descripcion" placeholder="Descripción" required></textarea>
            <button type="submit" name="accion" value="crear">Crear</button>
            <button type="submit" name="accion" value="editar" id="btn-editar" style="display:none;">Editar</button>
        </form>
        <hr>
        <ul id="lista-tareas">
            <?php
            require_once("Config/db.php");

            $sql = "SELECT * FROM tareas";
            $tareas = mysqlI_query($mysqli, $sql);
            foreach($tareas as $tarea) {
                echo "<li>
                    <strong>{$tarea['titulo']}</strong>: {$tarea['descripcion']}
                    <a href='Frontend/editar.php?id={$tarea['id']}'>Editar</a>
                        <form method='POST' action='Backend/Controller/eliminarController.php' style='display:inline;'>
                            <input type='hidden' name='id' value='{$tarea['id']}'>
                            <button type='submit' name='accion' value='eliminar'>Eliminar</button>
                        </form>
                      </li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>