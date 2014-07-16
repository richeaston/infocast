<?php
		$isloggedin = htmlspecialchars($_GET["un"]);
		if ($isloggedin <> "1") {
			echo "<meta http-equiv='refresh' content='0;url=login.php' />";
		}
	?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Digital Signage Admin</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="jquery.uploadify.min.js" type="text/javascript"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="uploadify.css">
<link rel="shortcut icon" href="favicon.ico">
<link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
  	<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
</style>
</head>

<body>

<BR>
<div class="container">
	<div class="row-fluid">
	
	<div class="span10 adminhead">
	<h2 class="mylogo">Digital Signage Admin Page</h2>
	<span class="pull-right muted">by Richard Easton.</span>
	</div>
	</div>	
	<div class="row-fluid">
		<div class="span10 navbarhead">
		<a href="index.php" class="btn btn-inverse" target="_blank"><i class="icon-search icon-white"></i>&nbsp;View Digital Signage Page</a>&nbsp;
		<a href="../notices/noticesadd.asp" class="btn btn-inverse" target="_blank"><i class="icon-plus icon-white"></i>&nbsp;Submit New Notice</a>
		<a href="login.php" class="btn btn-danger pull-right" target="_parent"><i class="icon-off icon-white"></i>&nbsp;Logout</a>
		</div>
	</div>	
	<div class="row-fluid">
	
		<div class="span5">	
			<div class="well">
				<!-- Uploadify section, please refer to uploadify docs -->
				<h4>Upload images to Digital Signage</h4>
				<form>
					<div id="queue"></div>
					<input id="file_upload" name="file_upload" type="file" multiple="true" />
				</form>
			</div>
			<div class="well">
				<h4>Current Marquee Message</h4>
				<?php
					# reads in the msg.txt file into the textarea (tekst)
					# update targets the admin.php page to update by function
					function Read() {
					$file = "./msg.txt";
					echo file_get_contents( $file);
					}

					function Write() {
						$file = "./msg.txt";
						$fp = fopen($file, "w");
						$data = $_POST["tekst"];
						fwrite($fp, $data);
						fclose($fp);
					}
				?>

				<?php
				if ($_POST["submit_check"]){
					Write();
				};
				?>      

				<form action="admin.php?un=1" method="post">
				<textarea rows="6" class="input-block-level" name="tekst"><?php Read(); ?></textarea><br>
				<button class="btn btn-primary" type="submit" name="submit"><i class="icon-pencil icon-white"></i>&nbsp;Update Standard Message</button>
				<input type="hidden" name="submit_check" value="1">
				</form>

                <?php
					if ($_POST["submit_check"]){
					echo '<span class="label label-success"><i class="icon-ok icon-white"></i>&nbsp;Message updated successfully</span>';
				};
				?> 
				
			</div>
			<div class="well">
			<h4>Quick Message</h4>
				<?php
					# reads in the flash.txt file into the textarea (flash)
					# update targets the admin.php page to update by function
					# when this file is empty nothing will be shown
									
					function gRead() {
					$gfile = "./flash.txt";
					echo file_get_contents( $gfile);
					}

					function gWrite() {
						$gfile = "./flash.txt";
						$gfp = fopen($gfile, "w");
						$gdata = $_POST["flash"];
						fwrite($gfp, $gdata);
						fclose($gfp);
					}
				?>

				<?php
				if ($_POST["gsubmit_check"]){
					gWrite();
				};
				?>      

				<form action="admin.php?un=1" method="post">
				<textarea rows="6" class="input-block-level" name="flash"><?php gRead(); ?></textarea><br>
				<button class="btn btn-primary" type="submit" name="submit"><i class="icon-pencil icon-white"></i>&nbsp;Updated Quick Message</button>
				<input type="hidden" name="gsubmit_check" value="1">
				</form>
				<?php
					if ($_POST["gsubmit_check"]){
					echo '<span class="label label-success"><i class="icon-ok icon-white"></i>&nbsp;Message updated successfully</span>';
				};
				?> 
			</div>
			<div class="well">
			<h4>User Accounts</h4>
				<table class="table table-bordered table-condensed table-stripped">
					<thead>
					<th class="tabfoot">Username</th><th class="tabfoot">Account Control</th>
					</thead>
				<?php
				# reads in the users.txt file into an array $line[0] show username, $line[1] is the password (hashed)
				# update targets the add_user.php page to update, then redirect back to admin.php
				# need to code in delete and edit functions
				$file = fopen("./users.txt", "r");
				$lnum = 0;
				while(!feof($file)){
					$line = fgets($file);
					if ($line <> "") {
						$user = explode(":", $line);
						echo '<tr><td>' . $user[0] . '</td><td><a href="deleteusr.php?u=' . $user[0] . '"><i class="icon-remove"></i></a></td></tr>';
					}
					$lnum++;
				
				}
					
				fclose($file);
				?>
				</table>	
				<a href="add-user.php" class="btn btn-success"><i class="icon-plus icon-white"></i>&nbsp;Add New User</a>

			</div>
		</div>
		
		<div class="span5">
			<table class="table table-bordered table-condensed table-striped">
				<thead>
					<th class="tabfoot"><strong>Image Name</strong></th>
					<th class="tabfoot"><i class="icon-cog icon-white"></i></th>
				</thead>
				<?php
					# reads all jpg's from folder path ($p) and puts them into a table
					# trash can icon, moves that photo into trash
					# can be restored back to gallery folder from trash
				  $gcount = 0;
				  $path = './Gallery/Main';
				  if ($handle = opendir('./Gallery/Main')) {
			      while (false !== ($entry = readdir($handle))) {
				  if ($entry != "." && $entry != ".." && $entry != "Thumbs.db" ) {
				  echo '<tr><td><img src="./Gallery/Main/' . $entry . '" class="galimg"><br/>'. $entry . '</td><td><a href="movetrash.php?f=' . $entry . '" data-toggle="tooltip" data-placement="right" title="Delete ' . $entry . ' to Trash Can."><i class="icon-trash"></i></a></td></tr>';
				  $gcount++;
				  }
    		   }
			   closedir($handle);
			 }
			echo '<tr><td class="tabfoot" colspan="2"><strong>Number of Images:</strong> <span class="tabfootcount">' . $gcount . '</span></td></tr>';
			?>
				
			</table>
			<table class="table table-bordered table-condensed table-striped">
				<thead>
					<th class="tabfoot"><strong>Images in Trash Can <a href="emptytrash.php?un=1"><i class="icon-trash icon-white"></i></a></strong></th>
					<th class="tabfoot"><i class="icon-share icon-white"></i></th>
				</thead>
				<?php
			  	  $tcount = 0;
				  $path = './trash';
				  if ($handle = opendir('./trash')) {
			      while (false !== ($entry = readdir($handle))) {
				  if ($entry != "." && $entry != ".." && $entry != "Thumbs.db" ) {
				  echo '<tr><td><img src="./trash/' . $entry . '" class="galimg"><br/>'. $entry . '</td><td><a href="restore.php?f=' . $entry . '" data-toggle="tooltip" data-placement="right" title="Restore ' . $entry . ' to Gallery."><i class="icon-share"></i></a></td></tr>';
				  $tcount++;
				  }
    		   }
			   closedir($handle);
			 }
			echo '<tr><td class="tabfoot" colspan="2"><strong>Number of Images:</strong> <span class="tabfootcount">' . $tcount . '</span></td></tr>';
			?>
				
			</table>
		</div>		
</div>
</div>
<script type="text/javascript">

</script>


	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'buttonText' : '<i class="icon-upload icon-white"></i> Select Image(s)',
				'checkExisting' : 'check-exists.php',
				'progressData' : 'speed',
				'swf'      : 'uploadify.swf',
				'uploader' : 'uploadify.php',
				'onQueueComplete' : function(queueData) {
						//alert(queueData.uploadsSuccessful + ' files were successfully uploaded.');
						location.reload();
					}
			});
		});
	</script>
</body>
</html>