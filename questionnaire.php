<?php
$PageTitle = "Transportation Options";
$Keywords = "transporation questionaire, transportation, waukesha, senior, disabled, transportation options";
$Description = "A helpful listing of transportation options based on your specific information for residents of Waukesha County";
include "header.php";
?>

<img src="images/banner-sub.jpg" alt="Need help finding a ride, you're at the right place" id="banner-sub">

<h1>Transportation Options</h1>

<span style="font-size: 80%; font-style: italic;">Interfaith does not endorse any of the following transportation options.<br>
The following transportation options are not inclusive of all options and could change at any time.<br>
<br>
For information on rates and hours of service for most options listed, please download a copy of the <a href="http://www.findaridewaukesha.org/images/Working_Transit%20Book.pdf" target="_blank">Transportation Resource Guide</a> or use the Resources Tab, to download a copy of the Guide.</span><br /><br />

<?php
function Linkify($text) {
  $text= preg_replace("/(^|[\n ])([\w]*?)((ht|f)tp(s)?:\/\/[\w]+[^ \,\"\n\r\t<]*)/is", "$1$2<a href=\"$3\">$3</a>", $text);
  $text= preg_replace("/(^|[\n ])([\w]*?)((www|ftp)\.[^ \,\"\t\n\r<]*)/is", "$1$2<a href=\"http://$3\">$3</a>", $text);
  $text= preg_replace("/(^|[\n ])([a-z0-9&\-_\.]+?)@([\w\-]+\.([\w\-\.]+)+)/i", "$1<a href=\"mailto:$2@$3\">$2@$3</a>", $text);
  return $text;
}

// Get ride choices based on the options feed into the form
$oresult = mysql_query("SELECT * FROM options WHERE city = '" . $_POST['city'] . "' AND sixtyfive = '" . $_POST['sixtyfive'] . "' AND wc_sixtyfive = '" . $_POST['wc_sixtyfive'] . "' AND disability = '" . $_POST['disability'] . "' AND wc_disability = '" . $_POST['wc_disability'] . "'");
$orow = mysql_fetch_array($oresult);

// Dump ride option into an array
$rides = explode(",", $orow['rides']);
//print_r($rides);

// Loop through ALL ride options
$result = mysql_query("SELECT * FROM rides");
while ($row = mysql_fetch_array($result)) {
  // If this ride is in the array, display it
  if (in_array($row['id'], $rides)) {
    echo "<h3>" . $row['name'] . "</h3><br>\n";
    if ($row['address'] != "") echo $row['address'] . "<br>\n";
    if ($row['city'] != "") echo $row['city'];
    if ($row['city'] != "" && $row['state'] != "") echo ", ";
    if ($row['state'] != "") echo $row['state'];
    if ($row['state'] != "" && $row['zip'] != "") echo " ";
    if ($row['zip'] != "") echo $row['zip'];
    if ($row['city'] != "" || $row['state'] != ""|| $row['zip'] != "") echo "<br>\n";
    if ($row['phone'] != "") echo "Phone: " . $row['phone'] . "<br>\n";
    if ($row['website'] != "") echo Linkify($row['website']) . "<br>\n";
    if ($row['description'] != "") echo "<br>" . Linkify(nl2br($row['description'])) . "<br>\n";
    echo "<br><br>\n";
  }
}
?>

<h3>MTM Inc.</h3><br>
Phone: 866-907-1493<br>
<a href="http://www.mtm-inc.net/wisconsin/">http://www.mtm-inc.net/wisconsin/</a><br>
<br>
Manages non-emergency medical transportation services for specific Medicaid and BadgerCare Plus members in Wisconsin

<?php include "footer.php"; ?>