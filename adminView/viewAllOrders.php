<div id="ordersBtn">
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Orderid</th>
        <th>Email</th>
        <th>Contact1</th>
        <th>Contact2</th>
        <th>Price</th>
        <th>Owner Name</th>
      </tr>
    </thead>
    <?php
    include_once "../partials/dbconnect.php";
    $sql="SELECT re_id,requests.email as buyeremail,contact1,contact2,price,user.email as selleremail from requests,user where requests.owner_id=user.id";
    $result=$conn->query($sql);



    if ($result->num_rows > 0) {
      while ($row=$result->fetch_assoc()) {
    ?>
      <tr>
        <td><?=$row["re_id"]?></td>
        <td><?=$row["buyeremail"]?></td>
        <td><?=$row["contact1"]?></td>
        <td><?=$row["contact2"]?></td>
        <td><?=$row["price"]?></td>
        <td><?=$row["selleremail"]?></td>
      </tr>
    <?php
      }
    }
    $conn->close();
    ?>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Order Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="order-view-modal modal-body"></div>
    </div><!--/ Modal content-->
  </div><!-- /Modal dialog-->
</div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>