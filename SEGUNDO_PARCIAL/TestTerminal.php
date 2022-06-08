<?php

include('Responsable.php');
include('Viaje.php');
include('ViajeNacional.php');
include('ViajeInternacional.php');
include('Empresa.php');
include ('Terminal.php');

$resp1 = new Responsable("Joe","McCartney",3445212,"Av. San Martin 2131","joem@mail.com",431234);
$resp2 = new Responsable("Carlos","Pereyra",3445212,"Av. Belgrano 123","carlitox@mail.com",4141234);

$v1 = new ViajeInternacional("SANTIAGO","12:30","15:15",1,1000,"25-5-2021",100,75,$resp1,true);
$v2 = new ViajeInternacional("MONTEVIDEO","15:30","18:15",2,1500,"25-5-2021",150,50,$resp2,false);
$v3 = new ViajeInternacional("RIO","11:30","16:15",3,2000,"25-5-2021",200,120,$resp1,true);
$v4 = new ViajeNacional("SALTA","20:30","02:45",4,700,"30-6-2022",70,25,$resp2,25);
$v5 = new ViajeNacional("SANTA CRUZ","16:30","18:45",5,500,"30-6-2022",50,25,$resp1,10);

$v6 = new ViajeNacional("CORDOBA","16:30","19:45",6,800,"30-6-2022",100,80,$resp2,10);
$v7 = new ViajeNacional("BUENOS AIRES","16:30","18:45",7,900,"30-6-2022",120,25,$resp1,10);
$v8 = new ViajeInternacional("BOGOTÁ","11:30","16:15",8,2000,"25-5-2021",200,120,$resp2,false);
$v9 = new ViajeInternacional("PARIS","11:30","16:15",9,3500,"25-5-2021",200,120,$resp1,true);
$v10 = new ViajeInternacional("NEW YORK","11:30","16:15",10,5000,"25-5-2021",200,120,$resp2,true);


$e1 = new Empresa("123KFL","Terrabus",[$v1,$v2,$v3,$v4,$v5]);
$e2 = new Empresa("KK9212","Busquen",[$v6,$v7,$v8,$v9,$v10]);


$terminal = new Terminal("SAN MARTIN","AVDA. SAN MARTIN 300",[$e1,$e2]);

$result = $terminal->darViajeMenorValor();

echo "\n||__VIAJE MENOR DE 'Terrabus'__||\n".$result[0];
echo "\n\n||__VIAJE MENOR DE 'Busquen'__||\n".$result[1];

