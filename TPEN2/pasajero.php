<?php
/*
* Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre,
* apellido, numero de documento y teléfono.
 */
class Pasajero
{
    private $nombre;
    private $apellido;
    private $dni;
    private $telefono;

    public function __construct($nombre, $apellido, $dni, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
        $this->telefono = $telefono;
    }

    public function __toString(){
        $retorno= "\n||__".strtoupper($this->getApellido()).",".$this->getNombre()."__||\n".
            "||__DNI: ".$this->getDni()."__||\n".
            "||__TELEFONO: ".$this->getTelefono()."__||\n";
        return $retorno;
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

    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

}