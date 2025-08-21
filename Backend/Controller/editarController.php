<?php
include_once("../../Config/db.php");
include_once("../Models/tareas.php");

$id = $_POST['id'] ?? 0;
$name = $_POST['titulo'] ??'Sin título';
$descripcion = $_POST['descripcion'] ??'Sin descripción';
$tipo = $_POST['tipo'] ?? 'normal';
$fechaLimite = $_POST['fecha_limite'] ?? null;

$tarea = new Tarea($id, $name , $descripcion, $tipo, $fechaLimite);
$mysqli = new mysqli("localhost", "root", "", "SRP");
$repo = new Editar($mysqli);
$repo->edit($tarea);



header("Location: ../../index.php");
exit();