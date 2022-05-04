<?php
class Terminal
{
    private $denominacion;
    private $direccion;
    private $empresas;


    /*
     * Implementar el método ventaAutomatica($cantAsientos, $fecha, $destino, $empresa) que recibe por
       parámetro la cantidad de asientos que se requieren, una fecha, un destino y la empresa con la que se
       desea viajar. Automáticamente se registra la venta del viaje. (Para la implementación de este método
       debe utilizarse uno de los métodos implementados en la clase Viaje)
     */
    public function ventaAutomatica($cantAsientos,$fecha,$destino,$nombreEmpresa){
        $retorno = false;
        foreach($this->getEmpresas() as $empresa){
            if($empresa->getNombre()==$nombreEmpresa){
                $viajeRetorno = $empresa->venderViajeADestino($cantAsientos,$destino,$fecha);
                $retorno = $viajeRetorno==null ? false : true;
            }
        }
        return $retorno;
    }

/*

*/

    public function responsableViaje($nroviaje){
        $retorno = null;
        foreach ($this->getEmpresas() as $empresa){
            foreach ($empresa->getViajes() as $viaje){
                if($viaje->getNumero()==$nroviaje){
                    $retorno = $viaje->getObjResponsable();
                }
            }
        }
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