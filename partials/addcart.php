<?php
if(!isset($_SESSION["user_id"])) {
    echo "Login first";
    exit;
}
else
echo"hello bhai";
?>