<?php session_start();
include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" name="matric" placeholder="User name" required="required" autofocus="autofocus">
              <label for="inputEmail">User name</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control"  name="password" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="login" >Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
    <?php
    if (isset($_POST['login'])) {
      // code...
      $matric = trim($_POST['matric']);
      $password =  trim($_POST['password']);

      if (!empty($matric) && !empty($password) ) {
        // code..
        //echo $matric;
        $select_Query_poll = " SELECT id,password from admin where  username ='$matric' ";

        $select_connect_poll = mysqli_query($connnect,$select_Query_poll);


         if(mysqli_num_rows($select_connect_poll) > 0 ){


           $data_poll = mysqli_fetch_array($select_connect_poll);


           if ($data_poll['password'] == $password) {
             // code...
             $_SESSION['Admin_user'] = $matric ;
             $_SESSION['idfs'] = $data_poll['id'] ;
             echo "<script type='text/javascript'> window.location.replace('dashboard.php');</script>";

           }else {
             // code...
             echo "Password Not Match!";
           }

         }else {
           // code...
           echo "string";
         }





      }else {
        // code...

        echo "string";

      }


    }
     ?>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
