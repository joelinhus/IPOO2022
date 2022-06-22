<?php
include_once "../empresa.php";

$j = new Empresa(2,"Flechabus","Alcorta 564");

echo "||__LISTAR__||\n";
$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}
/*
echo "||__INSERTAR__||\n";
echo ($j->Insertar()>0 ? "true" : "false")."\n";

$coleccion = $j->Listar();
foreach ($coleccion as $i){
    echo $i;
}


echo "||__MODIFICAR__||\n";
$j->setENombre("QUE ONDA LOCO");
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
*/