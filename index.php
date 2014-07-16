<?php include 'header.php'; ?>

	
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span4 noticecont">
		<iframe src="../notices/Headerless_scroller.asp?cmd=reset" width="500" height="620" scrolling="no" allowtransparency="true" frameborder="0"></iframe>	
		</div>
		<div class="gallerycont">
		<div class="rslides">
		<?php	
			$folder = 'gallery/main/';
			$filetype = '*.jpg';
			$files = glob($folder.$filetype);
			for ($i=0; $i<count($files); $i++) {
				echo '<li class="gitem"><img  src="'.$files[$i].'" /></li>';
				}	
		?>
		
		</div>
		<div class="messagecont">
			<marquee>
			<ul class="msglist">
			<?php
				$file = fopen("msg.txt", "r");
				while(!feof($file)){
					$line = fgets($file);
				echo '<li>' . $line . '</li>';
				}
				fclose($file);
			?>	
			</ul>
			</marquee>
		</div> 
	</div>

</div>
<?php
				$gfile = fopen("flash.txt", "r");
				while(!feof($gfile)){
					$gline = fgets($gfile);
					if ($gline == true) {
						echo '<div class="row-fluid flashmsg"><marquee>';
						echo $gline;
						echo '<marquee></div>';
					}
				}
				fclose($file);
	?>
<button class="destroy" type="button" onclick="self.close()"><i class="icon-off"></i></button>

			<?php include 'footer.php'; ?>
			

