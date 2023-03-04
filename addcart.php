<?php
// connect to database
include 'partials/dbconnect.php';

// check if user is logged in
session_start();
if (!isset($_SESSION['uid'])) {
   echo "<script>
  alert('Login to add products to cart');
  window.location.href='index.php';
  </script>";
}

// retrieve product ID from query string
$pid = $_GET['p_id'];

// insert the product into the shopping basket for the current user
$sql = "INSERT IGNORE INTO shopping_basket (p_id, u_id) VALUES ($pid, {$_SESSION['uid']})";
$result = mysqli_query($conn, $sql);

// check if the query was successful
if ($result) {
  if (mysqli_affected_rows($conn) > 0) {
    // show a success message
    $message = "Product added to shopping basket";
      echo "<script>
  alert('$message');
  window.location.href='shopping_cart.php';
  </script>";
  } else {
    // show an error message
   
    $message = "Product is already in the shopping basket";
     echo "<script>
  alert('$message');
  window.location.href='index.php';
  </script>";
  }
} else {
 
  $message = "Error adding product to shopping basket";
   echo "<script>
  alert('$message');
  window.location.href='shopping_cart.php';
  </script>";
}
 
 
?>

