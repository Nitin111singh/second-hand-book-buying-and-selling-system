<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    $username = $_POST["logemail"];
    $password = $_POST["logpass"]; 
    
    $sql1 = "SELECT * FROM user WHERE email='$username'";
    $result1 = mysqli_query($conn, $sql1);
    $num = mysqli_num_rows($result1);
    if ($num == 1) {
        $row = mysqli_fetch_assoc($result1);
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $username;
            $_SESSION['uid'] = $row['id'];
            echo "loggedin " . $username;
            header("Location: ../index.php");
            exit();
        } else {
            $errormsg = "Invalid email or password";
            header("Location: ../index.php?loginsuccess=false&perror=$errormsg");
            exit();
        }          
    } else {
        $errormsg = "Invalid email or password";
        header("Location: ../index.php?loginsuccess=false&perror=$errormsg");
        exit();
    }
}
?>
