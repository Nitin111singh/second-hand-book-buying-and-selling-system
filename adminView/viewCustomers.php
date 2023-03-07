<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Username </th>
        <th class="text-center">Email</th>
        <th class="text-center">College</th>
        <th class="text-center">use_id</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../partials/dbconnect.php";
      $sql="SELECT * from user";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <!-- <td><?=$row["first_name"]?> <?=$row["last_name"]?></td> -->
      <td><?=$row["email"]?></td>
      <td><?=$row["state"]?></td>
      <td><?=$row["city"]?></td>
      <td><?=$row['id']?></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="userDelete('<?=$row['id']?>')">Delete</button></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>