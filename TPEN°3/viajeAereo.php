<?php
    class ViajeAereo extends Viaje{
    private $nroVuelo;
    private $categoria;
    private $nombreAerolinea;
    private $cantEscalas;


    /*
     * Devuelve el importe del pasaje, aplicando aumentos donde sea necesario (segun la categoria del vuelo y la cantidad de escalas, si es ida y vuelta o no)
     * 
     * @return float $importe
     */
    public function darImportePasaje(){
        $retorno = $this->getImporte();
        if($this->getCategoria()=='PRIMERA' && $this->getCantEscalas()==0){
            $retorno += ($retorno*0.4);
        }else if($this->getCategoria()=='PRIMERA' && $this->getCantEscalas()>0){
            $retorno += ($retorno*0.6);
        }
        $retorno = $retorno + $this->sumarSiEsIdaYVuelta($retorno);
        return $retorno;
    }

    public function __toString(){
        $retorno = parent::__toString();
        $retorno .= "||__VIAJE AEREO__||\n".
        "||__AEROLINEA ".$this->getNombreAerolinea()."__||\n".     
        "||__NUMERO DE VUELO: ".$this->getNroVuelo()."__||\n".   
        "||__CATEGORIA: ".$this->getCategoria()."__||\n". 
        "||__CANTIDAD DE ESCALAS: ".$this->getCantEscalas()."__||\n"
        ;
        return $retorno;
    }
    
    public function __construct($codigo_viaje,$destino,$max_pasajeros,$pasajeros,$responsable,$importe,$esIdaYVuelta,$nroVuelo,$categoria,$nombreAerolinea,$cantEscalas){
        parent::__construct($codigo_viaje,$destino,$max_pasajeros,$pasajeros,$responsable,$importe,$esIdaYVuelta);
        $this->nroVuelo = $nroVuelo;
        $this->categoria = $categoria;
        $this->nombreAerolinea = $nombreAerolinea;
        $this->cantEscalas = $cantEscalas;

    }
    

    public function getNroVuelo()
    {
        return $this->nroVuelo;
    }
    public function setNroVuelo($nroVuelo)
    {
        $this->nroVuelo = $nroVuelo;
    }

    public function getCantEscalas()
    {
        return $this->cantEscalas;
    }
    public function setCantEscalas($cantEscalas)
    {
        $this->cantEscalas = $cantEscalas;
    }

    public function getNombreAerolinea()
    {
        return $this->nombreAerolinea;
    }
    public function setNombreAerolinea($nombreAerolinea)
    {
        $this->nombreAerolinea = $nombreAerolinea;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
}