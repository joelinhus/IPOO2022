<?php
/*
 * Una Terminal de Ómnibus desea guardar y gestionar los viajes que arriban y parten de las diferentes
 * empresas de la provincia. Para ello la terminal guarda la colección de empresas de Ómnibus, las cuales
 * administran los diferentes viajes que se ofrecen, a diferentes destinos de la provincia de Neuquén. Cada
 * viaje tiene asignada una fecha, una hora de llegada, una hora de partida y el conductor responsable del
 * viaje. Para ello implementar las clases: Terminal, Empresa, Viaje y Responsable .
*/

include('responsable.php');
include('viaje.php');
include('empresa.php');
include('terminal.php');

$resp1 = new Responsable("Hugo","Perez",15948236,"Av San Martin 412","huguito@gmail.com",4427175);
$resp2 = new Responsable("Jeremias","Gomez",15948236,"Belgrano 841","jereg@hotmail.com",4427175);
$resp3 = new Responsable("Pedro","Rodriguez",15948236,"Salta 1234","prodriguez@gmail.com",4427175);

/* _________________Se crea una colección con un mínimo de 2 empresas, ejemplo Flecha Bus y Via Bariloche. */
$v1 = new Viaje("Zapala","18:30","20:00",521,3500,"29/4/2022",80,50,$resp1);
$v2 = new viaje("Buenos Aires","14:15","6:30",879,9000,"31/4/2022",50,35,$resp2);
$e1 = new Empresa("18AC8","BusAndes",[]);
/* _________________A cada empresa se le incorporan 2 instancias de la clase viaje */
$e1->incorporarViaje($v1);
$e1->incorporarViaje($v2);

$v3 = new Viaje("Cordoba","9:15","20:30",8544,5500,"1/5/2022",100,15,$resp3);
$v4 = new Viaje("Salta","12:00","13:00",7518,10000,"5/5/2022",90,40,$resp2);
$e2 = new Empresa("884XQ","Colequen",[]);
$e2->incorporarViaje($v3);
$e2->incorporarViaje($v4);

/* _________________Se crea un objeto Terminal con la colección de empresas creadas en el pnto1. */

$terminal = new Terminal("DE OMNIBUS NEUQUEN","RUTA N°22",[$e1,$e2]);

/*
 * Invocar y visualizar el resultado del método ventaAutomatica con cantidad de asientos 3 y como destino alguno de los destinos de viaje
 * creados en el punto 2
 */
echo "||___________________PUNTO 4 ventaAutomatica()___________________||";
$boolRetorno = $terminal->ventaAutomatica(3,"5/5/2022","Salta","Colequen");
echo "\n".($boolRetorno ? "VIAJE VENDIDO EXITOSAMENTE!" : "NAO NAO AMIGAO")."\n";

/*
 *Invocar y visualizar el resultado del método empresaMayorRecaudacion.
 */

echo "||___________________PUNTO 5 empresaMayorRecaudacion()___________________||";
$empresaRetorno = $terminal->empresaMayorRecaudacion();
echo $empresaRetorno==null ? "NULL" : $empresaRetorno;

/*
 * Invocar y visualizar el resultado del método responsableViaje correspondiente a uno de los números de viajes del punto 2
 */
echo "||___________________PUNTO 6 responsableviaje()___________________||";
$responsableRetorno = $terminal->responsableViaje(8544);
echo $responsableRetorno==null ? "NULL" : $responsableRetorno;
