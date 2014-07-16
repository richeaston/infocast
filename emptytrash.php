<?php
$files = glob('./trash/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
   header( 'Location: admin.php?un=1' ) ;
?>
