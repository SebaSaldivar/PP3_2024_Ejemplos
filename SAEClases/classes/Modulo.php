<?php
class Modulo {
    protected $codigo_modulo;
    protected $descripcion;

    public function __construct($codigo_modulo, $descripcion) {
        $this->codigo_modulo = $codigo_modulo;
        $this->descripcion = $descripcion;
    }

    // Getters
    public function getCodigoModulo() {
        return $this->codigo_modulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    // Setters
    public function setCodigoModulo($codigo_modulo) {
        $this->codigo_modulo = $codigo_modulo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>