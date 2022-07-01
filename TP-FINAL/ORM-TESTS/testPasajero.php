<?php 

include_once '../pasajero.php';
include_once '../viaje.php';
include_once '../responsable.php';
include_once '../empresa.php';

$nv = new Viaje();
$nv->Buscar(15);
$pasajero = new Pasajero("999","Carlangas","Pepe",2254,$nv);
#$pasajero->BuscarXDni(753);

/*
echo "||__LISTAR__||\n";
$coleccionPasajeros = $pasajero->Listar();
foreach ($coleccionPasajeros as $p){
    echo $p;
}
echo "||__INSERTAR__||\n";
echo ($pasajero->Insertar()>0 ? "true" : $pasajero->getMensajeOperacion())."\n";

$coleccionPasajeros = $pasajero->Listar();
foreach ($coleccionPasajeros as $p){
    echo $p;
}


echo "||__MODIFICAR__||\n";
$pasajero->setPNombre("Rose Marie");
$pasajero->setPApellido("Saldivia Ruiz");
$pasajero->setPTelefono("1");

echo ($pasajero->Modificar()>0 ? "true" : $pasajero->getMensajeOperacion())."\n";

$coleccionPasajeros = $pasajero->Listar();
foreach ($coleccionPasajeros as $p){
    echo "\n".$p;
}

*/
echo "||__ELIMINAR__||\n";

echo ($pasajero->Eliminar()>0 ? "true" : $pasajero->getMensajeOperacion())."\n";

$coleccionPasajeros = $pasajero->Listar();
foreach ($coleccionPasajeros as $p){
    echo $p;
}