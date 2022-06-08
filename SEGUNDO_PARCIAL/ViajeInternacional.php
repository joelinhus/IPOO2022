<?php
class ViajeInternacional extends Viaje{
    private $docAdicional;
    private $impuesto;

    public function calcularImporteViaje(){
        $retorno = parent::calcularImporteViaje();
        $retorno *= 1+($this->getImpuesto()/100);
        return $retorno;
    }

    public function __toString(){
        return parent::__toString()."\n||\n||__VIAJE INTERNACIONAL__||\n".
        "||__¿REQUIERE DOCUMENTACION ADICIONAL?: ".($this->getDocAdicional()==true ? "SI" : "NO")."__||\n".
        "||__IMPUESTO A APLICAR: {$this->getImpuesto()}%__||"
        ;
    }
    
    public function __construct($d,$hp,$hl,$nv,$m,$f,$at,$ad,$resp,$da){
        parent::__construct($d,$hp,$hl,$nv,$m,$f,$at,$ad,$resp);
        $this->docAdicional=$da;
        $this->impuesto = 45; 
    }

    public function getDocAdicional(){
        return $this->docAdicional;
    }
    public function setDocAdicional($docAdicional){
        $this->docAdicional = $docAdicional;
    }

    public function getImpuesto(){
        return $this->impuesto;
    }
    public function setImpuesto($impuesto){
        $this->impuesto = $impuesto;
    }
}