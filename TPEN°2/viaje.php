<?php 

/*

* La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
* De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros 
* del viaje. done
 *
* Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de 
* dicha clase (incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente 
* a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
 *
* Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que 
* permita cargar la información del viaje, modificar y ver sus datos.
 *
 *
* Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre,
* apellido, numero de documento y teléfono. DONE
* El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. DONE
* También se desea guardar la información de la persona responsable de realizar el viaje,
* para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y apellido. DONE
* La clase Viaje debe hacer referencia al responsable de realizar el viaje. DONE
* Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. DONE
 *
* Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de
* los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma
* cargue la información del responsable del viaje. DONE
*/

class Viaje{
    private $codigo_viaje;
    private $destino;
    private $max_pasajeros;
    private $pasajeros;
    private $responsable;

    public function __construct($codigo_viaje, $destino, $max_pasajeros, $pasajeros, $responsable)
    {
        $this->codigo_viaje = $codigo_viaje;
        $this->destino = $destino;
        $this->max_pasajeros = $max_pasajeros;
        $this->pasajeros = $pasajeros;
        $this->responsable = $responsable;
    }

    public function __toString(){
        $retorno =
            "\n||___VIAJE {$this->getCodigoViaje()}___||\n".
            "||___DESTINO: {$this->getDestino()}___||\n".
            "||___MAXIMO DE PASAJEROS: {$this->getMaximoPasajeros()}___||\n\n".
            "||__PASAJEROS__||{$this->mostrarPasajeros()}\n".
            "||__RESPONSABLE VIAJE__||{$this->getResponsable()}";
        return $retorno;
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

    public function getResponsable()
    {
        return $this->responsable;
    }
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }


    /*
     * Devuelve una string con los __toString de los pasajeros concatenados
     *
     * @return String $retorno
     */
    public function mostrarPasajeros(){
        $retorno = "";
        foreach($this->getPasajeros() as $pasajero){
            $retorno .= $pasajero;
        }
        return $retorno;
    }

    /*
     * Permite modificar los datos de un pasajero dentro de un viaje
     *
     * @param int $dni
     * @param String $nombre
     * @param string $apellido
     * @param int $telefono
    */
    public function modificarPasajero($dni,$nombre,$apellido,$telefono){
        $i=0;
        do{
            $done = false;
            if($this->getPasajeros()[$i]->getDni()==$dni){
                $this->getPasajeros()[$i]->setNombre($nombre);
                $this->getPasajeros()[$i]->setApellido($apellido);
                $this->getPasajeros()[$i]->setTelefono($telefono);
                $done = true;
            }
            $i++;
        }while($done!=true);
    }

    /*
     * Permite encontrar a un pasajero en el array buscando su DNI
     *
     * @param int $dni
     * @return boolean $retorno
    */
    public function encontrarPasajero($dni){
        $retorno = false;
        foreach($this->getPasajeros() as $pasajero){
            if($pasajero->getDni()==$dni){
                $retorno = true;
            }
        }
        return $retorno;
    }

    /*
     * Permite agregar un pasajero con sus datos correspondientes al array
     *
     * @param int $dni
     * @param String $nombre
     * @param string $apellido
     * @param int $telefono
    */
    public function agregarPasajero($dni,$nombre,$apellido,$telefono){
        $this->pasajeros[] = new Pasajero($nombre,$apellido,$dni,$telefono);
    }
    /* EN ESTE CASO UTILIZO $THIS->PASAJEROS[] PARA NO TENER QUE INICIALIZAR UN ARRAY CON EL GETPASAJEROS()
     * Y LUEGO CON SETPASAJEROS() SETEAR EL ARRAY INICIALIZADO CON EL NUEVO PASAJERO AGREGADO AL FINAL
     * SINO TERMINA SIENDO MAS ENGORROSO A LA HORA DE LEERLO */

}

?>