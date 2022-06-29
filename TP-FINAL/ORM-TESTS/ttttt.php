<?php
include('pasajero.php');
include('empresa.php');
include('viaje.php');

/*
$viaje = new Viaje();
$viaje->Buscar(17);
print_r($viaje->listarPasajeros());
*/

$empresa = new Empresa();
$empresa->Buscar(2);
foreach($empresa->listarViajes() as $v){
    print_r($v->listarPasajeros());
}

#echo $viaje->devolverIdInsercion() ? $viaje->devolverIdInsercion() : $viaje->getMensajeOperacion();

#echo json_encode([new Pasajero("1234s","Juancho","Talarga",65498731,1)]);
#print_r(explode(",","154,284,753"));
/*
$string = "154,284,753,789,";

$pasajeroRDoc = "789";
$arrRDoc = explode(",",$string);
foreach($arrRDoc as $rdoc){
    if ($rdoc==$pasajeroRDoc){
        if($busqueda = array_search($pasajeroRDoc,$arrRDoc)){
            array_splice($arrRDoc,$busqueda,null);
        }
    }
}

#print_r(implode(",",$arrRDoc));
echo trim($string,",");
*/