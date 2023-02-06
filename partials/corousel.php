<!--corausel-->
<?php $var= rand(1,1);?>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <!-- <li data-target="#carouselExampleCaptions" data-slide-to="2"></li> -->
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo "img/book[".$var."].jpg";?>" class="d-block w-100" alt="..." width="800" height="350">
      <div class="carousel-caption d-none d-md-block">
        <div style="color:white">
        <h2>Second-hand reads, first-hand savings</h2></div>
      
      </div>
    </div>
    <!-- <div class="carousel-item">
      <img src="<?php echo "img/book[".$var."].jpg";?>" class="d-block w-100" alt="..." width="800" height="350">
      <div class="carousel-caption d-none d-md-block">
        <h5>!!!!</h5>
      </div>
    </div> -->
    <div class="carousel-item">
      <img src="<?php echo "img/books[".$var."].jpg";?>" class="d-block w-100" alt="..." width="800" height="350">
      <div class="carousel-caption d-none d-md-block">
      <div style="color:white">
        <h2>Budget-friendly books, just a click away.</h2></div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--end-->