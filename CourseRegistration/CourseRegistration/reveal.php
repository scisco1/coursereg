<?php include 'connect.php'; ?>
<?php

$cosCode = $_GET['cosCode'];

$select_Query_poll = " SELECT title,unit from  course where  code ='$cosCode' ";

$select_connect_poll = mysqli_query($connnect,$select_Query_poll);

$data_poll = mysqli_fetch_array($select_connect_poll);

echo $data_poll['title'] .'/'.$data_poll['unit'] ;

 ?>
