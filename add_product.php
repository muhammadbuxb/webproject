<?php
session_start();
if(isset($_SESSION['user_info'])){
  $user = $_SESSION['user_info'];
}else{
  echo "<script>";
  echo "window.location.href = 'login.php'";
 echo "</script>";
}

require_once('includes/db_conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Add Product</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php
require_once('db_navbar.php');
  ?>
  
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
 <?php
      require_once('sidebar.php');
 ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Add Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
         
         
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
      <?php
             if(isset($_POST['add'])){
               
              $item_name =   $_POST['product_name'];
              $item_price =  $_POST['product_price'];
              
       
             $image_name = $_FILES['file']['name'];
             
           $image_path = "image/".$image_name;
             

            
              move_uploaded_file($_FILES['file']['tmp_name'],$image_path);      
           
           
              if(empty($item_name)==false && empty($item_price)==false){
               $connection =get_connection();
               if(!$connection){
                   echo "Conneciton Failed";
                   exit();
               }
               $sql = "insert into products(product_name,product_price,image_path) values('$item_name','$item_price','$image_path')";
               $result  = mysqli_query($connection,$sql);
               if($result){
                   echo "<h1>Product Add Sccuessfully</h1>";
               }else{
                   echo "Query error ".$sql;
               }

           }else{
               echo "Item Name Or Item Price Must be entered";
           }

       }
   ?>
        <div class="col-lg-2">

          
        </div>
     

        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Product Form</h5>

              <!-- Vertical Form -->
              <form method="POST"  enctype="multipart/form-data" class="row g-3">
                <div class="col-12">
                  <label class="form-label">Product Name</label>
                  <input type="text" class="form-control" name="product_name">
                </div>
                <div class="col-12">
                  <label class="form-label">Product Price</label>
                  <input type="text" class="form-control" name="product_price">
                </div>
                <div class="col-12">
                  <label  class="form-label"> Upload Image</label>
                  <input type="file" class="form-control" name="file">
                </div>
               
                <div class="text-center">
                  <button name="add" type="submit" class="btn btn-primary">Submit</button>
                  
                </div>
              </form><!-- Vertical Form -->
            

           
            </div>
          </div>

          <!-- <div class="card">
            <div class="card-body">
              <h5 class="card-title">No Labels / Placeholders as labels Form</h5>

              No Labels Form -->
              <!-- <form class="row g-3">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Your Name">
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="col-12">
                  <input type="text" class="form-control" placeholder="Address">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="City">
                </div>
                <div class="col-md-4">
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="text" class="form-control" placeholder="Zip">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>End No Labels Form -->

            </div>
          </div>

         
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Admin Dashboard</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>