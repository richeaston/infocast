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
		<form class="" action="process.php" method="post">
			<h1 class="loginlogo">Digital Signage</h1>		
			<div class="login-fields">
				<p>Sign in using your registered account:</p>
				<label for="username">Username</label>
				<div class="field  input-prepend">
					<span class="add-on"><i class="icon-user"></i></span>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field">
				</div> <!-- /field -->
				
				<label for="password">Password</label>
				<div class="field input-prepend" title="Password">
					<span class="add-on"><i class="icon-lock"></i></span>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field">
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			<hr>
			<div class="login-actions inline">
				<div class="btn-group button-login pull-right">	
							<button type="submit" class="button btn btn-warning"><i class="icon-off icon-white"></i>&nbsp;Sign In</button>
				</div>
			</div> <!-- .actions -->
		</form>
	</div> <!-- /content -->
</div>
	
	
<?php include 'footer.php'; ?>

