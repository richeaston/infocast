<?php
$old = './Gallery/Main/' . htmlspecialchars($_GET["f"]);
$new = 'trash/' . htmlspecialchars($_GET["f"]);
copy($old , $new) or die("Unable to copy $old to $new.");

if (copy($old,$new)) {
  unlink($old);
}
?>
<?php
   header( 'Location: admin.php?un=1' );
?>
