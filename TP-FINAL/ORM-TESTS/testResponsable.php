<?php

include_once '../responsable.php';

$j = new Responsable(15784,111354,"Juan Pablo","Pereyra");

echo "||__LISTAR__||\n";
$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}

echo "||__INSERTAR__||\n";
echo ($j->Insertar()>0 ? "true" : "false")."\n";

$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}

echo "||__MODIFICAR__||\n";
$j->setRApellido("Jeckeln");
$j->Modificar();

$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}

echo "||__ELIMINAR__||\n";
$j->Eliminar();

$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}