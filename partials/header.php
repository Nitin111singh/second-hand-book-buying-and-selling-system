<?php
session_start();

    echo'  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <!--<a class="navbar-brand" href="#">Navbar</a>-->

    

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>

<!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
<style type="text/css">
/* ============ desktop view ============ */
@media all and (min-width: 992px) {
	.navbar .nav-item .dropdown-menu{ display: none; }
	.navbar .nav-item:hover .nav-link{ color: #fff;  }
	.navbar .nav-item:hover .dropdown-menu{ display: block; }
	.navbar .nav-item .dropdown-menu{ margin-top:0; }
}	
.shopping-cart-icon {
  color: green;
}
/* ============ desktop view .end// ============ *

</style>
    
    <a class="navbar-brand" href="index.php">
    <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    TradeUrBooks
  </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>';
        if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true) {
          echo'<li class="nav-item">
          <a class="nav-link" href="mypost.php">My posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="makepost.php">New post</a>
        </li>
         </li>';

      } include 'partials/dbconnect.php'; 
        $sqlq="SELECT * FROM `categ`";
        $result = mysqli_query($conn,$sqlq);
      echo'
      <li class="nav-item dropdown">
      <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">  Categories  </a> 
      <ul class="dropdown-menu"> ';
      while($row=mysqli_fetch_assoc($result))
      {
      $cat_n=$row['category'];
          echo'<li><a class="dropdown-item" href="categories.php?cat='.$cat_n.'"> '.$cat_n.'</a></li>';
      }
      echo' </ul> 
      </li>';
      
      if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true) 
      {
        echo '<li class="nav-item">
          <a class="nav-link " href="request.php">Requests</a>
         
        </li>';
      }
        
      echo'</ul>
      <div class="row mx-2">';
      
      if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true) 
      { $uid = $_SESSION['uid'];

          // Delete the item from the shopping_basket table
          $sql = "select count(*) from  shopping_basket u_id = $uid";
        $result = mysqli_query($conn,$sqlq);

       echo' <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="searchInput">
  <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
  </form>
       <button class="btn btn-outline-success ml-2" id="micBtn"><i class="fas fa-microphone"></i></button>
       <form class="form-inline my-2 my-lg-0" method="get" action="search.php">
  <a class="nav-link" href="/books_selling-main/shopping_cart.php">
    <i class="fas fa-shopping-cart shopping-cart-icon"></i>
  </a>
 
       <p class="text-dark my-0 mx-2"> Welcome '.$_SESSION['useremail'].'</p>
       <a href="partials/logout_hndl.php" class="btn btn-outline-success ml-2" >Logout</a>
     </form>';

echo '<script>
  const micBtn = document.querySelector("#micBtn");
  const searchInput = document.querySelector("#searchInput");

  micBtn.addEventListener("click", () => {
    const recognition = new webkitSpeechRecognition();
    recognition.continuous = false;
    recognition.interimResults = false;
    recognition.lang = "en-US";

    recognition.start();

    recognition.onresult = (event) => {
      const transcript = event.results[0][0].transcript;
      searchInput.value = transcript;
      
      if (transcript === "go to home" || transcript ==="continue shopping") {
        const msg = new SpeechSynthesisUtterance("Redirecting to home page HAPPY SHOPPING");
        window.speechSynthesis.speak(msg);
        setTimeout(() => {
          window.location.href = "index.php";
        }, 2000);
      } else if (transcript === "go to shopping") {
        const msg = new SpeechSynthesisUtterance("Redirecting to shopping cart page ");
        window.speechSynthesis.speak(msg);
        setTimeout(() => {
          window.location.href = "shopping_cart.php";
        }, 2000);

      }else if (transcript === "logout me" || transcript ==="logout") {
        const msg = new SpeechSynthesisUtterance("Signing off see you later");
        window.speechSynthesis.speak(msg);
        setTimeout(() => {
          window.location.href = "partials/logout_hndl.php";
        }, 2000);
      }
       else if (transcript === "hello") {
        const msg = new SpeechSynthesisUtterance("Hello '.$_SESSION['useremail'].'  how can I help you");
        window.speechSynthesis.speak(msg)
       }
        else if (transcript === "go to request") {
        const msg = new SpeechSynthesisUtterance("Redirecting to request page");
        window.speechSynthesis.speak(msg)
         setTimeout(() => {
          window.location.href = "request.php";
        }, 2000);
       
       }
    };
  });
</script>';

      } 
else{
 
  echo'<form class="form-inline my-2 my-lg-0"  method="get" action="search.php">
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="searchInput">
  <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
</form>
<button class="btn btn-outline-success ml-2" id="micBtn"><i class="fas fa-microphone"></i></button>
  <button class="btn btn-outline-success ml-2" data-toggle="modal" data-target="#loginmodal">Login</button>
  <button class="btn btn-outline-success mx-2 "data-toggle="modal" data-target="#signupmodal">Signup</button>';
 echo '<script>
        const micBtn = document.querySelector("#micBtn");
        const searchInput = document.querySelector("#searchInput");

        micBtn.addEventListener("click", () => {
          const recognition = new webkitSpeechRecognition();
          recognition.continuous = false;
          recognition.interimResults = false;
          recognition.lang = "en-US";
        
          recognition.start();

          recognition.onresult = (event) => {
            searchInput.value = event.results[0][0].transcript;
            recognition.stop();
          };
        });
      </script>';

}
      
 echo'</div>
 </div>
  </nav> ';
  
  include "dropdown.php";
  include "signupmod.php";
  include "loginmodal.php";
  if(isset($_GET['loginsuccess'])&& $_GET['loginsuccess']=="false"){
    $errmsg=$_GET['perror'];
    echo'<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>'.$errmsg.' or email cannot Login !!!</strong> Try another Email
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=="true"){
    echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Sign up Successful !!!</strong> You can browse now
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=="false"){
    $errmsg=$_GET['error'];
    echo'<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>'.$errmsg.' cannot signup !!!</strong> Try another Email
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if(isset($_GET['postsucess'])&& $_GET['postsucess']=="false"){
    $errmsg=$_GET['poerror'];
    echo'<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>'.$errmsg.' cannot upload your post !!!</strong> Check your uploaded content!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }

 
?>
