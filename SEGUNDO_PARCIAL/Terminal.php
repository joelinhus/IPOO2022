<?php
class Terminal{
    private $denominacion;
    private $direccion;
    private $empresas;

    public function darViajeMenorValor(){
        $retorno = [];
        for($i=0;$i<count($this->getEmpresas());$i++){
            $viajesEmpresa = $this->getEmpresas()[$i]->getViajes();
            $menor = 10000000;
            foreach($viajesEmpresa as $viaje){
                $importe = $viaje->calcularImporteViaje();
                if($menor > $importe){
                    $menor = $importe;
                    $retorno[$i] = $viaje;
                }
            }
        }
        return $retorno;
    }

    public function mostrarEmpresas(){
        $retorno = "";
        foreach($this->getEmpresas() as $e){
            $retorno .= "||\n".$e."\n";
        }
        return $retorno;
    }

    public function __toString(){
        return "||__TERMINAL: '{$this->getDenominacion()}'__||\n".
        "||__DIRECCION: {$this->getDireccion()}__||\n".
        "||__EMPRESAS ASOCIADAS__||".$this->mostrarEmpresas();
    }

    public function __construct($d,$dir,$emp){
        $this->denominacion = $d;
        $this->direccion = $dir;
        $this->empresas = $emp;
    }

    public function getDenominacion(){
        return $this->denominacion;
    }
    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getEmpresas(){
        return $this->empresas;
    }
    public function setEmpresas($empresas){
        $this->empresas = $empresas;
    }


}