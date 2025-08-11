<?php
include_once("../../Config/db.php");
include_once("../Models/tareas.php");

$id = $_POST['id'] ?? 0;

$mysqli = new mysqli("localhost", "root", "", "SRP");

$tarea = new construirTarea($id, null, null);
$repo = new eliminarTarea($mysqli);
$repo->delete($tarea);

header("Location: ../../index.php");
exit();