<?php
if ($_SERVER['QUERY_STRING'] == "m") setcookie("MobileTest"); // Remove this line when mobile version testing is done
include_once "inc/dbconfig.php";

function email($address, $name="") {
  for ($i = 0; $i < strlen($address); $i++) { $email .= (rand(0, 1) == 0) ? "&#" . ord(substr($address, $i)) . ";" : substr($address, $i, 1); }
  if ($name == "") $name = $email;
  echo "<a href=\"&#109;&#97;&#105;&#108;&#116;&#111;&#58;$email\">$name</a>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
  <META http-equiv="Content-Type" content="text/html;charset=utf-8">
  <META http-equiv="pragma" content="no-cache">
  <META http-equiv="imagetoolbar" content="no">
  <META name="language" content="en">
  <META name="author" content="Remedi Creative">
  <META name="description" content="<?php if ($Description != "") { echo $Description; } ?>">
  <META name="keywords" content="Waukesha transportation, waukesha, transportation, senior, disabled, <?php if ($Keywords != "") { echo $Keywords; } ?>">
  <title>Find-a-Ride Waukesha<?php if ($PageTitle != "") { echo " | " . $PageTitle; } ?></title>
  <link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="stylesheet" href="inc/far2010.css" type="text/css" media="screen,print">

	<?php
  //@include("Mobile_Detect.php");
  //$detect = new Mobile_Detect();
  //if ($detect->isMobile() && !isset($_COOKIE["MobReff"])) {
	if ($_SERVER['QUERY_STRING'] == "m" || isset($_COOKIE["MobileTest"])) {
  ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <link rel="stylesheet" href="inc/far2012-mobile.css" type="text/css" media="screen,print">
	<?php } ?>

  <script src="inc/jquery-1.5.1.js" type="text/javascript"></script>
  <script src="jquery.fontsize.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
      $("a[href^='http'], a[href$='.pdf']").not("[href*='" + window.location.host + "']").attr('target','_blank');
			$("#wc_sixtyfive").hide();
			$("#sY").click(function() { $("#wc_sixtyfive").slideDown(500, function() {} ); });
			$("#sN").click(function() { $("#wc_sixtyfive").slideUp(500, function() {} ); $(".wcsf").attr('checked', false); });
			$("#wc_disability").hide();
			$("#dY").click(function() { $("#wc_disability").slideDown(500, function() {} ); });
			$("#dN").click(function() { $("#wc_disability").slideUp(500, function() {} ); $(".wcd").attr('checked', false); });
      $("#fontmanager").fontsizemanager();
    });
  </script>
  <!--[if lt IE 7]>
    <script src="inc/IE8.js" type="text/javascript"></script>
  <![endif]-->

  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22246077-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body>

<div id="header">
  <a href="."><img src="images/logo.png" alt="Find-a-Ride Waukesha" id="logo"></a>

  <ul id="menu-top">
    <li><a href=".">home</a></li>
    <li><a href="contact.php">contact</a></li>
    <li><a href="sitemap.php">site map</a></li>
  </ul>

  <div style="float:right;margin-top:10px; margin-right:10px;" id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'en',
    includedLanguages: 'es',
    layout: google.translate.TranslateElement.InlineLayout.SIMPLE
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



  <div style="clear: both;"></div><div id="fontmanager" align="right"></div>
</div> <!-- END header -->

<div id="menu">
  <ul>
     <li><a href=".">HOME</a></li>
    <li><a href="about.php">ABOUT US</a></li>
    <li><a href="resources.php">RESOURCES</a></li>
    <li><a href="links.php">LINKS</a></li>
    <li><a href="contact.php">CONTACT US</a></li>
  </ul>

  <form action="search.php" method="POST" style="float: right; margin: 2px 15px 0 0; position: relative; z-index: 100000;">
    <div>
      <input type="text" name="search" class="input" value="search" onClick="if(this.value=='search')this.value='';" onBlur="if(this.value=='')this.value='search';">
      <input type="image" src="images/search-submit.gif" class="submit" onMouseOver="javascript:this.src='images/search-submit-h.gif';" onMouseOut="javascript:this.src='images/search-submit.gif';">
      <div style="clear: both;"></div>
    </div>
  </form>
</div> <!-- END menu -->

<div id="content-wrap">
	<?php if ($PageTitle == "") echo "<div id=\"home\">"; ?>
  <div id="content">
