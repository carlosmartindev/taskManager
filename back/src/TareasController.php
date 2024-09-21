<?php
require_once 'Database.php';

class TareasController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function crearTarea($titulo, $descripcion) {
        $stmt = $this->db->prepare("INSERT INTO tareas (titulo, descripcion) VALUES (:titulo, :descripcion)");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        return $stmt->execute();
    }

    public function obtenerTareas() {
        $stmt = $this->db->prepare("SELECT * FROM tareas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarTarea($id, $titulo, $descripcion, $estado) {
        $stmt = $this->db->prepare("UPDATE tareas SET titulo = :titulo, descripcion = :descripcion, estado = :estado WHERE id = :id");
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function eliminarTarea($id) {
        error_log("Entra a eliminar tarea");
        $stmt = $this->db->prepare("DELETE FROM tareas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
