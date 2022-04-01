<?php 

include ("viaje.php");
$count = 1;
$v = new Viaje(1,"Neuquén",150,array(["nombre"=>"Noel","apellido"=>"Hernan","dni"=>125]));
do{
    echo $count>1 ? "\n\n\n": "";
    echo "Ingrese una opcion ";
    echo "\n___________________________\n1. Modificar codigo viaje \n2. Modificar destino viaje \n3. Modificar maximo pasajeros \n4. Agregar pasajero \n5. Modificar pasajero \n6. Mostrar viaje\n0. Salir\n";
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
            echo "Ingrese el DNI del pasajero: ";
            $d = (int)readline();
            $v->agregarPasajero($d,$n,$a);
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
            $v->modificarPasajero($d,$n,$a);
            break;
        case 6:
            echo $v;
            break;
    }
    $count++;
}while($opcion!=0);
?>