<?php
define('_FROM_FLIGHT_MIN_LEN', 3);
define('_FROM_FLIGHT_MAX_LEN', 20);
define('_TO_FLIGHT_MIN_LEN', 3);
define('_TO_FLIGHT_MAX_LEN', 20);


define('_USER_FIRST_NAME_MIN_LEN', 3);
define('_USER_LAST_NAME_MAX_LEN', 15);

define('_REGEX_EMAIL', '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/');

function _validate_user_name() {
    $error_message = 'user name must between '._USER_FIRST_NAME_MIN_LEN.'-'._USER_LAST_NAME_MAX_LEN.' characters long';
    if ( ! isset($_POST['user_name']) ){ _respond($error_message, 400); }
    $_POST['user_name'] = trim($_POST['user_name']);
    if (strlen($_POST['user_name']) < _USER_FIRST_NAME_MIN_LEN) {_respond($error_message, 400);}
    if (strlen($_POST['user_name']) > _USER_FIRST_NAME_MAX_LEN) {_respond($error_message, 400);}
    return $_POST['user_name'];

};

function _validate_email () {
    $error_message = 'email not valid';
    if ( !isset($_POST['email'])) {_respond($error_message, 400);}
    $_POST['email'] = trim($_POST['email']);
    if ( ! preg_match(_REGEX_EMAIL, $_POST['email'])){_respond($error_message,400);}
    return $_POST['email'];
}

// function _valiedate_user_

function _respond($message = '', $http_response_code = 200) {
    header('Content-Type: application/json');
    http_response_code($http_response_code);
    $response = is_array($message) ? $message : ['info'=>$message];
    echo json_encode($response);
    exit();

}