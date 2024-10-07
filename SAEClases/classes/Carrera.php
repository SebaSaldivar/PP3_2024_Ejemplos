<?php
class Carrera {
    protected $id_carrera;
    protected $titulo_abreviado;
    protected $descripcion;
    
    public function __construct($id_carrera, $titulo_abreviado, $descripcion) {
        $this->id_carrera = $id_carrera;
        $this->titulo_abreviado = $titulo_abreviado;
        $this->descripcion = $descripcion;
    }

    // Getters
    public function getIdCarrera() {
        return $this->id_carrera;
    }

    public function getTituloAbreviado() {
        return $this->titulo_abreviado;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    // Setters
    public function setIdCarrera($id_carrera) {
        $this->id_carrera = $id_carrera;
    }

    public function setTituloAbreviado($titulo_abreviado) {
        $this->titulo_abreviado = $titulo_abreviado;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>