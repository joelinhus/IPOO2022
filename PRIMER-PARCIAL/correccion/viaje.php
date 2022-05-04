<?php
class Viaje
{
    private $destino;
    private $horapartida;
    private $horallegada;
    private $numero;
    private $importe;
    private $fecha;
    private $asientostotales;
    private $asientosdisponibles;
    private $objResponsable;

    /*
     * Este metodo compara el numero de asientos ingresados por parametro a la cantidad de asientos disponibles en el viaje y devuelve true si
     * el parametro es menor o igual, caso contrario devuelve false
     * @param int cantAsientos
     * @return boolean retorno
     */
    public function asignarAsientosDisponibles($cantAsientos){
        $retorno = false;
        if($cantAsientos<=$this->getAsientosdisponibles()){
            $retorno = true;
            $this->setAsientosdisponibles($this->getAsientosdisponibles()-$cantAsientos);
        }
        return $retorno;
    }

    /* Este metodo devuelve un valor booleano dependiendo de si el viaje tiene asientos disponibles segun el numero ingresado
     * @param int cantAsientos
     * @return boolean retorno
    */
    public function tieneAsientosDisponibles($cantAsientos){
        $retorno = false;
        if($cantAsientos<=$this->getAsientosdisponibles()){
            $retorno = true;
        }
        return $retorno;
    }

    public function __toString(){
        $retorno = "\n||__VIAJE N° ".$this->getNumero()."__||\n||__DESTINO: ".$this->getDestino()."__||\n".
            "||__FECHA VIAJE: ".$this->getFecha()."__||\n".
            "||__PARTIDA:".$this->getHorapartida()."- LLEGADA:".$this->getHorallegada()."__||\n".
            "||__IMPORTE: ".$this->getImporte()."__||\n".
            "||__ASIENTOS TOTALES: ".$this->getAsientostotales()."__||\n||__ASIENTOS DISPONIBLES: ".$this->getAsientosdisponibles()."__||\n".
            "\n||__RESPONSABLE VIAJE__||".$this->getObjResponsable()
        ;
        return $retorno;
    }

    public function __construct($destino, $horapartida, $horallegada, $numero, $importe, $fecha, $asientostotales, $asientosdisponibles, $objResponsable)
    {
        $this->destino = $destino;
        $this->horapartida = $horapartida;
        $this->horallegada = $horallegada;
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->asientostotales = $asientostotales;
        $this->asientosdisponibles = $asientosdisponibles;
        $this->objResponsable = $objResponsable;
    }

    public function getDestino()
    {
        return $this->destino;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }

    public function getHorapartida()
    {
        return $this->horapartida;
    }
    public function setHorapartida($horapartida)
    {
        $this->horapartida = $horapartida;
    }

    public function getHorallegada()
    {
        return $this->horallegada;
    }
    public function setHorallegada($horallegada)
    {
        $this->horallegada = $horallegada;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getImporte()
    {
        return $this->importe;
    }
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getAsientostotales()
    {
        return $this->asientostotales;
    }
    public function setAsientostotales($asientostotales)
    {
        $this->asientostotales = $asientostotales;
    }

    public function getAsientosdisponibles()
    {
        return $this->asientosdisponibles;
    }
    public function setAsientosdisponibles($asientosdisponibles)
    {
        $this->asientosdisponibles = $asientosdisponibles;
    }

    public function getObjResponsable()
    {
        return $this->objResponsable;
    }
    public function setObjResponsable($objResponsable)
    {
        $this->objResponsable = $objResponsable;
    }


}