<?php
class Viaje{
    private $destino;
    private $horapartida;
    private $horallegada;
    private $nroViaje;
    private $monto;
    private $fecha;
    private $asientosTotales;
    private $asientosDisponibles;
    private $objResponsable;

    public function calcularImporteViaje(){
        $asientosVendidos = $this->getAsientosTotales() - $this->getAsientosDisponibles();
        return ($this->getMonto() + ($this->getMonto()*($asientosVendidos/$this->getAsientosTotales())));
    }

    public function __toString(){
        return "||__VIAJE {$this->getNroViaje()}__||\n".
        "||__PARTIDA: {$this->getHoraPartida()}__||__LLEGADA: {$this->getHoraLlegada()}__||\n".
        "||__MONTO: {$this->getMonto()}__||\n||__FECHA: {$this->getFecha()}__||\n".
        "||__ASIENTOS__||\n".
        "||__DISPONIBLES: {$this->getAsientosDisponibles()}__||__TOTALES: {$this->getAsientosTotales()}__||\n".
        "||\n".$this->getObjResponsable()
        ;
    }

    public function __construct($d,$hp,$hl,$nv,$m,$f,$at,$ad,$resp){
        $this->destino = $d;
        $this->horapartida = $hp;
        $this->horallegada = $hl;
        $this->nroViaje = $nv;
        $this->monto = $m;
        $this->fecha = $f;
        $this->asientosTotales = $at;
        $this->asientosDisponibles = $ad;
        $this->objResponsable = $resp;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    
    public function getHoraPartida(){
        return $this->horapartida;
    }
    public function setHoraPartida($horapartida){
        $this->horapartida = $horapartida;
    }
    
    public function getHoraLlegada(){
        return $this->horallegada;
    }
    public function setHoraLlegada($horallegada){
        $this->horallegada = $horallegada;
    }
    
    public function getNroViaje(){
        return $this->nroViaje;
    }
    public function setNroViaje($nroViaje){
        $this->nroViaje = $nroViaje;
    }
    
    public function getMonto(){
        return $this->monto;
    }
    public function setMonto($monto){
        $this->monto = $monto;
    }
    
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function getAsientosTotales(){
        return $this->asientosTotales;
    }
    public function setAsientosTotales($asientosTotales){
        $this->asientosTotales = $asientosTotales;
    }
    
    public function getAsientosDisponibles(){
        return $this->asientosDisponibles;
    }
    public function setAsientosDisponibles($asientosDisponibles){
        $this->asientosDisponibles = $asientosDisponibles;
    }
    
    public function getObjResponsable(){
        return $this->objResponsable;
    }
    public function setObjReponsable($resp){
        $this->objResponsable = $resp;
    }
    
}    