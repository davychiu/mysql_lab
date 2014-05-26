<html>
<head>
  <title>BETS Twitter</title>
</head>
<body>
<h1>BETS Twitter</h1>
<form method="get" action="post.php">
  <textarea name="message" cols="40" rows="3"></textarea><br>
  user: <input type="text" name="username">
  pass: <input type="password" name="password"><br>
  <input type="submit" value="post">
</form>

<?php
$user="betsuser";
$password="betspassword";
$database="twitter1";
mysql_connect(localhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT tweets.id, message, user from tweets join users where user_id=users.id";
$result = mysql_query($query);

while ($row = mysql_fetch_array($result)) {
?>
<div><?php echo $row['message']; ?> by <?php echo $row['user']; ?></div>
<?php
}
mysql_close();
?>
</body>
</html>

