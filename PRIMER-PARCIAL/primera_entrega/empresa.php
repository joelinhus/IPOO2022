<?php
class Empresa
{
    private $identificacion;
    private $nombre;
    private $viajes;

    /* Este metodo devuelve el total de dinero recaudado entre los viajes que ha realizado la empresa
     * Saca los asientos vendidos x viaje restandole los asientos disponibles al total de asientos
     * y luego multiplicando ese numero por el importe individual de cada viaje
     * @return int totalRecaudado
     */
    public function montoRecaudado(){
        $totalrecaudado = 0;
        foreach($this->getViajes() as $viaje){
            $asientosVendidosViaje = $viaje->getAsientostotales() - $viaje->getAsientosdisponibles();
            $totalrecaudado += $asientosVendidosViaje * $viaje->getImporte();
        }
        return $totalrecaudado;
    }

    /* En este metodo se devuelve el primer viaje encontrado en la coleccion que tenga asientos disponibles, que vaya al destino
     * y que coincida con la fecha ingresados por parametro
     * @param int cantAsientos
     * @param String destino
     * @param String fecha
     * @return mixed retorno
    */
    public function venderViajeADestino($cantAsientos,$destino,$fecha){
        /*
         * AÑADÍ UN PARAMETRO $fecha PARA PODER LLAMAR ESTA FUNCION DIRECTAMENTE DESDE terminal->ventaAutomatica()
         */
        $retorno = null;
        $i = 0;
        $done = false;

        do{
            $viaje = $this->getViajes()[$i];
            if($viaje->getDestino()==$destino){
                if($viaje->getFecha() == $fecha){
                    if($viaje->asignarAsientosDisponibles($cantAsientos)){
                        $done = true;
                        $retorno = $viaje;
                    }
                }
            }
            $i++;
        }while($i<count($this->getViajes()) && $done != true);

        return $retorno;
    }


    /* Este metodo verifica si el objeto Viaje pasado por parametro tiene conflictos de: Destino, fecha u hora con alguno de los ya presentes en la empresa
     * Devuelve false si se encontro un viaje que tenga los mismos datos y true si se pudo incorporar correctamente, ademas de agregar el viaje ingresado
     * a la coleccion
     * @param Viaje viajeIngresado
     * @return boolean retorno
     */
    public function incorporarViaje($viajeIngresado){
        $retorno = false;
        $i = 0;
        $done = false;
        if(count($this->getViajes())==0){
            $this->viajes[] = $viajeIngresado;
        }else{
            do{
                $viaje = $this->getViajes()[$i];
                if($viaje->getDestino()==$viajeIngresado->getDestino() && $viaje->getFecha()==$viajeIngresado->getFecha() && $viaje->getHorapartida()==$viajeIngresado->getHorapartida()){
                    $done = true;
                }
                $i++;
            }while($i<count($this->getViajes()) && $done != true);

            $retorno = !$done;
            if($retorno) $this->viajes[] = $viajeIngresado;
        }

        return $retorno;
    }

    /*
     * Este metodo busca en la coleccion de viajes los que concidan con el destino ingresado por parametro y que tengan suficientes asientos disponibles
     * @param String destino
     * @param int asientosAsignar
     * @return Array retorno
     */
    public function darViajeADestino($destino,$asientosAsignar){
        $retorno = [];

        foreach($this->getViajes() as $viaje){
            if($viaje->getDestino()==$destino){
                if($viaje->asignarAsientosDisponibles($asientosAsignar)){
                    $retorno[] = $viaje;
                }
            }
        }

        return $retorno;
    }

    /* Este metodo retorna los viajes de la empresa concatenados a una string
     * @return String retorno
     */
    public function mostrarViajes(){
        $retorno = "";
        foreach($this->getViajes() as $viaje){
            $retorno .= $viaje."\n";
        }
        return $retorno;
    }

    public function __toString(){
        $retorno = "\n||__".$this->getNombre()."__||\n".
            "||__IDENTIFICACION:  ".$this->getIdentificacion()."__||\n".
            "\n||__VIAJES EMPRESA__||".$this->mostrarViajes();
        ;
        return $retorno;
    }

    public function __construct($identificacion, $nombre, $viajes)
    {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->viajes = $viajes;
    }

    public function getIdentificacion()
    {
        return $this->identificacion;
    }
    public function setIdentificacion($identificacion)
    {
        $this->identificacion = $identificacion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getViajes()
    {
        return $this->viajes;
    }
    public function setViajes($viajes)
    {
        $this->viajes = $viajes;
    }


}