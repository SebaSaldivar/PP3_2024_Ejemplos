<?php
require_once 'Persona.php'; 
class Usuario extends Persona {
    private $codigo_usuario;
    private $email;
    private $password;

    // Constructor
    public function __construct($codigo_usuario, $dni_persona, $nombre_persona, $apellido_persona, $cargo_persona, $email, $password) {
        parent::__construct($dni_persona, $nombre_persona, $apellido_persona, $cargo_persona); // Llamar al constructor de Persona
        $this->codigo_usuario = $codigo_usuario;
        $this->email = $email;
        $this->password = $password;
    }

    // Getters
    public function getCodigoUsuario() {
        return $this->codigo_usuario;
    }

    public function getDni() {
        return parent::getDni(); // Llamar al getter de la clase Persona
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    // Método para verificar la contraseña
    public function verificarPassword($passwordIngresada) {
        return password_verify($passwordIngresada, $this->password);
    }
}


?>
