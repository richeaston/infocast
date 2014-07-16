<?php include 'header.php'; ?>

	
<div class="container-fluid">
	<div class="row-fluid">
		<div class="noticecontb">
			<iframe class="noticeitem" src="../notices/signage-scroller.asp?cmd=reset" width="490" height="620" scrolling="no" allowtransparency="true" frameborder="0"></iframe>
		</div>
		<div class="gallerycont">
		<div class="rslides">
		
		<?php	
		
			$folder = 'gallery/test/';
			$imagetype = '*.jpg';
			$mp4type = '*.mp4';
			$avitype = '*.avi';
			
			$imagefiles = glob($folder.$imagetype);
			$mp4files = glob($folder.$mp4type);
			$avifiles = glob($folder.$avitype);
			for ($i=0; $i<count($imagefiles); $i++) {
				echo '<li class="gitem"><img  src="'.$imagefiles[$i].'" /></li>';
			}
			for ($i=0; $i<count($mp4files); $i++) {
				echo '<li class="gitem">';
				echo '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" name="Infocast" align="left">';
				echo '<param name="src" value="'.$mp4files[$i].'">';
				echo '<param name="autoplay" value="true">';
				echo '<param name="controller" value="false">';
				echo '<param name="showControls" value="false">';
				echo '<embed src="'.$mp4files[$i].'" autoplay="true" showControls="false" controller="true"></embed>';
				echo '</object>';
				echo '</li>';
			
			}
			/*
			for ($i=0; $i<count($avifiles); $i++) {
				echo '<li class="gitem">';
				echo '<object classid="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B" codebase="http://www.apple.com/qtactivex/qtplugin.cab" name="Infocast" align="left">';
				echo '<param name="src" value="'.$avifiles[$i].'">';
				echo '<param name="autoplay" value="true">';
				echo '<param name="controller" value="false">';
				echo '<param name="showControls" value="false">';
				echo '<embed src="'.$avifiles[$i].'" autoplay="true" showControls="false" controller="true"></embed>';
				echo '</object>';
				echo '</li>';
			
			}
			*/
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
			

