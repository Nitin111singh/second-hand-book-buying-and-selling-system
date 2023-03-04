<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>ProjectX</title>
  </head>
  <body>
  
  <?php include 'partials/header.php';?>
  
  <?php include 'partials/corousel.php';?>
  
  <h1 class="text-center mt-4">Latest adds!</h1>
  
  <div class="container">
    <div class="row mx-2">
      <?php 
      include 'partials/dbconnect.php';   
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $e_id = $_SESSION['uid'];
        $sql = "SELECT * FROM `postbook` WHERE `p_id` NOT IN (SELECT `p_id` FROM postbook WHERE `usenam`=$e_id) ORDER BY `postbook`.`dt_creation` DESC LIMIT 4";
      }
      else {
        $sql="SELECT * FROM `postbook` ORDER BY `postbook`.`dt_creation` DESC LIMIT 3";
      }
      $result = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($result);
      if($count > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $bok_n = $row['b_name'];
          $og_pr = $row['og_pr'];
          $ex_pr = $row['ex_pr'];
          $time = $row['dt_creation'];
          $pic = $row['pic1'];
          $p_id = $row['p_id'];
          echo '<div class="book-card col-md-3">
            <img src="project_x_copy/'.$pic.'" class="book-cover" alt="'.$bok_n.'" width="100%">
            <div class="book-info">
              <h5 class="book-title">
                <a href="post.php?pid='.$p_id.'" class="text-dark">
                  '.$bok_n.'
                </a>
              </h5>
              <p class="book-price">
                Original Price: <span class="original-price">'.$og_pr.'</span>
              </p>
              <p class="book-price">
                Expected Price: <span class="expected-price">'.$ex_pr.'</span>
              </p>
              <p class="book-updated">
                <small class="text-muted">Last updated '.$time.'</small>
              </p>
              <a href="addcart.php?p_id='.$p_id.'" class="btn btn-outline-success ml-2">ADD TO CART</a>
            </div>
          </div>
          <style>
          .book-card {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 2rem;
  border: 1px solid grey;
  border-radius: 5px;
}

.book-cover {
  width: 100%;
}

.book-info {
  padding: 1rem;
  text-align: center;
}

.book-title {
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.book-price,
.book-updated {
  margin-top: 0.5rem;
}

.original-price,
.expected-price {
  font-style: italic;
}

.book-card:nth-child(odd) {
  margin-right: auto;
}

.book-card:nth-child(even) {
  margin-left: auto;
}
</style>';
        }
      } else {
        echo '<p class="text-center">No books available at the moment.</p>';
      }
      ?>
    </div>
  </div>
  <?php include'partials/footer.php';?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>


<!-- $sql="SELECT * FROM `shopping_basket` natural JOIN `postbook` where u_id=$e_id";// -->