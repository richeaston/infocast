<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="Description" content="DMS">
    <meta name="author" content="Richard Easton">
    <meta name="Copyright" content="Richard Easton 2013">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

	</head>
<body>


	<div class="container">
<div class="account-container">
	<div class="content clearfix">
		<a href="admin.php?un=1" class="btn btn-inverse"><i class="icon-arrow-left icon-white"></i>&nbsp;go back</a>
		<?php
					function Write() {
						$file = "./users.txt";
						$fp = fopen($file, "a");
						$pass = hash('sha512', "m@ryh@d@l1ttl3l@mb" . $_POST["password"] ."4ndsh3@ls0h@d4b3@r");
						$data = $_POST["username"] . ":" . $pass .":";
						fwrite($fp, $data . "\n");
						fclose($fp);
					}
				?>

				<?php
				if ($_POST["submit_check"]){
					Write();
				};
				?>      

		
		<form class="" action="add-user.php" method="post">
			<h1 class="loginlogo">Add New User</h1>		
			<div class="login-fields">
				<p>Create user account to access digital signage admin page</p>
				<label for="username"><strong>Username</strong></label>
				<div class="field  input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field">
				</div> <!-- /field -->
				
				<label for="password"><strong>Password</strong></label>
				<div class="field input-prepend" title="Password">
					<span class="add-on"><i class="icon-lock"></i></span>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field">
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			<hr>
			<div class="login-actions inline">
				<div class="btn-group button-login pull-right">	
				<button type="submit" name="submit" class="button btn btn-success"><i class="icon-ok icon-white"></i>&nbsp;Create User</button>
				<input type="hidden" name="submit_check" value="1"></input>
				</div>
			</div>
			<?php
					if ($_POST["submit_check"]){
					echo '<span class="label label-success">user created successfully</span>';
					header( 'Location: admin.php?un=1' ) ;

				};
				?> 
		</form>
	</div> <!-- /content -->
</div>
	
	
<?php include 'footer.php'; ?>

