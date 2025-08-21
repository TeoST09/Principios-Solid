<?php
include_once("../../Config/db.php");
include_once("../Models/tareas.php");

$name = $_POST['titulo'] ?? 'Sin título';
$description = $_POST['descripcion'] ?? 'Sin descripción';
$tipo = $_POST['tipo'] ?? 'normal';
$fechaLimite = $_POST['fecha_limite'] ?? null;

$mysqli = new mysqli("localhost", "root", "", "SRP");

// Creamos objeto tarea
$tarea = new Tarea(null, $name, $description, $tipo, $fechaLimite);

if ($tipo === "urgente") {
    $save = new TareaUrgente($mysqli);
    $save->save($tarea);
} else {
    $save = new GuardarTarea($mysqli);
    $save->save($tarea);  
}

header("Location: ../../index.php");
exit();
