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

  <title>SB Admin - Tables</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

      <?php require_once 'nav.php'; ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php require_once 'sidebar.php'; ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Course Registration</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">

          <div class="container" style="    width: 100%;
    border: 1px solid;
    height: auto;padding: 10px;
">

<div class="card-block">
                                                    <form method="post" enctype="multipart/form-data">
                                                      <div class="form-group row">
                                                          <label class="col-sm-2 col-form-label">Matric Number</label>
                                                          <div class="col-sm-10">
                                                                        <input type="text" class="form-control mat" name="matric" required>
                                                          </div>
                                                      </div>
                                                      <div class="form-group row">
                                                          <label class="col-sm-2 col-form-label ">Course Code</label>
                                                          <div class="col-sm-10">
                                                              <select  class="form-control coded" name="code" required> </select>
                                                          </div>
                                                      </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Course Title</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control tit" name="title" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Course Unit</label>
                                                            <div class="col-sm-10">
                                                                <select name="unit" class="form-control uni">
                                                                    <option value="">Course Unit</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Level</label>
                                                            <div class="col-sm-10">
                                                              <select name="level" class="form-control">
                                                                  <option value="">Level</option>
                                                                  <option value="nd1">nd1</option>
                                                                  <option value="nd2">nd2</option>
                                                                  <option value="hnd1">hnd1</option>
                                                                  <option value="hnd2">hnd2</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Semester</label>
                                                            <div class="col-sm-10">
                                                              <select name="semester" class="form-control">
                                                                  <option value="">Semester</option>
                                                                  <option value="first">First</option>
                                                                  <option value="second">Second</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Exam Score</label>
                                                            <div class="col-sm-10">
                                                                          <input type="number" name="exam" class="form-control" name="exam" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Test Score</label>
                                                            <div class="col-sm-10">
                                                                          <input type="number"  name="test" class="form-control" name="test" required>
                                                            </div>
                                                        </div>

                                                        <button type="submit" name="proccess" class="btn btn-success">Proccess</button>
                                                    </form>
                                                    <?php
                                                    			 if(isset($_POST["proccess"])){
                                                                    $ids = $_SESSION['idfs'];

                                                                    $matric = $_POST["matric"];
                                                                    $code = $_POST["code"];
                                                                    $title = $_POST["title"];
                                                                    $unit = $_POST["unit"];
                                                                    $level = $_POST["level"];
                                                                    $semester = $_POST["semester"];
                                                                    $exam = $_POST["exam"];
                                                                    $test = $_POST["test"];

                                                                    $total = $exam + $test;

                                                                    //echo $fruit_name;
                                                                    $select_Query = "SELECT count(*) as num FROM result where officer = '$ids'
                                                                    and course_code = '$code' and  course_title = '' ";
                                                                    $select_connect = mysqli_query($connect,$select_Query);

                                                                        if (mysqli_num_rows($select_connect) > 0) {

                                                                          echo "<script type='text/javascript'>alert('Already Exist! ');</script>";

                                                                        }else{

                                                                          $query  = "INSERT INTO `result`(`id`, `officer`, `matric`, `level`, `course_code`,
                                                                            `course_title`, `semester`, `course_unit`, `exam_score`, `test_score`,
                                                                             `total`, `date`, `status`)
                                                                          VALUES (null,'$ids','$matric','$level','$code','$title','$semester','$unit','$exam','$test','$total',now(),'0')";
                                                                          $insert = mysqli_query($connnect,$query);

                                                                           if (!$insert){
                                                                             echo "<script type='text/javascript'>alert('Something Went Wrong, Try Again');</script>";
                                                                          }
                                                                          else
                                                                          {
                                                                             echo "<script type='text/javascript'>alert(' proccessed successfully');</script>";;
                                                                          }
                                                                          }

                                                                   }
                                                    ?>
                                                </div>
          </div>

        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

  <script type="text/javascript">
    const select =     document.querySelector('.coded');
    const intset =     document.querySelector('.mat');


    intset.addEventListener('keydown', e => {

        if (intset.value === "") {
          intset.style.border = 'red';
        }else {
              console.log('uiu');
              getCuscode (intset.value,select);
        }
    });

    select.addEventListener('change', e => {
      console.log(select);
        if (select.value === "") {
          select.style.border = 'red';
        }else {
          getPriceForMixture (select.value);
        }
    });

    function getCuscode (text,OrderIDs) {
        console.log(text);
        console.log(OrderIDs);

            const url = `revealer.php?matric=${text}`;

            const xhr = new XMLHttpRequest();

            xhr.open('GET', url, true);

            xhr.onreadystatechange = function () {

              if (xhr.readyState == 4 && xhr.status == 200) {

                  OrderIDs.innerHTML = xhr.responseText;
              }

            }

           xhr.send();
  }

    function getPriceForMixture (text) {

            const OrderIDs = document.querySelector('.tit');
            const OrderIDsd = document.querySelector('.uni');

            const url = `reveal.php?cosCode=${text}`;

            const xhr = new XMLHttpRequest();

            xhr.open('GET', url, true);

            xhr.onreadystatechange = function () {

              if (xhr.readyState == 4 && xhr.status == 200) {

                  let ttile =  xhr.responseText;
                  let sd = ttile.split('/');
                  OrderIDs.value = sd[0];
                  OrderIDsd.value = sd[1];



              }

            }

           xhr.send();
  }

  </script>
</body>

</html>
