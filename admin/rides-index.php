<?php
include "../inc/dbconfig.php";
include "login.php";
$PageTitle = "Transportation Services";
include "header.php";
?>

<div style="float: left; width: 350px;">
  <h3>Add Transportation Service</h3>
  
  <form action="rides-db.php?a=add" method="POST" style="width: 350px;">
    <strong>Name:</strong><br>
    <input type="text" name="name" style="width: 350px;"><br>
    <br>
    
    <strong>Address:</strong><br>
    <input type="text" name="address" style="width: 350px;"><br>
    <br>
    
    <strong>City:</strong><br>
    <input type="text" name="city" style="width: 350px;"><br>
    <br>
    
    <div style="float: left;">
      <strong>State:</strong><br>
      <input type="text" name="state" style="width: 150px;" value="WI">
    </div>
    
    <div style="float: right;">
      <strong>Zip Code:</strong><br>
      <input type="text" name="zip" style="width: 150px;">
    </div>
    
    <div style="clear: both;"></div>
    <br>
    
    <strong>Phone:</strong><br>
    <input type="text" name="phone" style="width: 350px;"><br>
    <br>
    
    <strong>Web Site:</strong><br>
    <input type="text" name="website" style="width: 350px;"><br>
    <br>
    
    <strong>Description:</strong><br>
    <textarea rows="20" cols="20" name="description" style="width: 350px; height: 300px;"></textarea><br>
    <br>
    
    <input type="submit" value="Add" style="display: block; margin: 0 auto;">
  </form>
</div>

<div style="float: right; width: 500px;">
  <h3>Available Transportation Services</h3>
  
  <?php
  $result = mysql_query("SELECT * FROM rides ORDER BY name ASC");
  
  while($row = mysql_fetch_array($result)) {
    ?>
    <div style="margin-left: 50px;">
      <div class="controls">
        <a href="rides-db.php?a=delete&id=<?php echo $row['id']; ?>" onClick="return(confirm('Are you sure you want to delete this record?'));"><img src="images/delete.png" alt="Delete" title="Delete"></a>
        <a href="rides-edit.php?id=<?php echo $row['id']; ?>"><img src="images/edit.png" alt="Edit" title="Edit"></a>
      </div>
      
      <?php echo $row['name']; ?>
      
      <div style="clear: both; height: 15px;"></div>
    </div>
    <?php
  }
  ?>
</div>

<div style="clear: both;"></div>

<?php include "footer.php"; ?>