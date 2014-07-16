<?php
	$usr = $_GET['u'];
	$file = './users.txt';
	$lines = file($file);
    $pattern = '/' . $usr. '/im';
	$rows=array();
	$gfp = fopen($file, "w");
	fwrite($gfp, "");
foreach ($lines as $key => $value) {
    if (!preg_match($pattern, $value)) {
        $rows[] = $value;
		fwrite($gfp, $value );
	}
}
fclose($gfp);

header( 'Location: admin.php?un=1' ) ;
?>
