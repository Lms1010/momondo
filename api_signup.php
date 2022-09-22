<?php

require_once __DIR__."/_x.php";


_validate_email();
_validate_user_first_name();
_validate_user_last_name();


$user = [
    'user_first_name'=>$_POST['user_first_name'],
    'user_last_name'=>$_POST['user_last_name'],
    'email'=>'a@a.com',
    'password'=>'password',
];


if($_POST['user_email'] === $user['email']) {
    $error_message = " email already exist. ";
    _respond($error_message, 400);

};

_respond($user);



