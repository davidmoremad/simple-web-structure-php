<?php
define('ROOT_DIR', '');
require_once(ROOT_DIR.'includes/functions.php');
require_once(ROOT_DIR.'includes/partials/header.php');
session_start();
?>

<?php
if (isLoggedIn()) {
    redirectTo(ROOT_DIR.'index.php');
}
else {
  if (isset($_POST['install'])){
    # Validate CSRF Token
    checkSessionToken($_REQUEST['tokenfield'], $_SESSION['sessiontoken'], '/install.php');
    $fh['db_addr'] = htmlspecialchars($_POST['dbaddr']);
    $fh['db_port'] = htmlspecialchars($_POST['dbport']);
    $fh['db_user'] = htmlspecialchars($_POST['dbuser']);
    $fh['db_pass'] = htmlspecialchars($_POST['dbpass']);
    $fh['db_name'] = htmlspecialchars($_POST['dbname']);
    $fh['wi_user'] = htmlspecialchars($_POST['wiuser']);
    $fh['wi_pass'] = htmlspecialchars($_POST['wipass']);
    include_once(ROOT_DIR.'includes/mysql_init.php');
  }
  else {
    # New CSRF token
    newSessionToken();
  }
}
?>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({ trigger: "hover", html:true });
});
</script>
<div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6">
    <div class="row caption">
      <h3>Installation</h3>
      <?php echo isset($_SESSION['err_setup']) ? $_SESSION['err_setup'] : ''; unset($_SESSION['err_setup']); ?>
      <p class="alert alert-warning">
        Puggy is a vulnerable web application to exploit common vulnerabilities.<br>
        <b>Please, do not run this script in a production server.</b>
      </p>
    </div>
    <form class="form" action="install.php" method="post">


      <div class="row">
        <div class="col-md-6" style="padding-right:5%;">
          <div class="form-horizontal">
            <div class="form-group">
              <label><span style="color: #ccc;" class="fa fa-question-circle fa-lg" data-toggle="popover" data-placement="bottom" data-title="<b>Default</b>: <i>pug</i>" data-content="The user with which you will authenticate on the website."></span> Login user</label>
              <input type="text" class="form-control" autocomplete="off" name="wiuser" value="pug" required>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-horizontal">
            <div class="form-group">
              <label><span style="color: #ccc;" class="fa fa-question-circle fa-lg" data-toggle="popover" data-placement="bottom" data-title="<b>Default</b>: <i>pug</i>" data-content="The password associated with the user indicated above."></span> Login password</label>
              <input type="text" class="form-control" autocomplete="off" name="wipass" value="pug" required>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-md-5" style="padding-right:5%;">
          <div class="form-horizontal">
            <div class="form-group">
              <label><span style="color: #ccc;" class="fa fa-question-circle fa-lg" data-toggle="popover" data-placement="bottom" data-content="The host where the server is running. The default value is localhost."></span> DB address</label>
              <input type="text" class="form-control" autocomplete="off" name="dbaddr" value="localhost" required>
            </div>
          </div>
        </div>
        <div class="col-md-2" style="padding-right:5%;">
          <div class="form-horizontal">
            <div class="form-group">
              <label><span style="color: #ccc;" class="fa fa-question-circle fa-lg" data-toggle="popover" data-placement="bottom" data-content="The port number to use for the connection, for connections made using TCP/IP. The default port number is 3306."></span> DB port</label>
              <input type="number" class="form-control" autocomplete="off" name="dbport" value="3306">
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-horizontal">
            <div class="form-group">
              <label><span style="color: #ccc;" class="fa fa-question-circle fa-lg" data-toggle="popover" data-placement="bottom" data-content="The name of the MYSQL database you want to create. The default value is puggy."></span> DB name</label>
              <input type="text" class="form-control" autocomplete="off" name="dbname" value="puggy" required>
              <input type="hidden" name="tokenfield" value="<?php echo $_SESSION['sessiontoken']; ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6" style="padding-right:5%;">
          <div class="form-horizontal">
            <div class="form-group">
              <label><span style="color: #ccc;" class="fa fa-question-circle fa-lg" data-toggle="popover" data-placement="bottom" data-content="The user name of the MySQL account you want to use. The default user name is ODBC on Windows or your Unix login name on Unix."></span> DB user</label>
              <input type="text" class="form-control" autocomplete="off" name="dbuser" placeholder="root" required>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-horizontal">
            <div class="form-group">
              <label><span style="color: #ccc;" class="fa fa-question-circle fa-lg" data-toggle="popover" data-placement="bottom" data-content="The password of the MySQL account. As described earlier, the password value is optional, but if given, there must be no space between -p or --password= and the password following it. The default is to send no password."></span> DB password</label>
              <input type="password" class="form-control" autocomplete="off" name="dbpass" placeholder="None">
            </div>
          </div>
        </div>
      </div>


    </form>
  </div>
  <div class="col-md-3"></div>
</div>



<?php require_once('includes/partials/footer.php'); ?>
