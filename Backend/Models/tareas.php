<?php
include_once("../../Config/db.php");

interface GuardarTareaInterface {
    public function save(Tarea $tarea);
}

interface EliminarTareaInterface {
    public function delete(Tarea $tarea);
}

interface EditarTareaInterface {
    public function edit(Tarea $tarea);
}


class Tarea {
    public $id;
    public $name;
    public $description;
    
    public $tipo;
    public $fechaLimite;

    public function __construct($id = null, $name = null, $description = null, $tipo, $fechaLimite = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->tipo = $tipo;
        $this->fechaLimite = $fechaLimite;
    }
}

class GuardarTarea implements GuardarTareaInterface{
    protected $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function save(Tarea $tarea) {
        $stmt = $this->mysqli->prepare("INSERT INTO tareas (titulo, descripcion, tipo, fechaLimite) VALUES (?, ?, 'normal', ?)");
        $stmt->bind_param("sss", $tarea->name, $tarea->description, $tarea->fechaLimite);
        $stmt->execute();
        $stmt->close();
    }
}

class TareaUrgente extends GuardarTarea {

    public function save(Tarea $tarea) {
        $stmt = $this->mysqli->prepare(
            "INSERT INTO tareas (titulo, descripcion, tipo, fechaLimite) VALUES (?, ?, 'urgente', ?)"
        );
        $stmt->bind_param("sss", $tarea->name, $tarea->description, $tarea->fechaLimite);
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
class Editar implements EditarTareaInterface
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function edit($tarea)
    {
        $stmt = $this->mysqli->prepare("UPDATE tareas SET titulo = ?, descripcion = ?, tipo = ?, fechaLimite = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $tarea->name, $tarea->description, $tarea->tipo, $tarea->fechaLimite, $tarea->id);
        $stmt->execute();
        $stmt->close();
    }   
}

