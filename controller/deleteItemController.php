<?php

    include_once "../partials/dbconnect.php";
    
    $p_id=$_POST['record'];
    $query="DELETE FROM postbook where p_id='$p_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Product Item Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>