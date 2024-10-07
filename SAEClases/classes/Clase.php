<?php
class Clase {
    protected $id_clase;
    protected $codigo_usuario;
    protected $codigo_materia;
    protected $fecha;
    protected $hora;
    protected $temas;
    protected $novedades;
    protected $comision;
    protected $aula;
    protected $archivos;

    public function __construct($id_clase, $codigo_usuario, $codigo_materia, $fecha, $hora, $temas, $novedades, $comision, $aula, $archivos) {
        $this->id_clase = $id_clase;
        $this->codigo_usuario = $codigo_usuario;
        $this->codigo_materia = $codigo_materia;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->temas = $temas;
        $this->novedades = $novedades;
        $this->comision = $comision;
        $this->aula = $aula;
        $this->archivos = $archivos;
    }

    // Getters
    public function getIdClase() {
        return $this->id_clase;
    }

    public function getCodigoUsuario() {
        return $this->codigo_usuario;
    }

    public function getCodigoMateria() {
        return $this->codigo_materia;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getTemas() {
        return $this->temas;
    }

    public function getNovedades() {
        return $this->novedades;
    }

    public function getComision() {
        return $this->comision;
    }

    public function getAula() {
        return $this->aula;
    }

    public function getArchivos() {
        return $this->archivos;
    }

    // Setters
    public function setIdClase($id_clase) {
        $this->id_clase = $id_clase;
    }

    public function setCodigoUsuario($codigo_usuario) {
        $this->codigo_usuario = $codigo_usuario;
    }

    public function setCodigoMateria($codigo_materia) {
        $this->codigo_materia = $codigo_materia;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setTemas($temas) {
        $this->temas = $temas;
    }

    public function setNovedades($novedades) {
        $this->novedades = $novedades;
    }

    public function setComision($comision) {
        $this->comision = $comision;
    }

    public function setAula($aula) {
        $this->aula = $aula;
    }

    public function setArchivos($archivos) {
        $this->archivos = $archivos;
    }
}
?>