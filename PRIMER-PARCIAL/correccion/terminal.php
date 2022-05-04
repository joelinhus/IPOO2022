<?php
class Terminal
{
    private $denominacion;
    private $direccion;
    private $empresas;


    /* Este metodo vende un viaje a un cliente si hay alguno que coincida con la fecha, el destino y ademas tenga asientos disponibles
     * @param int cantAsientos
     * @param String fecha
     * @param String destino
     * @param Empresa objEmpresa
     */
    public function ventaAutomatica($cantAsientos,$fecha,$destino,$objEmpresa){
        $retorno = false;
        $nombreEmpresa = $objEmpresa->getNombre();
        foreach($this->getEmpresas() as $empresa){
            if($empresa->getNombre()==$nombreEmpresa){
                $viajeRetorno = $empresa->venderViajeADestino($cantAsientos,$destino,$fecha);
                $retorno = $viajeRetorno==null ? false : true;
            }
        }
        return $retorno;
    }

    /* Este metodo devuelve el objeto de la persona responsable del viaje ingresado por parametro
     * @param int nroviaje
    */
    public function responsableViaje($nroviaje){
        $retorno = null;
        $i = 0;
        $done = false;
        do{
            foreach ($this->getEmpresas()[$i]->getViajes() as $viaje){
                if($viaje->getNumero()==$nroviaje){
                    $done = true;
                    $retorno = $viaje->getObjResponsable();
                }
            }
            $i++;
        }while($i<count($this->getEmpresas()) && $done != true);

        return $retorno;
    }

    public function empresaMayorRecaudacion(){
        $retorno = null;
        $mayor = -1;
        foreach($this->getEmpresas() as $empresa){
            if($empresa->montoRecaudado()>$mayor){
                $mayor = $empresa->montoRecaudado();
                $retorno = $empresa;
            }
        }
        return $retorno;
    }

    public function mostrarEmpresas(){
        $retorno = "";
        foreach($this->getEmpresas() as $empresa){
            $retorno .= $empresa."\n";
        }
        return $retorno;
    }

    public function __toString(){
        $retorno = "\n||__TERMINAL ".$this->getDenominacion()."__||\n".
            "||__DIRECCION ".$this->getDireccion()."__||\n".
            "\n||__EMPRESAS ASOCIADAS__||".$this->mostrarEmpresas();
        ;
        return $retorno;
    }

    public function __construct($denominacion, $direccion, $empresas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->empresas = $empresas;
    }

    public function getDenominacion()
    {
        return $this->denominacion;
    }
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getEmpresas()
    {
        return $this->empresas;
    }
    public function setEmpresas($empresas)
    {
        $this->empresas = $empresas;
    }


}