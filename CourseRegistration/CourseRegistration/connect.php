<?php
//ob_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$host = "localhost";
$user = "root";
 $password ="";
 $database ="cregister";
 $port = "8080";
  $socket = "127.0.0.1";
//$mycon = mysqli_connect($host, $user, $password, $database, $port, $socket);
$connnect= mysqli_connect($host,$user,$password);
if (!$connnect){
    echo 'error';

}  else {
//     echo 'alert...';
    $getdb = mysqli_select_db($connnect,$database);
    if (!$getdb){
    echo 'error';

} else {
  //  echo 'alert...oooo';



}
}
