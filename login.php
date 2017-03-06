<?php
define('ROOT_DIR', '');
require_once(ROOT_DIR.'includes/loader.php');
require_once(ROOT_DIR.'includes/header.php');
?>

<?php
if (isLoggedIn()) {
    redirectTo(ROOT_DIR.'.');
}
else {
  if (isset($_POST['login'])){
    checkSessionToken($_REQUEST['tokenfield'], $_SESSION['sessiontoken'], '/login.php');
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    var_dump($username);
    var_dump($password);
    logIn($username,$password);
  }
  else {
    newSessionToken();
    showLoginForm();
  }
}
?>

<?php
  function showLoginForm(){ ?>
    <div class="row">
      <div class="col-xs-4"></div>
      <div class="col-xs-4 caption">
        <h3><center>Login</center></h3>
        <form class="form" action="login.php" method="post">
          <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Nick Jagger" autocomplete="off" autofocus="true">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="1234?" autocomplete="off">
          </div>
          <input type="hidden" name="tokenfield" value="<?php echo $_SESSION['sessiontoken']; ?>">
          <button type="submit" role="button" name="login" class="btn btn-primary btn-block">Enter</button>
        </form>
      </div>
      <div class="col-xs-4"></div>
    </div>
  <?php }
?>


<?php require_once(ROOT_DIR.'includes/footer.php'); ?>
