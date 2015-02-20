<?php include_once "../inc/dbconfig.php"; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
  <META http-equiv="Content-Type" content="text/html;charset=utf-8">
  <META http-equiv="pragma" content="no-cache">
  <META http-equiv="imagetoolbar" content="no">
  <META name="language" content="en">
  <META name="author" content="Remedi Creative">
  <META name="description" content="">
  <META name="keywords" content="">
  <title>Find-a-Ride Administration<?php if ($PageTitle != "") { echo " | " . $PageTitle; } ?></title>
  <link rel="shortcut icon" href="../images/favicon.ico">
  <link rel="stylesheet" href="../inc/far2010.css" type="text/css" media="screen,print">
  <link rel="stylesheet" href="inc/admin.css" type="text/css" media="screen,print">
  <script src="../inc/jquery-1.3.2.min.js" type="text/javascript"></script>
</head>
<body<?php if (preg_match("/iPhone/i", $_SERVER['HTTP_USER_AGENT'])) echo " style=\"-webkit-text-size-adjust: none;\""; ?>>

<div id="header">
  <a href="."><img src="../images/logo.png" alt="Find-a-Ride Waukesha" id="logo"></a>
  
  <div style="clear: both;"></div>
</div> <!-- END header -->

<div id="menu">
  <ul>
    <?php if ($PageTitle != "Login") { ?>
    <li><a href="../.">FIND-A-RIDE SITE</a></li>
    <li><a href="rides-index.php">TRANSPORTATION SERVICES</a></li>
    <li><a href="options-index.php">QUESTIONNAIRE OPTIONS</a></li>
    <?php } ?>
  </ul>
</div> <!-- END menu -->

<div id="content-wrap">
  