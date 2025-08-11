<?php
include_once("../../Config/db.php");
include_once("../Models/tareas.php");

$id = $_POST['id'] ?? 0;
$name = $_POST['titulo'] ??'Sin título';
$descripcion = $_POST['descripcion'] ??'Sin descripción';

$mysqli = new mysqli("localhost", "root", "", "SRP");

$tarea = new construirTarea($id, $name , $descripcion);
$repo = new editar($mysqli);
$repo->edit($tarea);

header("Location: ../../index.php");
exit();