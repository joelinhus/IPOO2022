<?php
include_once "BaseDatos.php";
class Pasajero{
    private $rdocumento;
    private $pnombre;
    private $papellido;
    private $ptelefono;
    private $objViaje;
    private $mensajeoperacion;

    /**
     * Este método devuelve un booleano si se encontró el pasajero correspondiente a el rdocumento pasado por parametro
     * También actualiza los datos del $this para que sean equivalentes a los del viaje encontrado
     *
     * @param $dni
     * @return bool
     */
    public function BuscarXDni($dni){
        $base = new BaseDatos();
        $consulta = "SELECT * FROM PASAJERO WHERE rdocumento=".$dni;
        $resp = false;
        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                if($row2=$base->Registro()){
                    $this->setRDocumento($dni);
                    $this->setPNombre($row2['pnombre']);
                    $this->setPApellido($row2['papellido']);
                    $this->setPTelefono($row2['ptelefono']);
                    $nv = new Viaje();

                    $nv->Buscar($row2['idviaje']);

                    $this->setObjViaje($nv);
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
     * Este metodo retorna todas las filas de la tabla pasajero en un array, si hay algun error en la consulta retorna null
     *
     * @return null|array
     */
    public function Listar($condicion=""){
        $arreglo = null;
        $base = new BaseDatos();

        $consulta = "SELECT * FROM pasajero";

        if($condicion!=""){
            $consulta.=" WHERE ".$condicion;
        }
        $consulta .= " ORDER BY papellido";

        if($base->Iniciar()){
            if($base->Ejecutar($consulta)){
                $arreglo = array();
                while($row2=$base->Registro()){
                    $rdocumento = $row2['rdocumento'];
                    $pnombre = $row2['pnombre'];
                    $papellido = $row2['papellido'];
                    $ptelefono = $row2['ptelefono'];
                    $nv = new Viaje();

                    $nv->Buscar($row2['idviaje']);

                    $pasajero = new Pasajero($rdocumento,$pnombre,$papellido,$ptelefono,$nv);
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
     * Este metodo inserta una fila en la base de datos con los valores actuales del $this
     * Retorna true si la operacion se realizó exitosamente, y false si no
     * @return bool
     */
    public function Insertar(){
        $base = new BaseDatos();
        $resp = false;
        $consulta = "INSERT INTO pasajero(rdocumento,pnombre,papellido,ptelefono,idviaje)
        VALUES ('{$this->getRDocumento()}','{$this->getPNombre()}','{$this->getPApellido()}',{$this->getPTelefono()},{$this->getObjViaje()->getIdViaje()})";
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
        $consulta = "UPDATE pasajero SET pnombre='{$this->getPNombre()}', papellido='{$this->getPApellido()}', 
        ptelefono={$this->getPTelefono()}, idviaje={$this->getObjViaje()->getIdViaje()} WHERE rdocumento={$this->getRDocumento()}";
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
     * Este metodo elimina una fila de la base de datos, si esta corresponde a el actual valor de $this->rdocumento
     * Retorna true si la operacion se realizó exitosamente, y false si no
     *
     * @return bool
     */
    public function Eliminar(){
        $base = new BaseDatos();
        $resp = false;
        if($base->Iniciar()){
            $consulta = "DELETE FROM pasajero WHERE rdocumento='{$this->getRDocumento()}'";
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


    public function __toString(){
        $string = "||__".strtoupper($this->getPApellido()).",{$this->getPNombre()}__||\n".
        "||__DNI: {$this->getRDocumento()}__||\n||__TELEFONO: {$this->getPTelefono()}__||\n";
        #if($viaje->Buscar($this->getObjViaje()->getIdViaje()))
            $string .= "||__VIAJE ASOCIADO AL PASAJERO__||\n||__CODIGO VIAJE: {$this->getObjViaje()->getIdViaje()}__||__DESTINO: {$this->getObjViaje()->getVDestino()}__||";
        return $string;
        ;
    }

    public function __construct($rdocumento="",$pnombre="",$papellido="",$ptelefono=0,$objViaje=null){
        $this->rdocumento=$rdocumento;
        $this->pnombre=$pnombre;
        $this->papellido=$papellido;
        $this->ptelefono=$ptelefono;
        $this->objViaje=$objViaje;
    }

    public function cargarDatos($rdocumento,$pnombre,$papellido,$ptelefono,$objViaje){
        $this->setRDocumento($rdocumento);
        $this->setPNombre($pnombre);
        $this->setPApellido($papellido);
        $this->setPTelefono($ptelefono);
        $this->setObjViaje($objViaje);
    }

    public function getRDocumento(){
        return $this->rdocumento;
    }
    public function setRDocumento($rdocumento){
        $this->rdocumento=$rdocumento;
    }

    public function getPNombre(){
        return $this->pnombre;
    }
    public function setPNombre($pnombre){
        $this->pnombre=$pnombre;
    }

    public function getPApellido(){
        return $this->papellido;
    }
    public function setPApellido($papellido){
        $this->papellido=$papellido;
    }

    public function getPTelefono(){
        return $this->ptelefono;
    }
    public function setPTelefono($ptelefono){
        $this->ptelefono=$ptelefono;
    }

    public function getObjViaje(){
        return $this->objViaje;
    }
    public function setObjViaje($objViaje){
        $this->objViaje = $objViaje;
    }

    public function getMensajeOperacion(){
        return $this->mensajeoperacion;
    }
    public function setMensajeOperacion($mensajeoperacion){
        $this->mensajeoperacion=$mensajeoperacion;
    }
}