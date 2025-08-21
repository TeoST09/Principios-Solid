<?php
include_once("../../Config/db.php");
include_once("../Models/tareas.php");

$id = $_POST['id'] ?? 0;

$mysqli = new mysqli("localhost", "root", "", "SRP");


if ($id) {
    $tarea = new Tarea($id, null, null,  null);
    $delete = new eliminarTarea($mysqli);
    $delete->delete($tarea); 
}


header("Location: ../../index.php");
exit();