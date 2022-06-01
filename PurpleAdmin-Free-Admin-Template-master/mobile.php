<?php
ob_start();

session_start();
$email=$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <?php
            include('includeheader.php');
        ?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <?php
                include('includesidebar.php');
          ?>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Mobile Details</h4>
                    <div class="table-responsive">
          <?php
$con=mysqli_connect("localhost","root","","SampleDB") or die("Error in Connection");
$query=mysqli_query($con,"select * from student") or die("Error in Query");
echo "<table class=table border=2> <thead><tr><th>ID</th><th>Name</th><th>Address</th><th>Mobile</th><th>View</th><th>Edit</th><th>Delete</th></tr> </thead><tbody>";
while($row=mysqli_fetch_array($query))
{   
    echo "<tr>";
    $id=$row['id'];
    echo "<td>".$id."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "<td>".$row['mobile']."</td>";
    echo "<td><a class='badge badge-gradient-success' href=viewm.php?id=$id>View</a></td>";
    echo "<td><a class='badge badge-gradient-info' href=editm.php?id=$id>Edit</a></td>";
    echo "<td><a class='badge badge-gradient-danger' href=deletem.php?id=$id>Delete</a></td>";
    echo "</tr>";    

}
echo "</tbody></table>";
mysqli_close($con);
?>
 </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>