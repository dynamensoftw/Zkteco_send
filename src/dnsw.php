<?php

use Dnsw\Helpers\Send;
include "server.php";

    $sede  = $_ENV['APP_NAME'];
    $ip  = $_ENV['IP_SERVE'];
    $host  = $_ENV['HOST'];
    $time = date('Y-m-d_H:i:s');
    Send::DnswConnect();
    $zk_send = new Send($ip,$sede,$host,$time);
    $zk = $zk_send->conexion();
    $zk->connect();
    $device = Send::device($zk);
    $serial = Send::serial($zk);
    $zk_send = new Send($ip,$sede,$host,$time,$serial,$device);
    $total_data = $zk_send->report_send($zk->getAttendance());
    $zk_send->url_send($total_data);
    Send::info_device($zk);
    Send::device_process($zk);


?>


