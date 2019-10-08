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

  <title>SB Admin - Dashboard</title>

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
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">
                  <?php
                                     $ids = $_SESSION['idf'];


                $select =  " select count(id) as sop from course where studentid = '$ids' ";

                                             $query = mysqli_query($connnect,$select);

                                             if(mysqli_num_rows($query)<1){

                                             echo "0";
                                           }else{

                                             $sac = mysqli_fetch_array($query);
                                             echo  $sac['sop'];
                                           } ?> Courses</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"></span>
                <span class="float-right">
                  <!-- <i class="fas fa-angle-right"></i> -->
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">     <?php

                  $idsch = '1';


                  $select =  "SELECT SUM(unit) as al FROM course where studentid = '$ids' ";

                                               $query = mysqli_query($connnect,$select);

                                               if(mysqli_num_rows($query)<1){

                                               echo "0";
                                             }else{

                                               $sac = mysqli_fetch_array($query);
                                               echo  $sac['al'];
                                             } ?>    Total unit</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"></span>
                <span class="float-right">
                  <!-- <i class="fas fa-angle-right"></i> -->
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">    <?php

                  $idsch = '1';

                  $select =  " select semester as sop from course where studentid = '$ids' ";

                                               $query = mysqli_query($connnect,$select);

                                               if(mysqli_num_rows($query)<1){

                                               echo "0";
                                             }else{

                                               $sac = mysqli_fetch_array($query);
                                               echo  $sac['sop'];
                                             } ?> Semester </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5">    <?php

                  $idsch = '1';

                  $select =  " select count(id) as sop from course where studentid = '$ids' ";

                                               $query = mysqli_query($connnect,$select);

                                               if(mysqli_num_rows($query)<1){

                                               echo "0";
                                             }else{

                                               $sac = mysqli_fetch_array($query);
                                               echo  $sac['sop'];
                                             } ?> Times</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Analytic </div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30"></canvas>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Added Courses </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S_N</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Unit</th>
                    <th>Level</th>
                    <th>Semester</th>
                    <th>Date</th>
                    <th>Time</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S_N</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Unit</th>
                    <th>Level</th>
                    <th>Semester</th>
                    <th>Date</th>
                    <th>Time</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php   $select_query = "select * from course where studentid = '$ids'";
                      $my_select = mysqli_query($connnect,$select_query);
                      $count = 0;
                      while($data = mysqli_fetch_array($my_select)){
                        $count ++;
                        ?>
                  <tr>
                    <td><?php echo $count;  ?></td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['code']; ?></td>
                    <td><?php echo $data['unit']; ?></td>
                    <td><?php echo $data['level']; ?></td>
                    <td><?php echo $data['semester']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                  </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

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
          <a class="btn btn-primary" href="logout.php">Logout</a>
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
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
