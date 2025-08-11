<?php
include_once("../../Config/db.php");

class construirTarea
{
    public $id;
    public $name;
    public $description;

    public function __construct($id = null, $name = null, $description = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }
}


class guardarTarea
{
    private $mysqli;
    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }
    public function save($tarea)
    {
        $stmt = $this->mysqli->prepare("INSERT INTO tareas (titulo, descripcion) VALUES (?, ?)");
        $stmt->bind_param("ss",$tarea->name, $tarea->description);
        $stmt->execute();
        $stmt->close();
    }
}

class eliminarTarea
{

    private $mysqli;


    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function delete($tarea){
        $stmt = $this->mysqli->prepare("DELETE FROM tareas WHERE id = ?");
        $stmt->bind_param("i", $tarea->id);
        $stmt->execute();
        $stmt->close();
        }
}

class editar 
{
    private $mysqli;
    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }
    public function edit($tarea)
    {
        $stmt = $this->mysqli->prepare("UPDATE tareas SET titulo = ?, descripcion = ? WHERE id = ?");
        $stmt->bind_param("ssi", $tarea->name, $tarea->description, $tarea->id);
        $stmt->execute();
        $stmt->close();
    }   

}

