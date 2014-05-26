<?php

$form_message = $_GET['message'];
$form_user = $_GET['username'];
$form_password = $_GET['password'];

$user="betsuser";
$password="betspassword";
$database="twitter1";
mysql_connect(localhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

// check the user
$query="select * from users where user='".$form_user ."' and password='".$form_password."'";
$result = mysql_query($query);
$num = mysql_num_rows($result);
if ($num > 0) {
  $row = mysql_fetch_array($result);
  $query="insert into tweets (message, user_id) values('" . $form_message . "'," . $row['id'] . ")";
  $result = mysql_query($query);
  echo "message posted!";
} else {
  echo "invalid user!";
}
mysql_close();

?>
