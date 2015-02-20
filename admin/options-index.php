<?php
include "../inc/dbconfig.php";
include "login.php";
$PageTitle = "Questionnaire Options";
include "header.php";
?>

<script type="text/javascript">
  $(document).ready(function() {
    $("#sN").click(function() { $(".wcsf").attr('checked', false); });
    $("#dN").click(function() { $(".wcd").attr('checked', false); });
  });
</script>

<div style="float: left; width: 550px;">
  <h3>Add Questionnaire Option</h3>
  
  <form action="options-db.php?a=add" method="POST" style="width: 550px;">
    <strong>City:</strong>
    <input type="text" name="city" style="width: 300px;"><br>
    <br>
    
    <input type="radio" name="sixtyfive" id="sY" value="Y"> Yes
    <input type="radio" name="sixtyfive" id="sN" value="N"> No
    &nbsp; &nbsp;
    <strong>65 years or older?</strong><br>
    <br>
    
    <input type="radio" name="wc_sixtyfive" class="wcsf" value="Y"> Yes
    <input type="radio" name="wc_sixtyfive" class="wcsf" value="N"> No
    &nbsp; &nbsp;
    <strong>... and use a wheelchair?</strong><br>
    <br>
    
    <input type="radio" name="disability" id="dY" value="Y"> Yes
    <input type="radio" name="disability" id="dN" value="N"> No
    &nbsp; &nbsp;
    <strong>Adult with a disability?</strong><br>
    <br>
    
    <input type="radio" name="wc_disability" class="wcd" value="Y"> Yes
    <input type="radio" name="wc_disability" class="wcd" value="N"> No
    &nbsp; &nbsp;
    <strong>... and use a wheelchair?</strong><br>
    <br>
    
    <?php
    $float = "left";
    
    $rresult = mysql_query("SELECT * FROM rides ORDER BY name ASC");
    
    while($rrow = mysql_fetch_array($rresult)) {
      echo "<div style=\"float: $float; width: 250px;\">
        <div style=\"float: left;\"><input type=\"checkbox\" name=\"rides[]\" value=\"" . $rrow['id'] . "\"></div>
        <div style=\"float: right; width: 225px;\">" . $rrow['name'] . "</div>
      </div>\n";
      
      if ($float == "right") echo "<div style=\"clear: both;\"></div>\n";
      
      $float = ($float == "right") ? "left" : "right";
    }
    ?>
    
    <br>
    
    <input type="submit" value="Add" style="display: block; margin: 0 auto;">
  </form>
</div>

<div style="float: right; width: 300px;">
  <h3>Available Questionnaire Options</h3>
  
  <?php
  $result = mysql_query("SELECT * FROM options ORDER BY city ASC");
  
  while($row = mysql_fetch_array($result)) {
    ?>
    <div style="margin-left: 50px;">
      <div class="controls">
        <a href="options-db.php?a=delete&id=<?php echo $row['id']; ?>" onClick="return(confirm('Are you sure you want to delete this record?'));"><img src="images/delete.png" alt="Delete" title="Delete"></a>
        <a href="options-edit.php?id=<?php echo $row['id']; ?>"><img src="images/edit.png" alt="Edit" title="Edit"></a>
      </div>
      
      <div style="float: left; width: 120px;"><?php echo $row['city']; ?></div>
      <div style="float: left; width: 20px;"><?php echo ($row['sixtyfive'] != "") ? $row['sixtyfive'] : "&nbsp;"; ?></div>
      <div style="float: left; width: 20px;"><?php echo ($row['wc_sixtyfive'] != "") ? $row['wc_sixtyfive'] : "&nbsp;"; ?></div>
      <div style="float: left; width: 20px;"><?php echo ($row['disability'] != "") ? $row['disability'] : "&nbsp;"; ?></div>
      <div style="float: left; width: 20px;"><?php echo ($row['wc_disability'] != "") ? $row['wc_disability'] : "&nbsp;"; ?></div>
      
      <div style="clear: both; height: 15px;"></div>
    </div>
    <?php
  }
  ?>
</div>

<div style="clear: both;"></div>

<?php include "footer.php"; ?>