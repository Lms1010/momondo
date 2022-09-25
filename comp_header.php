<?php
    require_once __DIR__."/_x.php";
    session_start();
    if ($_SESSION){
        echo '<a id="admin_button" href="admin.php">Admin</a>';
    };
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="app.css">

</head>
<body>

    <div id="overlay"></div>
    <header>
        <div id="logo_container">
            <svg class="svg-image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 38"><defs><linearGradient id="logos806a" x2="0" y2="100%"><stop offset="0" stop-color="#00d7e5"></stop><stop offset="1" stop-color="#0066ae"></stop></linearGradient><linearGradient id="logos806b" x2="0" y2="100%"><stop offset="0" stop-color="#ff30ae"></stop><stop offset="1" stop-color="#d1003a"></stop></linearGradient><linearGradient id="logos806c" x2="0" y2="100%"><stop offset="0" stop-color="#ffba00"></stop><stop offset="1" stop-color="#f02e00"></stop></linearGradient></defs><path fill="url(#logos806a)" d="M23.2 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 4 0 7.5 1.7 9.9 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.8-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.4-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8z"></path><path fill="url(#logos806b)" d="M103.8 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5H101c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 3.8 0 7.3 1.7 9.7 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.7-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.3-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8zm9.8-.1v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-4.6 3.1-5.9 6.4-5.9 3.3 0 6.4 1.3 6.4 5.9v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-7.4-4.5-13.4-13.4-13.4-8.7 0-13.2 6-13.2 13.4"></path><path fill="url(#logos806c)" d="M218.4 0h-5.9c-.3 0-.5.2-.5.5v13c-1.3-1.2-4.3-2.4-7-2.4-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4c8.7 0 14-5.2 14-14.6V.4c-.1-.2-.3-.4-.6-.4zm-13.5 31.3c-5.2 0-7.3-3-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3 7.3 6.8s-2.2 6.8-7.3 6.8zM236 11.1c-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4 14-5.9 14-13.4c0-7.4-5.3-13.4-14-13.4zm0 20.2c-5.2 0-7.3-3.1-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3.1 7.3 6.8 0 3.8-2.2 6.8-7.3 6.8z"></path></svg>
        </div>
     
        <a href="">Trips</a>
        <div id="login_button_container" onclick="displayLogin()">
            <svg viewBox="0 0 200 200">
                <path fill="#fff" d="M180 100c0-44.1-35.9-80-80-80s-80 35.9-80 80s35.9 80 80 80s80-35.9 80-80zm-80-70c38.6 0 70 31.4 70 70c0 16.3-5.6 31.3-15 43.2c-.5-.7-1-1.4-1.7-2c-3.2-3.1-17.3-7.1-27.3-9.6c9.5-10.2 13.9-25.5 13.9-38.3c0-28.7-13.5-43.3-40-43.3s-40 14.6-40.1 43.3c0 12.8 4.4 28.1 13.9 38.3c-9.9 2.5-24 6.5-27.2 9.5c-.6.6-1.2 1.2-1.7 2C35.6 131.2 30 116.2 30 100c0-38.6 31.4-70 70-70zM52 150.9c.6-1.4 1.1-2.1 1.3-2.4c3.4-2.2 25.1-8 32.5-9.5c4.5-.9 5.5-7 1.4-9.3c-10.4-5.8-17.4-20.5-17.4-36.4C70 70 79 60 100 60c20.7 0 30 10.3 30 33.3c0 15.7-7.2 30.7-17.4 36.4c-4 2.2-3.1 8.3 1.4 9.2c9.6 2.1 29.4 7.4 32.6 9.5c.3.3.8 1.1 1.4 2.4c-27.1 25.5-69 25.6-96 .1z"></path>
            </svg>
            <p>Sign in</p>
        </div>
        <a href="">Dansk</a>
    </header>

