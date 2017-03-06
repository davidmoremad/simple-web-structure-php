<?php
define('ROOT_DIR', '');
require_once(ROOT_DIR.'includes/loader.php');
require_once(ROOT_DIR.'includes/header.php');
?>

<div class="row">
<?php foreach ($vulns as $name => $types) { ?>
  <div class="col-md-3">
    <div class="thumbnail">
      <div class="caption">
        <h3><?php print $name ?></h3>
        <div class="dropdown">
          <button class="btn btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Types
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu btn-block">
              <?php
              foreach ($types as $type) {
                print '<li><a href="/vulns/'.strtolower($name).'_'.strtolower($type).'.php">'.$type.'</a></li>';
              }
             ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>


<?php require_once(ROOT_DIR.'includes/footer.php'); ?>
