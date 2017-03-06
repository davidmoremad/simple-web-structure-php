<?php

session_start();

# Imports and initializations
require_once(ROOT_DIR.'includes/models.php');
require_once(ROOT_DIR.'includes/functions.php');


# Check database
checkDatabaseInstallation();

# Check login
if (!isLoggedIn() && !preg_match('/login(.php)?/', currentPage())) {
  redirectTo(ROOT_DIR.'login.php');
}
else {
}

?>
