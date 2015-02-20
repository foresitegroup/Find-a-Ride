<?php
$PageTitle = ($_POST['search'] != "") ? "Search Results for \"" . $_POST['search'] . "\"" : "Search";
include "header.php";
?>

<img src="images/banner-sub.jpg" alt="Need help finding a ride, you're at the right place" style="margin: 2px 0 10px;"><br>
<br>

<h1><?php echo $PageTitle; ?></h1><br>
<br>

<?php
if ($_POST['search'] != "") {
  $dir = opendir(".");
  while (false != ($file = readdir($dir))) {
    if ((substr(strrchr($file, "."), 1) == "php") && ($file != "header.php") && ($file != "footer.php") && ($file != "menu-side.php") && ($file != "search.php")) {
      $files[] = $file;
    }
  }
  closedir($dir);
  natcasesort($files);
  
  foreach ($files as $file) {
    $contents = file_get_contents($file);
    
    if (preg_match("/" . $_POST['search'] . "/i", $contents, $oresult)) {
      // Found something.  Flip the "no results" switch.
      $sresults = "yes";
      
      // Extract the page title
      preg_match("/PageTitle = \"(.*?)\"/", $contents, $matches);
      
      // Set variable to display page title or file name if no title
      $stitle = ($matches[1] != "") ? $matches[1] : $file;
      
      // Display the results
      echo "<a href=\"$file\" style=\"font-size: 120%;\">$stitle</a><br>\n";
      
      // Get position of search term to create a result snippet
      $pos = stripos(trim(strip_tags($contents)), $_POST['search']);
      $start = ($pos-20 < 0) ? 0 : $pos-20;
      
      // Build the snippet
      if ($start > 0) echo "...";
      $snippet = substr(trim(strip_tags($contents)), $start, 90) . "...<br><br>\n";
      
      // Bold the search term in the snippet and display it
      echo preg_replace("/" . $_POST['search'] . "/i", "<strong>" . $oresult[0] . "</strong>", $snippet);
    }
  }
  
  // If nothing is found, man up and apologize.
  if ($sresults != "yes") echo "Sorry, no results for \"" . $_POST['search'] . "\".<br><br>\n";
  
  echo "<br>\n<strong>Search Again</strong><br>\n";
}
?>

<form action="search.php" method="POST">
  <div>
    <input type="text" name="search" class="input" value="search" onClick="if(this.value=='search')this.value='';" onBlur="if(this.value=='')this.value='search';">
    <input type="image" src="images/search-submit.gif" class="submit" onMouseOver="javascript:this.src='images/search-submit-h.gif';" onMouseOut="javascript:this.src='images/search-submit.gif';">
    <div style="clear: both;"></div>
  </div>
</form>

<?php include "footer.php"; ?>