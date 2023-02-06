<?php

// connect to database
include 'partials/dbconnect.php';

// check if user is logged in
session_start();
if (!isset($_SESSION['uid'])) {
  header("Location: partials/index.php");
}

// retrieve product ID from query string
$pid = $_GET['p_id'];

// echo "<h2>" . $pid . "</h2>";

//insert the product into the shopping basket for the current user
$sql = "INSERT INTO shopping_basket (p_id, u_id) VALUES ($pid, {$_SESSION['uid']})";
$result = mysqli_query($conn, $sql);

// check if the query was successful
if ($result) {
  // redirect back to the product page with a success message
  header("Location: index.php?pid=$pid&message=Product added to shopping basket");
} else {
  // redirect back to the product page with an error message
  header("Location: index.php?pid=$pid&message=Error adding product to shopping basket");
}

?>
