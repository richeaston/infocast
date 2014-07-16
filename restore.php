<?php
$old = './trash/' . htmlspecialchars($_GET["f"]);
$new = './Gallery/Main/' . htmlspecialchars($_GET["f"]);
copy($old , $new) or die("Unable to copy $old to $new.");

if (copy($old,$new)) {
  unlink($old);
}
?>
<?php
   header( 'Location: admin.php?un=1' ) ;
?>
