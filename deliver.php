<?php
 $id = $_GET['id'];

 

 require_once('includes/db_conn.php');
 
 $con = get_connection();
 
 $sql = "UPDATE customer_orders SET status = 'Delivered'";
 
 $result = mysqli_query($con,$sql);
 
 if($result){
   echo "<script>";
   echo "window.location.href='tables_orders.php'";
  echo "</script>";
 }
?>