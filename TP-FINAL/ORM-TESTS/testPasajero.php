<?php 

include_once '../pasajero.php';
include_once '../viaje.php';

$pasajero = new Pasajero("18554091","Noel Hernán","Jeckeln",155111407,1);

echo "||__LISTAR__||\n";
$coleccionPasajeros = $pasajero->Listar();
foreach ($coleccionPasajeros as $p){
    echo $p;
}
/*
echo "||__INSERTAR__||\n";
echo ($pasajero->Insertar()>0 ? "true" : "false")."\n";

$coleccionPasajeros = $pasajero->Listar();
foreach ($coleccionPasajeros as $p){
    echo $p;
}


echo "||__MODIFICAR__||\n";
$pasajero->setPNombre("Rose Marie");
$pasajero->setPApellido("Saldivia Ruiz");
$pasajero->setPTelefono("11547511");

echo ($pasajero->Modificar()>0 ? "true" : "false")."\n";

$coleccionPasajeros = $pasajero->Listar();
foreach ($coleccionPasajeros as $p){
    echo $p;
}

echo "||__ELIMINAR__||\n";

echo ($pasajero->Eliminar()>0 ? "true" : "false")."\n";

$coleccionPasajeros = $pasajero->Listar();
foreach ($coleccionPasajeros as $p){
    echo $p;
}*/