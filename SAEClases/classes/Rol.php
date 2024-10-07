<?php
class Rol {
    protected $codigo_rol;
    protected $descripcion;

    public function __construct($codigo_rol, $descripcion) {
        $this->codigo_rol = $codigo_rol;
        $this->descripcion = $descripcion;
    }

    // Getters
    public function getCodigoRol() {
        return $this->codigo_rol;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    // Setters
    public function setCodigoRol($codigo_rol) {
        $this->codigo_rol = $codigo_rol;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
}
?>