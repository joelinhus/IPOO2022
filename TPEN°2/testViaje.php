<?php 

include ("viaje.php");
include ("pasajero.php");
include ("responsableV.php");
$count = 1;
$p1 = new Pasajero("Joel","Jeckeln",43338753,155938151);
$p2 = new Pasajero("Noel Hernán","Jeckeln",18554091,154111407);
$rpv = new ResponsableV(154,684,"Jeremias","Jimenez");
$v = new Viaje(1578,"Neuquén",150,[$p1,$p2],$rpv);
do{
    echo $count>1 ? "\n\n\n": "";
    echo "Ingrese una opcion ";
    echo "\n___________________________\n1. Modificar codigo viaje \n2. Modificar destino viaje \n3. Modificar maximo pasajeros \n4. Agregar pasajero \n5. Modificar pasajero \n6. Modificar responsable\n7. Mostrar viaje\n0. Salir\n";
    $opcion=(int)readline();
    switch($opcion){
        case 1:
            echo "Ingrese el nuevo codigo del viaje: ";
            $nuevoCodigo = readline();
            $v->setCodigoViaje($nuevoCodigo);
            break;
        case 2:
            echo "Ingrese el nuevo destino del viaje: ";
            $nuevoDestino = readline();
            $v->setDestino($nuevoDestino);
            break;
        case 3:
            echo "Ingrese el nuevo maximo de pasajeros: ";
            $nuevoMaximo = (int)readline();
            $v->setMaximoPasajeros($nuevoMaximo);
            break;
        case 4:
            echo "Ingrese el nombre del pasajero: ";
            $n = readline();
            echo "Ingrese el apellido del pasajero: ";
            $a = readline();
            echo "Ingrese el telefono del pasajero: ";
            $t = readline();
            do{
                $done=false;
                echo "Ingrese el DNI del pasajero: ";
                $d = (int)readline();

                if($v->encontrarPasajero($d)){
                    echo "Ya existe un pasajero con ese DNI, por favor intentelo nuevamente\n";
                }else{
                    echo "Pasajero agregado exitosamente";
                    $v->agregarPasajero($d,$n,$a,$t);
                    $done=true;
                }
            }while($done!=true);
            break;
        case 5:
            do{
                echo "Ingrese el DNI del pasajero a modificar: ";
                $d = (int)readline();
                $done = $v->encontrarPasajero($d);
                echo $done ? "" : "Pasajero no encontrado, intente nuevamente\n"; 
            }while($done!=true);
            echo "Ingrese el nuevo nombre del pasajero a modificar: ";
            $n = readline();
            echo "Ingrese el nuevo apellido del pasajero a modificar: ";
            $a = readline();
            echo "Ingrese el nuevo telefono del pasajero a modificar: ";
            $t = readline();
            $v->modificarPasajero($d,$n,$a,$t);
            break;
        case 6:
            echo "Ingrese el nuevo numero de empleado del responsable: ";
            $nEmp = (int)readline();
            echo "Ingrese el nuevo numero de licencia del responsable: ";
            $nLic = (int)readline();
            echo "Ingrese el nuevo nombre del responsable: ";
            $nResp = readline();
            echo "Ingrese el nuevo apellido del responsable: ";
            $aResp = readline();
            $newResp = new ResponsableV($nEmp,$nLic,$nResp,$aResp);
            $v->setResponsable($newResp);
            break;
        case 7:
            echo $v;
            break;
    }
    $count++;
}while($opcion!=0);
?>