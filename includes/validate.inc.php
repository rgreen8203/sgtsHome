<?php
/* 
 * validate.inc.php
 */

function not_long_enough($text, $minSize) {
  
  if ( strlen($text) < $minSize ) {
    return true;
  } else {
    return false;
  }
}


function validate_contact_form($email, $comment) {
  $messages = array();
   
   if ( empty($email) ) {
     $messages[] = "email is required";
   } else {
     if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
       $messages[] = "Email appears to be invalid";       
     }     
   }
   
   if ( empty($comment) ) {
     $messages[] = "comment is required";
   } else {
     if ( not_long_enough($comment,5) ) {
       $messages[] = "Please expand your comment";       
     }     
   }  
   
   return $messages;
}

?>