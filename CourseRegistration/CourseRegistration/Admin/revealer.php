<?php include 'connect.php'; ?>
<?php

$matric = $_GET['matric'];
echo "string .....";

$select_Query_poll = " SELECT course.title,course.code,course.unit,student.matric from course
left JOIN student on course.studentid = student.id where student.matric ='$matric' ";

$select_connect_poll = mysqli_query($connnect,$select_Query_poll);


  if (mysqli_num_rows($select_connect_poll) < 1) {
    // code...
      echo "<option>Loading...</option>";

  }else {
    // code...
      while ($data_poll = mysqli_fetch_array($select_connect_poll)){
      echo "<option value=\"{$data_poll['code']}\"> {$data_poll['code']}</option> ";
    }
  }

 ?>
