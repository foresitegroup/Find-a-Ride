<?php
include("../inc/dbconfig.php");

if ($_POST['rides'] != "") {
  $rides_arr = $_POST['rides'];
  sort($rides_arr);
  $rides = implode(",", $rides_arr);
} else {
  $rides = "";
}

$wc_sixtyfive = ($_POST['sixtyfive'] == "N") ? "" : $_POST['wc_sixtyfive'];
$wc_disability = ($_POST['disability'] == "N") ? "" : $_POST['wc_disability'];

switch ($_GET['a']) {
  case "add":
    $query = "INSERT INTO options (city, sixtyfive, wc_sixtyfive, disability, wc_disability, rides) VALUES ('" . $_POST['city'] . "', '" . $_POST['sixtyfive'] . "', '" . $wc_sixtyfive . "', '" . $_POST['disability'] . "', '" . $wc_disability . "', '" . $rides . "')";
    break;
  case "edit":
    $query = "UPDATE options SET city = '" . $_POST['city'] . "', sixtyfive = '" . $_POST['sixtyfive'] . "', wc_sixtyfive = '" . $wc_sixtyfive . "', disability = '" . $_POST['disability'] . "', wc_disability = '" . $wc_disability . "', rides = '" . $rides . "' WHERE id = '" . $_POST['id'] . "'";
    break;
  case "delete":
    $query = "DELETE FROM options WHERE id = '" . $_GET['id'] . "'";
    break;
}

mysql_query($query) or die(mysql_error());

header( "Location: options-index.php" );
?>