<?php
class Materia {
    protected $codigo_materia;
    protected $nombre_materia;
    protected $id_carrera;

    public function __construct($codigo_materia, $nombre_materia, $id_carrera) {
        $this->codigo_materia = $codigo_materia;
        $this->nombre_materia = $nombre_materia;
        $this->id_carrera = $id_carrera;
    }

    // Getters
    public function getCodigoMateria() {
        return $this->codigo_materia;
    }

    public function getNombreMateria() {
        return $this->nombre_materia;
    }

    public function getIdCarrera() {
        return $this->id_carrera;
    }

    // Setters
    public function setCodigoMateria($codigo_materia) {
        $this->codigo_materia = $codigo_materia;
    }

    public function setNombreMateria($nombre_materia) {
        $this->nombre_materia = $nombre_materia;
    }

    public function setIdCarrera($id_carrera) {
        $this->id_carrera = $id_carrera;
    }
}
?>