<!doctype html>
<html lang="en">

<head>
    <!--javascript files start -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--javascript files end -->
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="partials/style.css">
    <title>ProjectZ</title>
</head>
<body>
 
  <?php include'partials/header.php';?>

<div class="product-cart-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 clearfix">
                <h2 class="section-head">My Cart</h2>
                <?php
                    if(isset($_SESSION['uid'])){
                      $e_id = $_SESSION['uid'];
                      $sql="SELECT * FROM `shopping_basket` natural JOIN `postbook` where u_id=$e_id";//
                      $result = mysqli_query($conn,$sql);
                      $sum=0;
                        while($row=mysqli_fetch_assoc($result)){ ?>
                                <table class="table table-bordered">
                                    <thead>
                                    <th>Book Image</th>
                                    <th>Book Name</th>
                                    <th width="120px">Book Price</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                <?php foreach($result as $row){  
                                  $bok_n=$row['b_name'];
                                   $og_pr=$row['og_pr'];
                                   $ex_pr=$row['ex_pr'];
                                    // $time=$row['dt_creation'];
                                     $pic=$row['pic1'];
                                      $p_id=$row['p_id'];
                                      $sum=$sum+$ex_pr;
                                  
                                  ?>
                                    <tr class="item-row">
                                        <td><img src="upload/<?php echo $row['pic1']; ?>" alt="" width="70px" /></td>
                                       <td><a href="post.php?pid=<?php echo $p_id; ?>" class="text-dark"><?php echo $row['b_name']; ?></a></td>

                                        <td> <span class="book-price"><?php echo $row['ex_pr']; ?></span></td>
                                        <td>
                                          
                                         <!-- <button class="btn btn-sm btn-primary remove-cart-item" data-id="<?php echo $row['p_id']; ?>">Delete</button> -->
                                         <!-- <button type="button" class="btn btn-primary"data-id="<?php echo $row['p_id']; ?>"><span class="bi bi-trash"></span> Delete</button> -->
                                       <a href="delete_item.php?p_id=<?php echo $row['p_id']; ?>" class="btn btn-outline-success ml-2">delete item </a>
                                        </td>
                                    </tr>
                        <?php    } ?>
                                    <tr>
                                        <td colspan="3" align="right"><b>TOTAL AMOUNT </b></td>
                                        <td class="total-amount"><?php echo $sum;?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a class="btn btn-sm btn-primary" href="index.php" >Continue Shopping</a>
                                <?php if(isset($_SESSION['uid'])){ ?>

                                <!-- <form action="instamojo.php" class="checkout-form pull-right" method="POST"> -->
                                    <?php
                                        $p_id = '';
                                        foreach($result as $row){
                                            $p_id .= $row['p_id'].',';
                                        }
                                    ?>
                                    <input type="hidden" name="product_id" value="<?php echo $p_id; ?>">
                                    <input type="hidden" name="product_total" class="total-price" value="">
                                    <input type="hidden" name="product_qty" class="total-qty" value="1">
                                    
                                </form>
                                <?php }else{ ?>
                                    <a class="" href="#" data-toggle="modal" data-target="#userLogin_form" ></a>
                                <?php } ?>
                <?php   }
                    }else{ ?>
                        <div class="empty-result">
                            Your cart is currently empty.
                        </div>
                    <?php }
                ?>


            </div>
        </div>
    </div>
</div>

</body>
</html>











