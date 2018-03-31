<?php
/*
Name: mysql.inc.php
Desc: Database utilities
 */

// --
// -- Connect to database
// --
function db_connect()
{
  static $connection;

  // connect if connection has not been established
  if (!isset($connection)) {
    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  }

  if ($connection === false) {
    return mysqli_connect_error();
  }

  return $connection;
}

// --
// -- Execute a query
// --
function db_query($query)
{
  $connection = db_connect();
  $result = mysqli_query($connection,$query);

  return $result;
}



// --
// -- Handle database error
// --
function db_error() 
{
  $connection = db_connect();
  return mysqli_error($connection);  
}


// --
// -- Read database
// --
function db_select($query) 
{
  $rows = array();
  $result = db_query($query);

  // return false if query fails
  if ($result === false) {
    return false;
  } 

  // retrieve all rows
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  } 

  return $rows;
}



// --
// -- Save Information from the Contact form
// --
function save_contact_message($email, $comment) {  
  
  // grab the number of characters in the message in case we want to limit the size
  // or split it across multiple database entries by using the 'Sequence' column
  $msize = strlen($comment);
  
  // Explicitly state the column names
  // Will generate an error if the database schema changes
  // If column names are omitted, we have to use 'null' for the first column because it is auto-increment
  $qstring = "INSERT into Communication (TypeEnum, StatusEnum, Sender, Recipient, MsgTime, Sequence, Message) VALUES" .
             "(1, 1, '$email', 'support@sgts.io', SYSDATE(), 0,'$comment')";
  db_query($qstring);
}

?>
