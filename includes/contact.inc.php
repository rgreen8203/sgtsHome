<?php 
/* 
  contact.inc.php 
*/

require_once 'header.inc.php';
require_once 'mysql.inc.php';
require_once 'validate.inc.php';

$action = $_SERVER['PHP_SELF'];
  
$email   = '';
$comment = '';
$message = '';
  
if (isset($_POST['submit'])) {
  
  $email   = $_POST['email'];
  $comment = $_POST['comment'];
  
  // validate form
  $errors = validate_contact_form($email, $comment);
  
  // redirect if no errors
  if (count($errors) === 0) {
    save_contact_message($email, $comment);
    echo '<h2>Thank you for your message!</h2>';
    exit();
  }
  
  // Write errors to message area
  $crlf = '';
  foreach ($errors as $line) {
    $message .= $crlf . $line;
    $crlf = '<br>';
  }
}

  
?>
<div class="whichpage">Contact</div>
<div class="wrapper"> 

<form method="post" action="<?php echo $action; ?>">
  <label for="email">Your Email Address</label><br>
  <input type="text" name="email" value="<?php echo $email; ?>" size="70"><br><br>
  <label for="comment">Comment</label><br>
  <textarea rows="3" cols="70" name="comment" ><?php echo $comment; ?></textarea><br><br>
  <input class='button bLarge' type="submit" name="submit" value="Submit" />
  <div><?php echo $message; ?></div>
</form>
  
<?php 
require_once 'footer.inc.php';
?>

</body>
</html>