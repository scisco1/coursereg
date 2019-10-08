<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="firstName" class="form-control" placeholder="Full name" name="fullname" required="required" autofocus="autofocus">
                  <label for="firstName">Fullname </label>
                </div>
              </div>
          </div>
          <br>
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <div class="form-label-group">
                    <select id="firstName" class="form-control sed"  name="session" required="required" autofocus="autofocus">
                      <option value="">Session</option>
                      <option value="10/69">2009/2010</option>
                      <option value="11/69">2010/2011</option>
                      <option value="12/69">2011/2012</option>
                      <option value="13/69">2012/2013</option>
                      <option value="14/69">2013/2014</option>
                      <option value="15/69">2014/2015</option>
                      <option value="16/69">2015/2016</option>
                      <option value="17/69">2016/2017</option>
                      <option value="18/69">2017/2018</option>
                      <option value="19/69">2018/2019</option>
                      <option value="20/69">2019/2020</option>
                      <option value="21/69">2020/2021</option>
                      <option value="22/69">2021/2022</option>
                      <option value="23/69">2022/2023</option>
                      <option value="24/69">2023/2024</option>
                      <option value="25/69">2024/2025</option>
                      <option value="26/69">2025/2026</option>
                      <option value="27/69">2026/2027</option>
                     </select>
                  </div>
                </div>
              </div>
          </div>
          <br/>
          <div class="form-row">
            <div class="col-md-6">
              <input type="text" id="lastName" class="form-control yearof" disabled placeholder="Year of Admission" name="matr" required="required">
              <label for="lastName">Year of Admission </label>
            </div>
                          <div class="col-md-6">
                            <div class="form-label-group">
                              <input type="text" id="lastName" class="form-control" placeholder="Matric" name="matric" required="required">
                              <label for="lastName">Matric Last Four digit </label>
                            </div>
                          </div>
                        </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <select  class="form-control" name="level" placeholder="Programme" required="required">
              <option value="">Programme</option>
              <option value="ND">ND</option>
              <option value="HND">HND</option>
             </select>

            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <select  class="form-control" name="levels" placeholder="level" required="required">
              <option value="">Level</option>
              <option value="ND1">ND1</option>
              <option value="HND1">HND1</option>
              <option value="ND11">ND11</option>
              <option value="HND11">HND11</option>
             </select>

            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" class="form-control"  name="cpassword" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" name="reg" class="btn btn-primary btn-block" >Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="Login.php">Login Page</a>
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
        <?php
            if (isset($_POST['reg'])) {
              // code...
              $password = $_POST['password'];
              $cpassword = $_POST['cpassword'];
              $fullname = $_POST['fullname'];
              $level = $_POST['level'];
              $mat = $_POST['matric'];
              $session = $_POST['session'];

              if (strlen($mat) < 4 ||  strlen($mat) > 4 ) {
                // code...
                echo "Test length should not be less than or greater 4  ";
              }else {
                // code...

              $matric = $session.'/'.$mat;

              }
              if ($password != $cpassword ) {
                // code...
                          echo "Password Not Match!";
              }else{
                echo $matric;
              $select_Query = "SELECT id as num FROM student where matric = '$matric' ";
              $select_connect = mysqli_query($connnect,$select_Query);

                       mysqli_affected_rows($connnect);
                   mysqli_num_rows($select_connect);


                  if (mysqli_num_rows($select_connect) > 0) {

                    echo "<script type='text/javascript'>alert('Already Exist! ');</script>";

                  }else{

                    $query  = "INSERT INTO `student`(`id`, `fullname`, `matric`, `password`, `level`, `date`, `status`)
                     VALUES (null,'$fullname','$matric','$password','$level',now(),'0')";
                    $insert = mysqli_query($connnect,$query);

                     if (!$insert){
                       echo "<script type='text/javascript'>alert('Something Went Wrong, Try Again');</script>";
                    }
                    else
                    {
                       echo "<script type='text/javascript'>alert(' Registered successfully');</script>";;
                    }
               }
              }
            }


          ?>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <script type="text/javascript">
document.querySelector('.sed').addEventListener('change',e => {

    document.querySelector('.yearof').value =     document.querySelector('.sed').value ;
});
  </script>
</body>

</html>
