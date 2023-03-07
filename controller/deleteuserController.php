<?php

    include_once "../partials/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM user where id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"user Deleted";
    }
    else{
        echo"Not able to delete";
    }
     
?>