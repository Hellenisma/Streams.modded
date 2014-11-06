<?php

class CrudClass{
 private $host="127.0.0.1";
 private $user="root";
 private $db="streams";
 private $pass="";
 private $conn;

public function __construct(){

    $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,$this->pass,
                  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    //debug
    $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
}
//Streams
 public function updateStatus($name,$status,$game,$time){

$sql = "UPDATE status
 SET status=:status, game=:game, update_time=:time
 WHERE name=:name";
 $q = $this->conn->prepare($sql);
 $q->execute(array(':name'=>$name,':status'=>$status, ':game'=>$game, ':time'=>$time));
 return true;
 }

public function getStreamerData(){

    $sql="SELECT * FROM status";
    $q = $this->conn->query($sql) or die("failed!");
    while($r = $q->fetch(PDO::FETCH_ASSOC)){
        $data[]=$r;
    }
    return $data;
}

public function getNames(){

    $sql="SELECT name FROM status";
    $q = $this->conn->query($sql) or die("failed!");
    while($r = $q->fetch(PDO::FETCH_ASSOC)){
        $data[]=$r['name'];
    }
    return $data;
}

public function statusByName($name){

    $sql="SELECT status, game FROM status WHERE name='{$name}' LIMIT 1";
    $q = $this->conn->query($sql) or die("failed!");
    while($r = $q->fetch(PDO::FETCH_ASSOC)){
        $data=$r;
    }
    return $data;
}
}

?>

