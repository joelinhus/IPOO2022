<?php
include_once '../viaje.php';
include_once '../pasajero.php';
include_once '../responsable.php';
include_once '../empresa.php';

$pasajero1 = new Pasajero("18554091","Noel Hernán","Jeckeln",155111407,1);

$j = new Viaje();
echo $j;

//echo $j->mostrarPasajeros();
#echo $j->Eliminar() ? "True" : $j->getMensajeOperacion();
/*
echo "||__LISTAR__||\n";
$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}
echo "__________________________________________________________";
echo "||__INSERTAR__||\n";
echo ($j->Insertar()>0 ? "true" : "false")."\n";

$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}
echo "__________________________________________________________";
echo "||__MODIFICAR__||\n";
$j->setVDestino("Chubut");
echo "{$j->getIdViaje()}\n\n";
echo ($j->Modificar()>0 ? "true" : "false")."\n";

$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}
echo "__________________________________________________________";

echo "||__ELIMINAR__||\n";
foreach ($j->listarPasajeros() as $pasajero){
    $pasajero->Eliminar();
}
echo $j->Eliminar() ? "TRUE" : $j->getMensajeOperacion();

$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}
    */