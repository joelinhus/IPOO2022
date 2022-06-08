<?php
class ViajeNacional extends Viaje{
    private $descuento;

    public function calcularImporteViaje(){
        $retorno = parent::calcularImporteViaje();
        $retorno -= ($retorno*($this->getDescuento()/100));
        return $retorno;
    }

    public function __toString(){
        return parent::__toString()."\n||\n||__VIAJE NACIONAL__||\n||__DESCUENTO APLICADO: {$this->getDescuento()}%__||";
    }

    public function __construct($d,$hp,$hl,$nv,$m,$f,$at,$ad,$resp,$desc){
        parent::__construct($d,$hp,$hl,$nv,$m,$f,$at,$ad,$resp);
        $this->descuento = $desc;
    }

    public function getDescuento(){
        return $this->descuento;
    }
    public function setDescuento($descuento){
        $this->descuento = $descuento;
    }
}