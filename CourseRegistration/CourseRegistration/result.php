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
          <li class="breadcrumb-item active">Tables</li>
        </ol>

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
                    <th>Score</th>
                    <th>Grade</th>
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
                    <th>Score</th>
                    <th>Grade</th>
                    <th>Level</th>
                    <th>Semester</th>
                    <th>Date</th>
                    <th>Time</th>
                  </tr>
                </tfoot>
                <tbody>
                <?php
                function grade ($score = 0) {
                  if ($score < 39) {
                    // code...
                    return 'F';
                  }
                  elseif ($score >= 40 && $score <= 45) {
                    // code...
                    return 'P';
                  }
                  elseif ($score >= 46 && $score <= 50) {
                    // code...
                    return 'C';
                  }
                  elseif ($score >= 65 && $score <= 69) {
                    // code...
                    return 'CD';
                  }
                  elseif ($score >= 70 && $score <= 75) {
                    // code...
                    return 'B';
                  }
                  elseif ($score >= 76 && $score <= 79) {
                    // code...
                    return 'AB';
                  }
                  elseif ($score >= 80 && $score <= 100) {
                    // code...
                    return 'A';
                  }
                }
                function point ($score = 0) {
                  if ($score < 39) {
                    // code...
                    return 0.1;
                  }
                  elseif ($score >= 40 && $score <= 45) {
                    // code...
                    return 0.35;
                  }
                  elseif ($score >= 46 && $score <= 50) {
                    // code...
                    return 0.55;
                  }
                  elseif ($score >= 65 && $score <= 69) {
                    // code...
                    return 0.56;
                  }
                  elseif ($score >= 70 && $score <= 75) {
                    // code...
                    return 0.75;
                  }
                  elseif ($score >= 76 && $score <= 79) {
                    // code...
                    return 0.89;
                  }
                  elseif ($score >= 80 && $score <= 100) {
                    // code...
                    return 1;
                  }
                }

                function cgp ($unit = [],$score = []) {

                  $mark =0 ;
                  $unt =0;
                    for ($i=0; $i < $score; $i++) {
                      // code...
                      $unt += $unit ;
                            $mark += (($score * point($score)) * $unit) ;
                    }
                    $last = $mark/$unt ;

                    return  'uyuyuy';
                }

                 $User = $_SESSION['user'];

                 $select_query = "select * from result  WHERE matric = '$User'";

                      $my_select = mysqli_query($connnect,$select_query);
                      $count = 0;
                      $unit = [];
                      $score = [];
                      while($data = mysqli_fetch_array($my_select)){
                        $count ++;
                        $unit [$count] =$data['course_unit'];
                        $score[$count] =$data['total'];
                        ?>
                  <tr>
                    <td><?php echo $count;  ?></td>
                    <td><?php echo $data['course_title']; ?></td>
                    <td><?php echo $data['course_code']; ?></td>
                    <td><?php echo $data['course_unit']; ?></td>
                    <td><?php echo $data['total']; ?></td>
                    <td><?php echo grade ($data['total']); ?></td>
                    <td><?php echo $data['level']; ?></td>
                    <td><?php echo $data['semester']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                  </tr>

                <?php } ?>

                </tbody>
              </table>
              <p><b>CGP:</b> <?php
            //  echo $unit[0].'  '.$score[0];

              if (cgp($unit,$score)) {
                // code...
                echo "string";
              }
              else if (!cgp($unit,$score)) {
                // code...
                echo "haa";
              }
              else {
                // code...
                echo "coll";
              } ?></p>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
