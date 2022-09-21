<?php
define('_FROM_FLIGHT_MIN_LEN', 3);
define('_FROM_FLIGHT_MAX_LEN', 20);
define('_TO_FLIGHT_MIN_LEN', 3);
define('_TO_FLIGHT_MAX_LEN', 20);


define('_USER_FIRST_NAME_MIN_LEN', 2);
define('_USER_FIRST_NAME_MAX_LEN', 15);
define('_USER_LAST_NAME_MIN_LEN', 2);
define('_USER_LAST_NAME_MAX_LEN', 15);

define('_USER_PASSWORD_MIN_LEN', 8);
define('_USER_PASSWORD_MAX_LEN', 15);


define('_REGEX_EMAIL', '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/');

function _validate_user_first_name() {
    $error_message = 'first name must between '._USER_FIRST_NAME_MIN_LEN.'-'._USER_FIRST_NAME_MAX_LEN.' characters long';
    if ( ! isset($_POST['user_first_name']) ){ _respond($error_message, 400); }
    $_POST['user_first_name'] = trim($_POST['user_first_name']);
    if (strlen($_POST['user_first_name']) < _USER_FIRST_NAME_MIN_LEN) {_respond($error_message, 400);}
    if (strlen($_POST['user_first_name']) > _USER_FIRST_NAME_MAX_LEN) {_respond($error_message, 400);}
    return $_POST['user_first_name'];

};
function _validate_user_last_name() {
    $error_message = 'last name must between '._USER_FIRST_NAME_MIN_LEN.'-'._USER_FIRST_NAME_MAX_LEN.' characters long';
    if ( ! isset($_POST['user_last_name']) ){ _respond($error_message, 400); }
    $_POST['user_last_name'] = trim($_POST['user_last_name']);
    if (strlen($_POST['user_last_name']) < _USER_FIRST_NAME_MIN_LEN) {_respond($error_message, 400);}
    if (strlen($_POST['user_last_name']) > _USER_FIRST_NAME_MAX_LEN) {_respond($error_message, 400);}
    return $_POST['user_last_name'];

};

function _validate_email () {
    $error_message = 'email not valid';
    if ( !isset($_POST['user_email'])) {_respond($error_message, 400);}
    $_POST['user_email'] = trim($_POST['user_email']);
    if ( ! preg_match(_REGEX_EMAIL, $_POST['user_email'])){_respond($error_message,400);}
    return $_POST['user_email'];
}

function _validate_password() {
    $error_message = 'password not valid';
    if (!isset($_POST['user_password'])) {_respond($error_message,400);}
    if (strlen($_POST['user_password']) < _USER_PASSWORD_MIN_LEN ) {_respond($error_message, 400);}
    if (strlen($_POST['user_password']) > _USER_PASSWORD_MAX_LEN) {_respond($error_message, 400);}
    return $_POST['user_password'];
}



function _respond($message = '', $http_response_code = 200) {
    header('Content-Type: application/json');
    http_response_code($http_response_code);
    $response = is_array($message) ? $message : ['info'=>$message];
    echo json_encode($response);
    exit();

}