<!-- Program Header:
 - Name: Benjamin Li
 - Student ID: 1000919426
 - Class and Section: CSE 4392-002
 - Project Assignment#: 6
 - Assignment Due: December 1, 2015 @ 11:59 pm
 
 Programmers Notes:
 - Access phpMyAdmin by "localhost:(port#)" which is the local apache home page.
-->
<?php session_start();?>

<html>
<head><title>Message Board</title></head>
<body>

<?php
$username = $_GET['username'];
$password = $_GET['password'];
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

try 
{
  $dbh = new PDO("mysql:host=127.0.0.1:3306;dbname=board","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  //print_r($dbh);  PDO Object();
  
  $dbh->beginTransaction();
  $dbh->exec('delete from users where username="smith"');
  $dbh->exec('insert into users values("smith","' . md5("mypass") . '","John Smith","smith@cse.uta.edu")')
        or die(print_r($dbh->errorInfo(), true));		
  $dbh->commit();

  //$stmt = $dbh->prepare('select * from posts');
  
  $stmt = $dbh->prepare('select * from users');
  $stmt->execute();
  print "<pre>";
  while ($row = $stmt->fetch())
  {
    print_r($row);
  }
  print "</pre>";
} 
catch (PDOException $e)
{
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}
?>
<p> Message: </p>
<textarea id="message" rows="3" cols="60"></textarea>

<p> List of Messages: </p>
<div id="MessagePrintOut">
  <?php
    print("<p> Username: </p>");
    echo $username;
	print("<p> Password: </p>");
	echo $password;
	print("<p> Hashed Password: </p>");
    echo md5($password);
  ?>
</div>

<form action="http://localhost:8080/project6/board.php">
  <p> <input type="submit" name="Post" value="Post"/> </p> 
</form>

<form action="http://localhost:8080/project6/login.php">
  <p> <input type="submit" name="Logout" value="Logout"/> </p> 
</form>

</body>
</html>

