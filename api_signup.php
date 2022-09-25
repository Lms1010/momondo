<?php

require_once __DIR__."/_x.php";


_validate_email();
_validate_user_first_name();
_validate_user_last_name();
_validate_password();


$user = [
    'user_name'=> $_POST['user_first_name'],
    'email'=>'a@a.com',
    'password'=>'password',
];

if ($_POST['user_confirm_password'] != $_POST['user_password']){
    $error_message = " password does not match ";
    _respond($error_message, 400);
}


// if($_POST['user_email'] === $user['email']) {
//     $error_message = " email already exist";
//     _respond($error_message, 400);
// };

_respond($user);



