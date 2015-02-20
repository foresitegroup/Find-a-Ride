<?php
include("../inc/dbconfig.php");

switch ($_GET['a']) {
  case "add":
    $query = "INSERT INTO rides (name, address, city, state, zip, phone, website, description) VALUES ('" . $_POST['name'] . "', '" . $_POST['address'] . "', '" . $_POST['city'] . "', '" . $_POST['state'] . "', '" . $_POST['zip'] . "', '" . $_POST['phone'] . "', '" . $_POST['website'] . "', '" . $_POST['description'] . "')";
    break;
  case "edit":
    $query = "UPDATE rides SET name = '" . $_POST['name'] . "', address = '" . $_POST['address'] . "', city = '" . $_POST['city'] . "', state = '" . $_POST['state'] . "', zip = '" . $_POST['zip'] . "', phone = '" . $_POST['phone'] . "', website = '" . $_POST['website'] . "', description = '" . $_POST['description'] . "' WHERE id = '" . $_POST['id'] . "'";
    break;
  case "delete":
    $query = "DELETE FROM rides WHERE id = '" . $_GET['id'] . "'";
    break;
}

mysql_query($query) or die(mysql_error());

header( "Location: rides-index.php" );
?>