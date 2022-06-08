<?php
class Empresa{
    private $identificacion;
    private $nombre;
    private $viajes;

    public function darCostoViaje($nroViaje){
        $retorno = null;
        $viaje = $this->buscarViaje($nroViaje);
        if($viaje!=null){
            $retorno = $viaje->calcularImporteViaje();
        }
        return $retorno;
    }

    public function buscarViaje($nroViaje){
        $done = false;
        $i = 0;
        $retorno = null;
        do{
            $viaje = $this->getViajes()[$i];
            if($viaje->getNroViaje()==$nroViaje){
                $retorno = $viaje;
                $done=true;
            }
            $i++;
        }while($i<count($this->getViajes()) && $done!=true);
        return $retorno;
    }

    public function mostrarViajes(){
        $retorno = "";
        foreach($this->getViajes() as $v){
            $retorno .= "\n||\n".$v;
        }
        return $retorno;
    }

    public function __toString(){
        return "||__{$this->getNombre()}__||\n".
        "||__IDENTIFICACION: \'{$this->getIdentificacion()}\'__||\n".
        "||__VIAJES REALIZADOS__||".$this->mostrarViajes()
        ;
    }

    public function __construct($id,$n,$v){
        $this->identificacion = $id;
        $this->nombre = $n;
        $this->viajes = $v;
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion){
        $this->identificacion = $identificacion;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getViajes(){
        return $this->viajes;
    }
    public function set($viajes){
        $this->viajes = $viajes;
    }

}