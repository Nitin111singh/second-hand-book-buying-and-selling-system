<?php
session_start();
include 'partials/dbconnect.php'; 
// Retrieve the product ID from the AJAX request
$pid = $_GET['p_id'];

// Retrieve the user ID from the session
$uid = $_SESSION['uid'];

// Delete the item from the shopping_basket table
$sql = "DELETE FROM shopping_basket WHERE p_id = $pid AND u_id = $uid";

if (mysqli_query($conn, $sql)) {
  // Return a success message
  echo "<script>
  alert('Item deleted successfully');
  window.location.href='shopping_cart.php';
  </script>";
} else {
  // Return an error message
  echo "Error deleting item: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
