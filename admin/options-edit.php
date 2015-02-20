<?php
include "../inc/dbconfig.php";
include "login.php";
$PageTitle = "Edit Questionnaire Options";
include "header.php";

$result = mysql_query("SELECT * FROM options WHERE id = '" . $_GET['id'] . "'");
$row = mysql_fetch_array($result);
?>

<script type="text/javascript">
  $(document).ready(function() {
    $("#sN").click(function() { $(".wcsf").attr('checked', false); });
    $("#dN").click(function() { $(".wcd").attr('checked', false); });
  });
</script>

<form action="options-db.php?a=edit" method="POST" style="width: 550px; margin: 0 auto;">
  <strong>City:</strong>
  <input type="text" name="city" style="width: 300px;" value="<?php echo $row['city']; ?>"><br>
  <br>
  
  <input type="radio" name="sixtyfive" id="sY" value="Y"<?php if ($row['sixtyfive'] == "Y") echo " checked"; ?>> Yes
  <input type="radio" name="sixtyfive" id="sN" value="N"<?php if ($row['sixtyfive'] == "N") echo " checked"; ?>> No
  &nbsp; &nbsp;
  <strong>65 years or older?</strong><br>
  <br>
  
  <input type="radio" name="wc_sixtyfive" class="wcsf" value="Y"<?php if ($row['wc_sixtyfive'] == "Y") echo " checked"; ?>> Yes
  <input type="radio" name="wc_sixtyfive" class="wcsf" value="N"<?php if ($row['wc_sixtyfive'] == "N") echo " checked"; ?>> No
  &nbsp; &nbsp;
  <strong>... and use a wheelchair?</strong><br>
  <br>
  
  <input type="radio" name="disability" id="dY" value="Y"<?php if ($row['disability'] == "Y") echo " checked"; ?>> Yes
  <input type="radio" name="disability" id="dN" value="N"<?php if ($row['disability'] == "N") echo " checked"; ?>> No
  &nbsp; &nbsp;
  <strong>Adult with a disability?</strong><br>
  <br>
  
  <input type="radio" name="wc_disability" class="wcd" value="Y"<?php if ($row['wc_disability'] == "Y") echo " checked"; ?>> Yes
  <input type="radio" name="wc_disability" class="wcd" value="N"<?php if ($row['wc_disability'] == "N") echo " checked"; ?>> No
  &nbsp; &nbsp;
  <strong>... and use a wheelchair?</strong><br>
  <br>
  
  <?php
  // Convert the rides "array" into an actual array
  $rides_arr = explode(",", $row['rides']);
  
  $float = "left";
  
  $rresult = mysql_query("SELECT * FROM rides ORDER BY name ASC");
  
  while($rrow = mysql_fetch_array($rresult)) {
    echo "<div style=\"float: $float; width: 250px;\">
      <div style=\"float: left;\"><input type=\"checkbox\" name=\"rides[]\" value=\"" . $rrow['id'] . "\"";
      
      // If this value is in the array, check the box
      if (in_array($rrow['id'], $rides_arr)) echo " checked";
      
      echo "></div>
      <div style=\"float: right; width: 225px;\">" . $rrow['name'] . "</div>
    </div>\n";
    
    if ($float == "right") echo "<div style=\"clear: both;\"></div>\n";
    
    $float = ($float == "right") ? "left" : "right";
  }
  ?>
  
  <br>
  
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" value="Update" style="display: block; margin: 0 auto;">
</form>

<?php include "footer.php"; ?>