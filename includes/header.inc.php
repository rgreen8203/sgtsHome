<?php
/* 
  header.inc.php 
*/

  session_start();
  
  require_once 'config.inc.php';
  
  echo "<!DOCTYPE html>\n<html><head>";
  
  $userstr = ' (Guest)';
  
  if (isset($_SESSION['user']))
  {
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = " ($user)";
  } else {
    $loggedin = FALSE;
  }
 ?>
  
  <title>Scott Green</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/styles.css" type="text/css">
  </head><body>
  <script src="../js/javascript.js"></script>
  
  <div class='topmenu'>
    <a href='index.inc.php'>Home</a>
    <a href='about.inc.php' >About</a>
    <a href='contact.inc.php'>Contact</a>
  </div> <!-- end menu -->

