<?php 

/*

La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros 
del viaje. done

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de 
dicha clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente 
a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que 
permita cargar la información del viaje, modificar y ver sus datos.

*/

class Viaje{
    private $codigo_viaje;
    private $destino;
    private $max_pasajeros;
    private $pasajeros;

    public function __toString(){
        return "||___VIAJE {$this->getCodigoViaje()}___||\n||___DESTINO: {$this->getDestino()}___||\n||___MAXIMO DE PASAJEROS: {$this->getMaximoPasajeros()}___||\n{$this->mostrarPasajeros()} \n\n\n";
    }

    public function __construct($cv,$d,$mp,$p){
        $this->codigo_viaje = $cv;
        $this->destino = $d;
        $this->max_pasajeros = $mp;
        $this->pasajeros = $p;
    }

    public function getCodigoViaje(){
        return $this->codigo_viaje;
    }
    public function setCodigoViaje($cv){
        $this->codigo_viaje = $cv;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($d){
        $this->destino = $d;
    }

    public function getMaximoPasajeros(){
        return $this->max_pasajeros;
    }
    public function setMaximoPasajeros($mp){
        $this->max_pasajeros = $mp;
    }

    public function getPasajeros(){
        return $this->pasajeros;
    }
    public function setPasajeros($p){
        $this->pasajeros = $p;
    }

    /* Muestra los pasajeros en una tabla */
    public function mostrarPasajeros(){
        $retorno = "__________________________________________\n||___NOMBRE___||___APELLIDO___||___DNI___||\n";
        for($i=0;$i<count($this->pasajeros);$i++){
            $retorno .= "|| ".$this->pasajeros[$i]["nombre"]." || ".$this->pasajeros[$i]["apellido"]." || ".$this->pasajeros[$i]["dni"]."\n";
        }
        return $retorno;
    }

    /* Permite modificar los datos de un pasajero dentro de un viaje */
    public function modificarPasajero($dni,$nombre,$apellido){
        for($i=0;$i<count($this->pasajeros);$i++){
            if($this->pasajeros[$i]["dni"]==$dni){
                $this->pasajeros[$i]["nombre"]=$nombre;
                $this->pasajeros[$i]["apellido"]=$apellido;
            }
        }
    }
    /* Permite encontrar a un pasajero en el array buscando su DNI */
    public function encontrarPasajero($dni){
        $retorno = false;
        for($i=0;$i<count($this->pasajeros);$i++){
            if($this->pasajeros[$i]["dni"]==$dni){
                $retorno = true;
            }
        }
        return $retorno;
    }
    /* Permite agregar un pasajero con sus datos correspondientes al array */
    public function agregarPasajero($dni,$nombre,$apellido){
        $this->pasajeros[]=["nombre"=>$nombre,"apellido"=>$apellido,"dni"=>$dni];
    }
}







?>