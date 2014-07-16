<?php include 'pres-header.php'; ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="prescont">
		<div class="rslides">
		<?php	
			$folder = 'gallery/pres/';
			$filetype = '*.jpg';
			$files = glob($folder.$filetype);
			for ($i=0; $i<count($files); $i++) {
				echo '<li id="background" class="pitem"><img src="'.$files[$i].'" /></li>';
				}	
		?>
		</div>
		</div>
		<BR/><BR/>
		<div class="pmessagecont">
			<marquee>
			<ul class="msglist">
			<?php
				$file = fopen("pmsg.txt", "r");
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
			<?php include 'footer.php'; ?>
			