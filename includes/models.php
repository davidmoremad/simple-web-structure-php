<?php

# Vulns
$vulns = array(
  'SQLi' => array( 'GET', 'POST', 'BLIND'),
  'XSS' => array( 'GET', 'POST'),
  'HTMLi' => array( 'GET', 'POST'),
  'LFI' => array( 'GET', 'POST'),
  'RFI' => array( 'GET', 'POST'),
  'CSRF' => array( 'GET', 'POST'),
  'PHP Eval' => array( 'GET', 'POST')
);

# Errors
$errmsg = array(
  'dbcon' => 'Could not connect to database'
);


 ?>
