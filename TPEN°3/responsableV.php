<?php
class ResponsableV
{
    private $nroEmpleado;
    private $nroLicencia;
    private $nombre;
    private $apellido;

    public function __construct($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $this->nroEmpleado = $nroEmpleado;
        $this->nroLicencia = $nroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function __toString(){
        $retorno =
            "||__".strtoupper($this->getApellido()).",".$this->getNombre()."__||\n".
            "||__NRO EMPLEADO: ".$this->getNroEmpleado()."__||\n".
            "||__NRO LICENCIA: ".$this->getNroLicencia()."__||\n";
        return $retorno;
    }

    public function getNroEmpleado()
    {
        return $this->nroEmpleado;
    }
    public function setNroEmpleado($nroEmpleado)
    {
        $this->nroEmpleado = $nroEmpleado;
    }

    public function getNroLicencia()
    {
        return $this->nroLicencia;
    }
    public function setNroLicencia($nroLicencia)
    {
        $this->nroLicencia = $nroLicencia;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

}