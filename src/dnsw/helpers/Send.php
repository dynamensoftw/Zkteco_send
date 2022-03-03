<?php
namespace Dnsw\Helpers;
use Dnsw\Helpers\ZKLibrary;

class Send {
    private $ip;
    private $sede;
    private $host;
    private $time;
    private $serial;
    private $device;

    public function __construct($ip,$sede,$host,$time,$serial=null,$device=null)
    {
        $this->ip = $ip;
        $this->sede = $sede;
        $this->host = $host;
        $this->time = $time;
        $this->serial = $serial;
        $this->device = $device;
    }

    public static function DnswConnect(){
        echo 'Bienvenidos. DYNAMENSOFTW conexión con dispositivos ZKTeco envio de datos';
    }    

    public function conexion(){
        $ip = $this->ip;
        $zk = new ZKLibrary($ip, 4370, 'TCP');
        return $zk;
    }   

    public static function info_device($zk){
        $zk->setTime(date('Y-m-d H:i:s'));
        echo "\n Sincronización de tiempo con éxito";
        echo "\n Dispositivo ".$zk->getDeviceName();
        echo "\n Serial ".$zk->getSerialNumber();
    }

    public static function device($zk){
        return $zk->getDeviceName();
    }
    public static function serial($zk){
        return $zk->getSerialNumber();
    }

    public static function device_process($zk){
        echo "\nConexión con dispositivo terminando";
        // $zk->clearAttendance();
        $zk->disableDevice();
        $zk->enableDevice();
        $zk->disconnect();
    }

    public static function report_send($attendance){
        $user_array = [];
        if(is_array($attendance))
            for($i = 0; $i < count($attendance); $i++){
                $user =  (int)preg_replace('([^A-Za-z0-9])', '', $attendance[$i][1]);
                $date = str_replace(' ','_',$attendance[$i][3]);
                $data = Send::write_logs($user,$date);
                array_push($user_array,$data);
            }
        return $user_array;
    }

    public function url_send($user){
        $httpOptions = array('http' => array(
            'method'  => 'GET',
            'ignore_errors' => true
           ));
        if(is_array($user))
        for($i = 0; $i < count($user);$i++){
                // Abre el fichero usando las cabeceras HTTP establecidas arriba
                $url = $this->host."/".$this->device."/".$this->serial."/".$this->sede."/".$this->time."/".$user[$i];
                $curl = curl_init();
                $fp = fopen("logs/logs_file".date('Y-m-d').".txt", "a");
                curl_setopt($curl,  CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($curl, CURLOPT_FILE, $fp);
                curl_setopt($curl, CURLOPT_URL,  preg_replace('/\\0/',"",$url));
                curl_exec ($curl);
                curl_close($curl);
                fclose($fp);

            }
    }

    private function write_logs($user,$date){
        $logs = fopen("logs/temp_file-".date('Y-m-d').".txt", "a") ;
        $txt = "\nUsuario:".$user." Fecha:".$date;
        fwrite($logs, $txt);
        fclose($logs);

        return $user.'/'.$date;
    }
    

}