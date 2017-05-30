<?php
define('ROOT_DIR', '');
require_once(ROOT_DIR.'includes/loader.php');
require_once(ROOT_DIR.'includes/partials/header.php');
?>

<?php
  if (isLoggedIn()) {
    logOut();
    redirectTo(ROOT_DIR.'index.php');
  }
  else {
      redirectTo(ROOT_DIR.'index.php');
  }
?>



<?php require_once(ROOT_DIR.'includes/partials/footer.php'); ?>
