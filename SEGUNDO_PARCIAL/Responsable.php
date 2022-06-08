<?php
class Responsable{
    private $nombre;
    private $apellido;
    private $nroDoc;
    private $direccion;
    private $mail;
    private $telefono;
    
    public function __construct($n,$a,$nd,$d,$m,$t){
        $this->nombre = $n;
        $this->apellido = $a;
        $this->nroDoc = $nd;
        $this->direccion = $d;
        $this->mail = $m;
        $this->telefono = $t;
    }

    public function __toString(){
        return "||__RESPONSABLE VIAJE__||\n".
        "||__".strtoupper($this->getApellido()).",".$this->getNombre()."__||\n".
        "||__NRO DOC: {$this->getNroDoc()}__||\n||__DIRECCION: {$this->getDireccion()}__||\n".
        "||__E-MAIL: {$this->getMail()}__||\n||__TELEFONO: {$this->getTelefono()}__||"
        ;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    
    public function getNroDoc(){
        return $this->nroDoc;
    }
    public function setNroDoc($nroDoc){
        $this->nroDoc = $nroDoc;
    }
    
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    
    public function getMail(){
        return $this->mail;
    }
    public function setMail($mail){
        $this->mail = $mail;
    }
    
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    
}