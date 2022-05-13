<?php 
class Viaje{
    private $codigo_viaje;
    private $destino;
    private $max_pasajeros;
    private $pasajeros;
    private $responsable;
    private $importe;
    private $esIdaYVuelta;

    /*
     * Si el viaje tiene asientos disponibles agrega el pasajero a la coleccion y devuelve el importe del pasaje
     * 
     * @param Pasajero $pasajero
     * @return float $retorno
     */
    public function venderPasaje($pasajero){
        $retorno = -1;
        if($this->hayPasajesDisponibles()){
            $this->agregarPasajero($pasajero);
            $retorno = $this->darImportePasaje();
        }
        return $retorno;
    }

    /*
     * Devuelve el importe del pasaje
     * 
     * @return float $importe
     */
    public function darImportePasaje(){
        return $this->getImporte();
    }

    /*
     * Devuelve la cantidad que debe sumarse al importe si el viaje es de ida y vuelta
     * 
     * @return float $retorno 
     */
    public function sumarSiEsIdaYVuelta(){
        $retorno = 0;
        if($this->getEsIdaYVuelta()){
            $retorno = ($this->getImporte()*0.5); 
        }
        return $retorno;
    }

    /*
     * Devuelve true o false dependiendo si la cantidad de pasajeros actualmente en el viaje
     * 
     * @return boolean $retorno
     */
    public function hayPasajesDisponibles(){
        $retorno = false;
        if((count($this->getPasajeros())) < ($this->getMaximoPasajeros())){
            $retorno = true;
        }
        return $retorno;
    }
    
    /*
     * Devuelve una string con los __toString de los pasajeros concatenados
     *
     * @return String $retorno
     */
    public function mostrarPasajeros(){
        $retorno = "";
        foreach($this->getPasajeros() as $pasajero){
            $retorno .= "".$pasajero;
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
     * @param Pasajero $objPasajero
    */
    public function agregarPasajero($objPasajero){
        $this->pasajeros[] = $objPasajero;
    }
    /*
     * EN ESTE CASO UTILIZO $THIS->PASAJEROS[] PARA NO TENER QUE INICIALIZAR UN ARRAY CON EL GETPASAJEROS()
     * Y LUEGO CON SETPASAJEROS() SETEAR EL ARRAY INICIALIZADO CON EL NUEVO PASAJERO AGREGADO AL FINAL
     * SINO TERMINA SIENDO MAS ENGORROSO A LA HORA DE LEERLO 
     */


    public function __construct($codigo_viaje, $destino, $max_pasajeros, $pasajeros, $responsable,$importe,$esIdaYVuelta)
    {
        $this->codigo_viaje = $codigo_viaje;
        $this->destino = $destino;
        $this->max_pasajeros = $max_pasajeros;
        $this->pasajeros = $pasajeros;
        $this->responsable = $responsable;
        $this->importe = $importe;
        $this->esIdaYVuelta = $esIdaYVuelta;
    }

    public function __toString(){
        $retorno =
            "||___VIAJE {$this->getCodigoViaje()}___||\n".
            "||___DESTINO: {$this->getDestino()}___||\n".
            "||___MAXIMO DE PASAJEROS: {$this->getMaximoPasajeros()}___||\n".
            "||__IMPORTE: ".$this->getImporte()."__||\n".
            "||__ES IDA Y VUELTA?: ".($this->getEsIdaYVuelta() ? "SI" : "NO")."__||\n".
            "||_____________||\n||__PASAJEROS__||\n{$this->mostrarPasajeros()}".
            "||_____________________||\n||__RESPONSABLE VIAJE__||\n{$this->getResponsable()}".
            "||_____________________||\n"
            ;
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
    
    public function getEsIdaYVuelta()
    {
        return $this->esIdaYVuelta;
    }
    public function setEsIdaYVuelta($esIdaYVuelta)
    {
        $this->esIdaYVuelta = $esIdaYVuelta;
    }

    public function getImporte()
    {
        return $this->importe;
    }
    public function setImporte($importe)
    {
        $this->importe = $importe;
    }
    
}

?>