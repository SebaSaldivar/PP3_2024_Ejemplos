<?php
class Persona {
    protected $dni_persona;
    protected $nombre_persona;
    protected $apellido_persona;
    protected $cargo_persona;

    // Constructor
    public function __construct($dni_persona, $nombre_persona, $apellido_persona, $cargo_persona) {
        $this->dni_persona = $dni_persona;
        $this->nombre_persona = $nombre_persona;
        $this->apellido_persona = $apellido_persona;
        $this->cargo_persona = $cargo_persona;
    }

    // Getters
    public function getDni() {
        return $this->dni_persona;
    }

    public function getNombre() {
        return $this->nombre_persona;
    }

    public function getApellido() {
        return $this->apellido_persona;
    }

    public function getCargo() {
        return $this->cargo_persona;
    }
}

?>
