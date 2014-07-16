<?php
$user = $_POST["username"];
$pass = $_POST["password"];
$pass = hash('sha512', "m@ryh@d@l1ttl3l@mb" . $pass ."4ndsh3@ls0h@d4b3@r");
$un = 0;
				//read the users file
				$file = fopen("./users.txt", "r");
				while(!feof($file)){
					$line = fgets($file);
					$line = explode(":", $line);
					$usr = $line[0];
					$pw = $line[1];
					if ($user == $usr) {
						if ($pass === $pw) {
						$un = 1;
					
						header( 'Location: admin.php?un=' .$un. '&usr=' .$user) ;
						}
					}
				}
				fclose($file);
if ($un == 0) 
{
include 'header.php';
echo "<div class='row-fluid '>";
echo "<div class='account-container'>";
echo "<strong>Username Not Found!</strong>";
echo "</div>";
echo "</div>";
echo "<meta http-equiv='refresh' content='3;url=login.php' />";
	  include 'footer.php'; 
}				
?>