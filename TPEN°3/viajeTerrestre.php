<?php 
class ViajeTerrestre extends Viaje{
    private $tipoAsiento;

    /*
     * Devuelve el importe del pasaje, aplicando aumentos donde sea necesario (segun el tipo de asiento, si es ida y vuelta o no)
     * 
     * @return float $importe
     */
    public function darImportePasaje(){
      $retorno = $this->getImporte();
        if($this->getTipoAsiento()=='CAMA'){
            $retorno += $retorno*0.25;
        }
        $retorno = $retorno + $this->sumarSiEsIdaYVuelta($retorno);
        return $retorno;
    }

    public function __toString(){
      $retorno = parent::__toString();
      $retorno .= "||__VIAJE TERRESTRE__||\n"."||__TIPO ASIENTO: ".$this->getTipoAsiento()."__||\n";
      return $retorno;
    }

    public function __construct($codigo_viaje,$destino,$max_pasajeros,$pasajeros,$responsable,$importe,$esIdaYVuelta,$tipoAsiento)
    {
      parent::__construct($codigo_viaje,$destino,$max_pasajeros,$pasajeros,$responsable,$importe,$esIdaYVuelta);
      $this->tipoAsiento = $tipoAsiento;
    }

    public function getTipoAsiento(){
      return $this->tipoAsiento;
    }
    public function setTipoAsiento($tipoAsiento){
      $this->tipoAsiento = $tipoAsiento;
    }
}