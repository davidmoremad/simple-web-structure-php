<?php
error_reporting(E_ALL);

# -------------- GLOBALS --------------
$GLOBALS['errormsg'] = '';

# -------------- LOAD CONF ------------
function getConfig(){
	return parse_ini_file(ROOT_DIR.'conf/config.ini');
}

# ---------- AUTHENTICATION -----------

function &authLoader() {
	if( !isset( $_SESSION[ 'puggy' ] ) ) {
		$_SESSION[ 'puggy' ] = array();
	}
	return $_SESSION['puggy'];
}

function logIn($username, $password) {
	$puggyConf = getConfig();
	if ($username == $puggyConf['wi_user'] & $password == $puggyConf['wi_pass']) {
		$authSession =& authLoader();
		$authSession['puggy'] = $username;
		redirectTo(ROOT_DIR.'/');
	}
	else {
		redirectTo('login.php');
	}
}

function logOut() {
	$authSession =& authLoader();
	unset( $authSession['puggy']);
}

function isLoggedIn() {
	$authSession =& authLoader();
	return isset( $authSession['puggy'] );
}

function currentUser() {
	$authSession =& authLoader();
	return (isset($authSession['puggy']) ? $authSession['puggy'] : '');
}

# ----------- TOKEN SESSION -----------


function newSessionToken(){
	if(isset( $_SESSION['sessiontoken'])){
		destroySessionToken();
	}
	$_SESSION['sessiontoken'] = md5( uniqid() );
}

function destroySessionToken(){
	unset( $_SESSION['sessiontoken']);
}

function checkSessionToken($field_token, $session_token, $redirectUrl){
	if(!isset($field_token) && !isset($session_token) && $field_token !== $session_token){
		redirectTo(ROOT_DIR.$redirectUrl);
	}
}

# -------------- DATABASE --------------

function initDb($puggyConf){
  return mysqli_connect($puggyConf['db_addr'], $puggyConf['db_user'], $puggyConf['db_pass'], $puggyConf['db_name']);
}

function checkDatabaseInstallation(){
	$puggyConf = getConfig();
	if ($puggyConf['db_reqd'] == true) {
		$conn = initDb($puggyConf);
		if (!$conn) {
			redirectError('Could not connect to database. Please, try to <a href="install.php">install</a>.');
		}
		else {
			mysqli_close($conn);
		}
	}
}


# -------------- UTILS --------------

function currentPage() {
	return $_SERVER["PHP_SELF"];
}

function redirectTo($href){
		header( "Location: {$href}" );
	  exit;
}

function redirectError($errid){
	$_SESSION['err'] = array('date' => date("Y-m-d H:i:s"), 'message' => $errid);
	redirectTo('error.php');
}

?>
