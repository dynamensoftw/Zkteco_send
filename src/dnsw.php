<?php


//Especificamos el tipo horario 
date_default_timezone_set('America/Bogota');

//Incluimos la libreria correspondientemente 
include "zklibrary.php";

//Especificamos la conexión con el dispositivo
$zk = new ZKLibrary('192.168.0.200', 4370, 'TCP');


echo "Bienvenidos configuración envio datos ZKTeco
Con amor por DYNAMENSOFTW Acompañamiento seguro!.";

$zk->connect();


$zk->setTime(date('Y-m-d H:i:s'));


echo "\n Sincronización de tiempo";

$atendance = $zk->getAttendance();

echo "\n Dispositivo ".$zk->getDeviceName();

echo "\n Serial ".$zk->getSerialNumber();


$zk->disableDevice();
$zk->enableDevice();
$zk->disconnect();

?>


