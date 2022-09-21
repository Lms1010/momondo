<?php

require_once __DIR__."/_x.php";



_validate_email();
_validate_password();

$user = [
    'user_name'=>'Adminos',
    'email'=>'a@a.com',
    'password'=>'password',
];


if($_POST['user_email'] != $user['email'] || $_POST['user_password'] != $user['password'] ) {
    $error_message = " email or password not correct";
    _respond($error_message, 400);

};


session_start();
$_SESSION['user'] = $user;
header('Location: view_home.php');



echo json_encode(["info"=>"you have logged in"]);
