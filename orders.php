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
$c_id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Order Details</title>
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
      <h1>Order Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
         
         
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
             
                     <h3> Customer Data </h3> 
                    <table class="table table-striped">
                       
                          <tr>
                            <th scope="col">customer Id</th>
                            <th scope="col">Customer Name </th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Adress</th>
                            <th scope="col">Order time</th>
                          </tr>
                        <tr>
                        <?php
                         $con= get_connection();
                         $Query = "select * from customer_orders where c_id = $c_id";
                         $conQuery = mysqli_query($con,$Query);
                         $customer= mysqli_fetch_assoc($conQuery);


                        ?>
                        <td><?=$c_id?></td>
                        <td><?=$customer['Name']?></td>
                        <td><?=$customer['Mobile']?></td>
                        <td><?=$customer['Adress']?></td>
                        <td><?=$customer['time']?></td>
                        </tr>
                
                     </table>
                </div>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             
            <h3>   Orderd items of Customer </h3>
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th scope="col">S.no</th>
                    <th scope="col">P_id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                      $con= get_connection();
                      $sql= "SELECT * FROM no_order where c_id=$c_id";

                         $result = mysqli_query($con,$sql);
                          $price=0;
                          $total=0;
                          $sno=0;
                        while($row=mysqli_fetch_assoc($result)){
                

                        $quantity=$row['quantity'];
                        $product_id=$row['product_id'];

                        $sqlQuery = "select * from products where id=$product_id";
                        $Result = mysqli_query($con,$sqlQuery);
                        $Row=mysqli_fetch_assoc($Result);
                        
                        $product_price= $Row['product_price'];
                       
                        $price=$quantity*$product_price;

                        $total =$total+$price;
                        $sno= $sno+1;

                  ?>
                  <tr>
                  <th scope="row"><?=$sno?></th>
                    <td><?=$Row['id']?></td>
                    <td><?=$Row['product_name']?></td>
                    <td> <?=$product_price?></td>
                    <td><?=$quantity?></td>
                    <td><?=$price?></td>
                   
                  </tr>

                  <?php
                      }
               
                  ?>
                <tr>
                    <th scope="row"></th>
                    <td col-span-3>Total Bill</td>
                    <td></td>
                    <td></td>
                    <td><?=$total?></td>
                  </tr>
                <!--<tr>
                    <th scope="row">4</th>
                    <td>Angus Grady</td>
                    <td>HR</td>
                    <td>34</td>
                    <td>2012-06-11</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Raheem Lehner</td>
                    <td>Dynamic Division Officer</td>
                    <td>47</td>
                    <td>2011-04-19</td>
                  </tr> -->
                
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

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