<?php
if(isset($_GET['show'])){
    $content = file_get_contents('cart_pizza.php');
    session_start();
    var_dump($_SESSION);
    print_r($_SESSION);
    echo "in";
}
?>