




<?php
  require_once('includes/load.php');
  if(!$session->logout()) {
  	$session->msg("d", "Logged out successfully.");
  	redirect("../index.php");}
?>
