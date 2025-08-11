<?php
include_once("../../Config/db.php");
include_once("../Models/tareas.php");

$name = $_POST['titulo'] ?? 'Sin título';
$description = $_POST['descripcion'] ?? 'Sin descripción';

$mysqli = new mysqli("localhost", "root", "", "SRP");

$tarea = new construirTarea(null, $name, $description);
$save = new GuardarTarea($mysqli);
$save->save($tarea);

header("Location: ../../index.php");
exit();
