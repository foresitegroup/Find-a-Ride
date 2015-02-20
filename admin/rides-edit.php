<?php
include "../inc/dbconfig.php";
include "login.php";
$PageTitle = "Edit Transportation Service";
include "header.php";

$result = mysql_query("SELECT * FROM rides WHERE id = '" . $_GET['id'] . "'");
$row = mysql_fetch_array($result);
?>

<form action="rides-db.php?a=edit" method="POST" style="width: 350px; margin: 0 auto;">
  <strong>Name:</strong><br>
  <input type="text" name="name" style="width: 350px;" value="<?php echo $row['name']; ?>"><br>
  <br>
  
  <strong>Address:</strong><br>
  <input type="text" name="address" style="width: 350px;" value="<?php echo $row['address']; ?>"><br>
  <br>
  
  <strong>City:</strong><br>
  <input type="text" name="city" style="width: 350px;" value="<?php echo $row['city']; ?>"><br>
  <br>
  
  <div style="float: left;">
    <strong>State:</strong><br>
    <input type="text" name="state" style="width: 150px;" value="<?php echo $row['state']; ?>">
  </div>
  
  <div style="float: right;">
    <strong>Zip Code:</strong><br>
    <input type="text" name="zip" style="width: 150px;" value="<?php echo $row['zip']; ?>">
  </div>
  
  <div style="clear: both;"></div>
  <br>
  
  <strong>Phone:</strong><br>
  <input type="text" name="phone" style="width: 350px;" value="<?php echo $row['phone']; ?>"><br>
  <br>
  
  <strong>Web Site:</strong><br>
  <input type="text" name="website" style="width: 350px;" value="<?php echo $row['website']; ?>"><br>
  <br>
  
  <strong>Description:</strong><br>
  <textarea rows="20" cols="20" name="description" style="width: 350px; height: 300px;"><?php echo $row['description']; ?></textarea><br>
  <br>
  
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" value="Update" style="display: block; margin: 0 auto;">
</form>

<?php include "footer.php"; ?>