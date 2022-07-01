<?php
include_once 'BaseDatos.php';
class Viaje
{
    private $idviaje;
    private $vdestino;
    private $vcantmaxpasajeros;
    private $objEmpresa;
    private $objResponsable;
    private $vimporte;
    private $tipoAsiento;
    private $idayvuelta;
    private $coleccionpasajeros;
    private $mensajeoperacion;

    /**
     * Este método devuelve el mayor valor alcanzado por el campo AUTO_INCREMENT (idviajes) de la tabla viajes
     *
     * @return null|array
     */
    public function devolverIdInsercion(){
        $base = new BaseDatos();
        $resp = null;
        $consulta = "SELECT `AUTO_INCREMENT`
                    FROM  INFORMATION_SCHEMA.TABLES
                    WHERE TABLE_SCHEMA = 'bdviajes'
                    AND   TABLE_NAME   = 'viaje';";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                if($row2=$base->Registro()){
                    $resp = $row2['AUTO_INCREMENT'];
                }
            }   else {
                $this->setMensajeOperacion($base->getError());
            }
        }   else{
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Devuelve un array con todos los pasajeros asociados a este viaje en la base de datos
     *
     * @return null|Array
     * */
    public function listarPasajeros(){
        $arreglo = null;
        $base = new BaseDatos();

        $consulta = "SELECT * FROM pasajero WHERE idviaje=".$this->getIdViaje();

        $consulta .= " ORDER BY papellido";

        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $arreglo = array();
                while($row2=$base->Registro()){
                    $rdocumento = $row2['rdocumento'];
                    $pnombre = $row2['pnombre'];
                    $papellido = $row2['papellido'];
                    $ptelefono = $row2['ptelefono'];

                    $pasajero = new Pasajero($rdocumento,$pnombre,$papellido,$ptelefono,$this);
                    $arreglo[] = $pasajero;
                }
            }	else{
                $this->setmensajeoperacion($base->getError());
            }
        }	else{
            $this->setmensajeoperacion($base->getError());
        }
        return $arreglo;
    }


    /**
     * Este método devuelve un booleano si se encontró el viaje correspondiente a el id viaje pasado por parametro
     * También actualiza los datos del $this para que sean equivalentes a los del viaje encontrado
     *
     * @param int $idViaje
     * @return bool
     */
    public function Buscar($idViaje){
        $base = new BaseDatos();
        $consulta = "SELECT * FROM viaje WHERE idviaje='".$idViaje."'";
        $resp = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                if($row2=$base->Registro()){
                    $this->setIdViaje($idViaje);
                    $this->setVDestino($row2['vdestino']);
                    $this->setVCantMaxPasajeros($row2['vcantmaxpasajeros']);

                    $ne = new Empresa();
                    $ne->Buscar($row2['idempresa']);
                    $this->setObjEmpresa($ne);

                    $nr = new Responsable();
                    $nr->Buscar($row2['rnumeroempleado']);
                    $this->setObjResponsable($nr);

                    $this->setColeccionPasajeros($this->listarPasajeros());

                    $this->setVImporte($row2['vimporte']);
                    $this->setTipoAsiento($row2['tipoAsiento']);
                    $this->setIdaYVuelta($row2['idayvuelta']);
                    $resp = true;
                }   else{
                    $this->setMensajeOperacion($base->getError());
                }
            }   else{
                $this->setMensajeOperacion($base->getError());
            }
        }   else{
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Este método devuelve un booleano si se encontró el viaje correspondiente a el destino pasado por parametro
     * También actualiza los datos del $this para que sean equivalentes a los del viaje encontrado
     *
     * @param int $vdestino
     * @return bool
     */
    public function BuscarXDestino($vdestino){
        $base = new BaseDatos();
        $consulta = "SELECT * FROM viaje WHERE vdestino='".$vdestino."'";
        $resp = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                if($row2=$base->Registro()){
                    $this->setIdViaje($row2['idviaje']);
                    $this->setVDestino($vdestino);
                    $this->setVCantMaxPasajeros($row2['vcantmaxpasajeros']);

                    $ne = new Empresa();
                    $ne->Buscar($row2['idempresa']);
                    $this->setObjEmpresa($ne);

                    $nr = new Responsable();
                    $nr->Buscar($row2['rnumeroempleado']);
                    $this->setObjResponsable($nr);

                    $this->setVImporte($row2['vimporte']);
                    $this->setTipoAsiento($row2['tipoAsiento']);
                    $this->setIdaYVuelta($row2['idayvuelta']);
                    $this->setColeccionPasajeros($this->listarPasajeros());
                    $resp = true;
                }
            }   else{
                $this->setMensajeOperacion($base->getError());
            }
        }   else{
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Este metodo retorna todas las filas de la tabla viaje en un array, si hay algun error en la consulta retorna null
     *
     * @return null|array
     */
    public function Listar(){
        $arreglo = null;
        $base = new BaseDatos();

        $consulta = "SELECT * FROM viaje";


        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $arreglo = array();
                while($row2=$base->Registro()){
                    $idviaje = $row2['idviaje'];
                    $vdestino = $row2['vdestino'];
                    $vcantmaxpasajeros = $row2['vcantmaxpasajeros'];

                    $ne = new Empresa();
                    $ne->Buscar($row2['idempresa']);

                    $nr = new Responsable();
                    $nr->Buscar($row2['rnumeroempleado']);

                    $vimporte = $row2['vimporte'];
                    $tipoAsiento = $row2['tipoAsiento'];
                    $idayvuelta = $row2['idayvuelta'];

                    $class = new Viaje($idviaje, $vdestino, $vcantmaxpasajeros, $ne, $nr, $vimporte, $tipoAsiento, $idayvuelta);

                    $class->setColeccionPasajeros($class->listarPasajeros());
                    $arreglo[] = $class;
                }
            }	else{
                $this->setmensajeoperacion($base->getError());
            }
        }	else{
            $this->setmensajeoperacion($base->getError());

        }
        return $arreglo;
    }

    /**
     * Este metodo inserta una fila en la base de datos con los valores actuales del $this
     * Retorna true si la operacion se realizó exitosamente, y false si no
     * @return bool
     */
    public function Insertar(){
        $base = new BaseDatos();
        $resp = false;
        $consulta = "INSERT INTO viaje(vdestino,vcantmaxpasajeros,idempresa,rnumeroempleado,vimporte,tipoAsiento,idayvuelta)
        VALUES ('".strtolower($this->getVDestino())."',{$this->getVCantMaxPasajeros()},{$this->getObjEmpresa()->getIdEmpresa()},{$this->getObjResponsable()->getRNumeroEmpleado()},{$this->getVImporte()},'{$this->getTipoAsiento()}','{$this->getIdaYVuelta()}')";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $resp = true;
            }	else{
                $this->setmensajeoperacion($base->getError());
            }
        } else{
            $this->setmensajeoperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Este metodo modifica una fila de la base de datos con los valores actuales del $this
     * Retorna true si la operacion se realizó exitosamente, y false si no
     *
     * @return bool
     */
    public function Modificar(){
        $resp = false;
        $base = new BaseDatos();
        $consulta = "UPDATE viaje SET vdestino='{$this->getVDestino()}', 
        vcantmaxpasajeros={$this->getVCantMaxPasajeros()}, idempresa={$this->getObjEmpresa()->getIdEmpresa()}, 
        rnumeroempleado={$this->getObjResponsable()->getRNumeroEmpleado()}, vimporte={$this->getVImporte()}, tipoAsiento='{$this->getTipoAsiento()}', idayvuelta='{$this->getIdaYVuelta()}' WHERE idviaje={$this->getIdViaje()}";
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $resp = true;
            }   else{
                $this->setMensajeOperacion($base->getError());
            }
        }   else{
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Este metodo elimina una fila de la base de datos, si esta corresponde a el actual valor de $this->idviaje
     * Retorna true si la operacion se realizó exitosamente, y false si no
     *
     * @return bool
     */
    public function Eliminar(){
        $base = new BaseDatos();
        $resp = false;
        if($base->Iniciar()){
            $consulta = "DELETE FROM viaje WHERE idviaje={$this->getIdViaje()}";

            if($base->Ejecutar($consulta)){
                $resp = true;
            }   else{
                $this->setMensajeOperacion($base->getError());
            }
        }   else{
            $this->setMensajeOperacion($base->getError());
        }
        return $resp;
    }

    /**
     * Este método muestra los pasajeros del viaje como una serie de renglones de datos
     *
     * @return string
     */
    public function mostrarPasajeros(){
        $string = "||____________________________||\n";

        foreach($this->getColeccionPasajeros() as $pasajero){
            $string.="||\n"."||__".strtoupper($pasajero->getPApellido()).",{$pasajero->getPNombre()}__||\n".
                "||__DNI: {$pasajero->getRDocumento()}__||\n||__TELEFONO: {$pasajero->getPTelefono()}__||\n";
        }

        $string.="||____________________________";
        return $string;
    }

    public function __toString(){
        $string = "||__VIAJE NRO {$this->getIdViaje()}__||\n".
            "||__DESTINO: {$this->getVDestino()}__||\n".
            "||__MAXIMO PASAJEROS: {$this->getVCantMaxPasajeros()}__||\n".
            "||__PASAJEROS__||\n".$this->mostrarPasajeros().
            "||\n";
        $string .= "||__RESPONSABLE VIAJE__||\n||\n".$this->getObjResponsable();
        $string.= "||____________________________||\n||__EMPRESA ASOCIADA__||\n||\n".$this->getObjEmpresa();


        $string.="||__IMPORTE: {$this->getVImporte()}__||\n".
            "||__TIPO ASIENTO: {$this->getTipoAsiento()}__||\n".
            "||__¿ES IDA Y VUELTA?: {$this->getIdaYVuelta()}__||\n\n"
            ;

        return $string;
    }

    public function vaciarCampos(){
        $this->idviaje = 0;
        $this->vdestino = "";
        $this->vcantmaxpasajeros = 0;
        $this->objEmpresa = null;
        $this->objResponsable = null;
        $this->vimporte = 0;
        $this->tipoAsiento = "";
        $this->idayvuelta = "";
        $this->coleccionpasajeros = [];
    }

    public function __construct($idviaje=0, $vdestino="", $vcantmaxpasajeros=0, $objEmpresa=null, $objResponsable=null, $vimporte=0, $tipoAsiento="", $idayvuelta="",$coleccionpasajeros=[])
    {
        $this->idviaje = $idviaje;
        $this->vdestino = $vdestino;
        $this->vcantmaxpasajeros = $vcantmaxpasajeros;
        $this->objEmpresa = $objEmpresa;
        $this->objResponsable = $objResponsable;
        $this->vimporte = $vimporte;
        $this->tipoAsiento = $tipoAsiento;
        $this->idayvuelta = $idayvuelta;
        $this->coleccionpasajeros = $coleccionpasajeros;
    }


    public function getIdViaje(){
        return $this->idviaje;
    }
    public function setIdViaje($idviaje){
        $this->idviaje = $idviaje;
    }

    public function getVDestino(){
        return $this->vdestino;
    }
    public function setVDestino($vdestino){
        $this->vdestino = $vdestino;
    }

    public function getVCantMaxPasajeros(){
        return $this->vcantmaxpasajeros;
    }
    public function setVCantMaxPasajeros($vcantmaxpasajeros){
        $this->vcantmaxpasajeros = $vcantmaxpasajeros;
    }

    public function getObjEmpresa(){
        return $this->objEmpresa;
    }
    public function setObjEmpresa($objEmpresa){
        $this->objEmpresa = $objEmpresa;
    }

    public function getObjResponsable(){
        return $this->objResponsable;
    }
    public function setObjResponsable($objResponsable){
        $this->objResponsable = $objResponsable;
    }

    public function getVImporte(){
        return $this->vimporte;
    }
    public function setVImporte($vimporte){
        $this->vimporte = $vimporte;
    }

    public function getTipoAsiento(){
        return $this->tipoAsiento;
    }
    public function setTipoAsiento($tipoAsiento){
        $this->tipoAsiento = $tipoAsiento;
    }

    public function getIdaYVuelta(){
        return $this->idayvuelta;
    }
    public function setIdaYVuelta($idayvuelta){
        $this->idayvuelta = $idayvuelta;
    }

    public function getColeccionPasajeros(){
        return $this->coleccionpasajeros;
    }
    public function setColeccionPasajeros($coleccionpasajeros){
        $this->coleccionpasajeros = $coleccionpasajeros;
    }

    public function getMensajeOperacion(){
        return $this->mensajeoperacion;
    }
    public function setMensajeOperacion($mensajeoperacion){
        $this->mensajeoperacion = $mensajeoperacion;
    }
}