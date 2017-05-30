<?php
define('ROOT_DIR', '');
session_start();
require_once(ROOT_DIR.'includes/functions.php');
require_once(ROOT_DIR.'includes/partials/header.php');
?>


<?php
$pErrorMsg = $_SESSION['err'];
if ($pErrorMsg) {
  $errorMessage =  $pErrorMsg['date'].' - '.$pErrorMsg['message'];
}
else {
  $errorMessage = 'Unknown error. <a href="https://github.com/David-Amrani-Hernandez/fith/issues/new" target="_blank">Open issue on github.</a>';
}
?>

<h2>Error</h2>
<p class="alert alert-danger"><?php echo $errorMessage ?></p>


<?php require_once(ROOT_DIR.'includes/partials/footer.php');?>
