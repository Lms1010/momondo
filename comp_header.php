<?php
    require_once __DIR__."/_x.php";
    require_once __DIR__."/dictionary.php";
    session_start();
    if (isset($_SESSION['user'])){
        echo '<script>const user = ' . json_encode($_SESSION['user']) . '</script>';
    } else {
        echo '<script>const user = null</script>';
    }
    if(isset($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];
    }
    if(!isset($_SESSION['lang'])) $_SESSION['lang'] = 'en';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title ?></title>
    <link rel="stylesheet" href="app.css">

</head>
<body>
    <a onclick="showTrash()" id="admin_button">Admin</a>
    <div id="overlay"></div>
    <header>
        <div id="logo_container">
            <svg class="svg-image" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 38"><defs><linearGradient id="logos806a" x2="0" y2="100%"><stop offset="0" stop-color="#00d7e5"></stop><stop offset="1" stop-color="#0066ae"></stop></linearGradient><linearGradient id="logos806b" x2="0" y2="100%"><stop offset="0" stop-color="#ff30ae"></stop><stop offset="1" stop-color="#d1003a"></stop></linearGradient><linearGradient id="logos806c" x2="0" y2="100%"><stop offset="0" stop-color="#ffba00"></stop><stop offset="1" stop-color="#f02e00"></stop></linearGradient></defs><path fill="url(#logos806a)" d="M23.2 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 4 0 7.5 1.7 9.9 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.8-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.4-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8z"></path><path fill="url(#logos806b)" d="M103.8 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5H101c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 3.8 0 7.3 1.7 9.7 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.7-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.3-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8zm9.8-.1v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-4.6 3.1-5.9 6.4-5.9 3.3 0 6.4 1.3 6.4 5.9v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-7.4-4.5-13.4-13.4-13.4-8.7 0-13.2 6-13.2 13.4"></path><path fill="url(#logos806c)" d="M218.4 0h-5.9c-.3 0-.5.2-.5.5v13c-1.3-1.2-4.3-2.4-7-2.4-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4c8.7 0 14-5.2 14-14.6V.4c-.1-.2-.3-.4-.6-.4zm-13.5 31.3c-5.2 0-7.3-3-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3 7.3 6.8s-2.2 6.8-7.3 6.8zM236 11.1c-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4 14-5.9 14-13.4c0-7.4-5.3-13.4-14-13.4zm0 20.2c-5.2 0-7.3-3.1-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3.1 7.3 6.8 0 3.8-2.2 6.8-7.3 6.8z"></path></svg>
        </div>
    
        <div id="login_button_container" onclick="<?= isset($_SESSION['user']) ? "signout()" : "displayLogin()" ?>">
            <svg viewBox="0 0 200 200">
                <path fill="#fff" d="M180 100c0-44.1-35.9-80-80-80s-80 35.9-80 80s35.9 80 80 80s80-35.9 80-80zm-80-70c38.6 0 70 31.4 70 70c0 16.3-5.6 31.3-15 43.2c-.5-.7-1-1.4-1.7-2c-3.2-3.1-17.3-7.1-27.3-9.6c9.5-10.2 13.9-25.5 13.9-38.3c0-28.7-13.5-43.3-40-43.3s-40 14.6-40.1 43.3c0 12.8 4.4 28.1 13.9 38.3c-9.9 2.5-24 6.5-27.2 9.5c-.6.6-1.2 1.2-1.7 2C35.6 131.2 30 116.2 30 100c0-38.6 31.4-70 70-70zM52 150.9c.6-1.4 1.1-2.1 1.3-2.4c3.4-2.2 25.1-8 32.5-9.5c4.5-.9 5.5-7 1.4-9.3c-10.4-5.8-17.4-20.5-17.4-36.4C70 70 79 60 100 60c20.7 0 30 10.3 30 33.3c0 15.7-7.2 30.7-17.4 36.4c-4 2.2-3.1 8.3 1.4 9.2c9.6 2.1 29.4 7.4 32.6 9.5c.3.3.8 1.1 1.4 2.4c-27.1 25.5-69 25.6-96 .1z"></path>
            </svg>
            <p><?= isset($_SESSION['user']) ? $dictionary[$_SESSION['lang'].'_sign_out'] : $dictionary[$_SESSION['lang'].'_sign_in']; ?></p>
        </div>
        <div id="languages">
            <a id="lang-dk" href="?lang=dk">&#127465&#127472</a>
            <a id="lang-eng" href="?lang=en">????????</a>
        </div>
    </header>
    <nav>   
        <a onclick="<?= isset($_SESSION['user']) ? "signout()" : "displayLogin()" ?>">
            <svg viewBox="0 0 200 200">
                <path fill="#796489" d="M180 100c0-44.1-35.9-80-80-80s-80 35.9-80 80s35.9 80 80 80s80-35.9 80-80zm-80-70c38.6 0 70 31.4 70 70c0 16.3-5.6 31.3-15 43.2c-.5-.7-1-1.4-1.7-2c-3.2-3.1-17.3-7.1-27.3-9.6c9.5-10.2 13.9-25.5 13.9-38.3c0-28.7-13.5-43.3-40-43.3s-40 14.6-40.1 43.3c0 12.8 4.4 28.1 13.9 38.3c-9.9 2.5-24 6.5-27.2 9.5c-.6.6-1.2 1.2-1.7 2C35.6 131.2 30 116.2 30 100c0-38.6 31.4-70 70-70zM52 150.9c.6-1.4 1.1-2.1 1.3-2.4c3.4-2.2 25.1-8 32.5-9.5c4.5-.9 5.5-7 1.4-9.3c-10.4-5.8-17.4-20.5-17.4-36.4C70 70 79 60 100 60c20.7 0 30 10.3 30 33.3c0 15.7-7.2 30.7-17.4 36.4c-4 2.2-3.1 8.3 1.4 9.2c9.6 2.1 29.4 7.4 32.6 9.5c.3.3.8 1.1 1.4 2.4c-27.1 25.5-69 25.6-96 .1z"></path>
            </svg>
        </a>
        <a href="/flights">
            <svg viewbox="0 0 200 200">
                <path fill="#796489" d="M 140.448 177.069 l -19.846 -43.661 c -2.877 -6.328 -7.998 -11.612 -12.447 -14.676 a 1029.41 1029.41 0 0 1 -14.935 12.983 c -4.045 3.618 -5.452 9.494 -3.67 15.347 l 2.733 8.981 a 4.997 4.997 0 0 1 -1.248 4.991 l -10 10 c -2.267 2.268 -6.043 1.838 -7.754 -0.851 l -14.154 -22.241 l -10.592 10.592 a 5 5 0 1 1 -7.071 -7.07 l 10.593 -10.593 l -22.242 -14.153 c -2.695 -1.716 -3.112 -5.493 -0.851 -7.754 l 10 -10 a 5 5 0 0 1 4.992 -1.248 l 8.981 2.733 c 5.85 1.777 11.728 0.375 15.348 -3.671 c 4.269 -5.007 8.599 -9.988 12.983 -14.935 c -3.063 -4.449 -8.349 -9.571 -14.676 -12.447 L 22.931 59.552 c -3.563 -1.619 -3.965 -6.539 -0.705 -8.712 l 11.53 -7.687 a 15.083 15.083 0 0 1 11.333 -2.213 l 60.319 12.364 c 6.006 1.33 14.836 -3.512 20.984 -9.246 c 6.775 -6.625 13.831 -12.567 25.684 -17.738 c 5.899 -2.573 12.876 -1.07 17.773 3.828 l 0.003 0.002 c 4.898 4.897 6.401 11.874 3.828 17.773 c -5.171 11.853 -11.111 18.909 -17.735 25.682 c -5.736 6.148 -10.583 14.976 -9.266 20.906 l 12.382 60.4 a 15.1 15.1 0 0 1 -2.215 11.332 l -7.687 11.53 c -2.182 3.276 -7.096 2.849 -8.711 -0.704 Z m -24.66 -65.169 c 5.789 4.467 10.925 10.784 13.918 17.369 l 16.123 35.472 l 2.697 -4.045 a 5.034 5.034 0 0 0 0.738 -3.778 L 136.9 96.6 a 19.235 19.235 0 0 1 -0.445 -3.891 a 1041.69 1041.69 0 0 1 -20.667 19.191 Z m -49.416 28.799 l 12 18.857 l 3.471 -3.471 l -1.86 -6.111 c -2.938 -9.652 -0.396 -19.525 6.631 -25.767 l 0.077 -0.066 c 23.665 -20.174 47.419 -42.531 62.016 -57.438 c 6.149 -6.558 10.969 -11.688 15.808 -22.779 c 1.113 -2.552 -0.165 -5.136 -1.733 -6.703 l -0.003 -0.002 c -1.567 -1.568 -4.151 -2.846 -6.704 -1.734 c -10.394 4.535 -15.439 8.933 -22.782 15.811 c -15.335 15.027 -37.539 38.676 -57.433 62.013 l -0.067 0.076 c -6.242 7.028 -16.115 9.567 -25.767 6.631 l -6.111 -1.859 l -3.471 3.471 l 18.858 12 l 7.164 -7.163 a 5 5 0 1 1 7.071 7.07 l -7.165 7.164 Z M 35.258 54.17 l 35.471 16.124 c 6.585 2.993 12.903 8.128 17.37 13.918 a 1045.84 1045.84 0 0 1 19.202 -20.678 a 19.358 19.358 0 0 1 -3.982 -0.452 L 43.081 50.735 a 5.039 5.039 0 0 0 -3.778 0.738 l -4.045 2.697 Z"></path>
            </svg>
        </a>
        <a href="/rooms">
            <svg viewBox="0 0 200 200" >
                <path fill="#796489" d="M175 170a5 5 0 0 1-5-5v-5H30v5a5 5 0 1 1-10 0v-43.092c0-8.176 3.859-15.462 10-20.027V65c0-13.785 11.215-25 25-25h90c13.785 0 25 11.215 25 25v36.98c6.093 4.613 10 11.922 10 19.928V165a5 5 0 0 1-5 5zM30 150h140v-10H30v10zm0-20h140v-8.092c0-7.342-5.486-13.707-12.762-14.806c-40.216-6.077-73.399-6.207-114.477 0C35.415 108.21 30 114.4 30 121.908V130zm120-34.027c2.877.382 9.581 1.381 10 1.467V65c0-8.271-6.729-15-15-15H55c-8.271 0-15 6.729-15 15v32.438c.418-.084 7.123-1.083 10-1.465V85c0-8.271 6.729-15 15-15h25a14.94 14.94 0 0 1 10 3.829A14.943 14.943 0 0 1 110 70h25c8.271 0 15 6.729 15 15v10.973zm-45-3.45c11.463.167 22.988.912 35 2.233V85c0-2.757-2.243-5-5-5h-25c-2.757 0-5 2.243-5 5v7.523zM65 80c-2.757 0-5 2.243-5 5v9.756c12.012-1.321 23.537-2.065 35-2.232V85c0-2.757-2.243-5-5-5H65z"></path>
            </svg>
        </a>
        <a href="/cars">
            <svg viewBox="0 0 200 200" >
                <path fill="#796489" d="M165 160h-10c-7.2 0-13.2-5.1-14.7-11.9c-26.8 2.5-53.9 2.5-80.6 0c-1.5 6.8-7.5 11.9-14.7 11.9H35c-8.3 0-15-6.7-15-15v-43.7c-2.1-.5-4.2-1-6.2-1.5c-2.7-.7-4.3-3.4-3.6-6.1c.7-2.7 3.4-4.3 6.1-3.6c1.6.4 3.2.8 4.7 1.1l12.4-37.7C34.9 49 39.2 45 44.7 44c30-5.3 80.7-5.3 110.6 0c5.5 1 9.8 4.9 11.4 9.7L179 91.4c1.6-.4 3.1-.8 4.7-1.2c2.7-.7 5.4.9 6.1 3.6c.7 2.7-.9 5.4-3.6 6.1c-2.1.5-4.2 1.1-6.3 1.6v43.6c.1 8.2-6.6 14.9-14.9 14.9zm-15-17.4v2.4c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5v-19.2c-11 1.6-26.2 3.5-34.6 4.2c-2.8.2-5.2-1.8-5.4-4.6c-.2-2.8 1.8-5.2 4.6-5.4c8.4-.7 24.6-2.8 35.4-4.3v-12.1c-43.8 8.7-94.9 8.7-140-.1v12.2c10.8 1.6 27 3.7 35.4 4.3c2.8.2 4.8 2.6 4.6 5.4c-.2 2.8-2.6 4.8-5.4 4.6c-8.4-.7-23.6-2.6-34.6-4.2V145c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5v-2.4c0-2.9 2.5-5.3 5.5-5c29.5 3.2 59.4 3.2 88.9 0c3.1-.3 5.6 2.1 5.6 5zM30.8 93.4c44.6 8.9 95.3 8.9 138.5.1l-12-36.7c-.6-1.6-2-2.7-3.6-3c-29-5.1-78.1-5.1-107.2 0c-1.7.3-3.1 1.4-3.6 3L30.8 93.4zm74.4-4c-2.4-1.4-3.2-4.4-1.9-6.8C107.7 74.8 116 70 125 70s17.1 4.7 21.6 12.5c1.4 2.4.6 5.4-1.8 6.8c-2.4 1.4-5.4.6-6.8-1.8c-2.7-4.7-7.6-7.5-13-7.5s-10.3 2.9-12.9 7.5c-1.4 2.4-4.5 3.2-6.9 1.9z"></path>
            </svg>
        </a>
        <a href="/ferries">
            <svg viewBox="0 0 200 200" >
                <path fill="#796489" d="M100 184.55h0a5 5 0 01-3.24-1.22c-29.46-25.18-56-23-68.12-10.32a5 5 0 11-7.22-6.92a38.81 38.81 0 0114.8-9.51c-4.63-14-10.38-27-15.38-34.62a5 5 0 013-7.59A229 229 0 0149 109.94l-8.8-39.3a5 5 0 014.88-6.09h25v-25a5 5 0 015-5h20v-15a5 5 0 1110 0v15h20a5 5 0 015 5v25h25a5 5 0 014.92 6.09L151.21 110a227.19 227.19 0 0125 4.41a5 5 0 013 7.59c-5 7.66-10.75 20.64-15.38 34.62a38.73 38.73 0 0114.8 9.51a5 5 0 01-7.22 6.92c-12.15-12.68-38.66-14.86-68.13 10.33a5 5 0 01-3.25 1.21h0zm-47.62-30.72c12.61 0 27.27 4.5 42.64 15.47l.1-52.32c-22.49.24-44.67 2.12-62.31 5.65a199.08 199.08 0 0113.13 31.6a51.91 51.91 0 016.44-.4zM105.12 117l-.1 52.29c18-12.86 35.13-16.83 49-15a199.22 199.22 0 0113.13-31.61c-6.76-1.35-14.21-2.47-22.09-3.34a5.05 5.05 0 01-1-.11c-12.25-1.38-25.54-2.11-38.94-2.23zm-5-10c14 0 28.06.62 41.12 1.86l7.67-34.31H51.36l7.64 34.3c13.09-1.23 27.09-1.85 41.09-1.85zm-20-42.45h40v-20h-40zm55 30h-10a5 5 0 010-10h10a5 5 0 010 10zm-30 0h-10a5 5 0 010-10h10a5 5 0 010 10zm-30 0h-10a5 5 0 010-10h10a5 5 0 010 10z">
                </path>
            </svg>
        </a>
        <a href="/image">
            <svg  viewBox="0 0 512 512"><path fill="#634c75" d="M152 120c-26.51 0-48 21.49-48 48s21.49 48 48 48s48-21.49 48-48S178.5 120 152 120zM447.1 32h-384C28.65 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM463.1 409.3l-136.8-185.9C323.8 218.8 318.1 216 312 216c-6.113 0-11.82 2.768-15.21 7.379l-106.6 144.1l-37.09-46.1c-3.441-4.279-8.934-6.809-14.77-6.809c-5.842 0-11.33 2.529-14.78 6.809l-75.52 93.81c0-.0293 0 .0293 0 0L47.99 96c0-8.822 7.178-16 16-16h384c8.822 0 16 7.178 16 16V409.3z"/></svg>
        </a>
    </nav>
    <div id="login_container">
        <div id="login_content_container">
            <svg id="logo_login" viewBox="0 0 250 38"><defs><linearGradient id="logos806a" x2="0" y2="100%"><stop offset="0" stop-color="#00d7e5"></stop><stop offset="1" stop-color="#0066ae"></stop></linearGradient><linearGradient id="logos806b" x2="0" y2="100%"><stop offset="0" stop-color="#ff30ae"></stop><stop offset="1" stop-color="#d1003a"></stop></linearGradient><linearGradient id="logos806c" x2="0" y2="100%"><stop offset="0" stop-color="#ffba00"></stop><stop offset="1" stop-color="#f02e00"></stop></linearGradient></defs><path fill="url(#logos806a)" d="M23.2 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 4 0 7.5 1.7 9.9 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.8-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.4-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8z"></path><path fill="url(#logos806b)" d="M103.8 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5H101c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 3.8 0 7.3 1.7 9.7 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.7-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.3-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8zm9.8-.1v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-4.6 3.1-5.9 6.4-5.9 3.3 0 6.4 1.3 6.4 5.9v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-7.4-4.5-13.4-13.4-13.4-8.7 0-13.2 6-13.2 13.4"></path><path fill="url(#logos806c)" d="M218.4 0h-5.9c-.3 0-.5.2-.5.5v13c-1.3-1.2-4.3-2.4-7-2.4-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4c8.7 0 14-5.2 14-14.6V.4c-.1-.2-.3-.4-.6-.4zm-13.5 31.3c-5.2 0-7.3-3-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3 7.3 6.8s-2.2 6.8-7.3 6.8zM236 11.1c-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4 14-5.9 14-13.4c0-7.4-5.3-13.4-14-13.4zm0 20.2c-5.2 0-7.3-3.1-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3.1 7.3 6.8 0 3.8-2.2 6.8-7.3 6.8z"></path></svg>
            <svg id="exit_button" onclick="closeLogin()" class="dDYU-closeIcon dDYU-mod-theme-default"  viewBox="0 0 200 200"><path d="M168.535 168.535a4.998 4.998 0 0 1-7.07 0L100 107.071l-61.464 61.464a5 5 0 1 1-7.071-7.07L92.929 100L31.464 38.536a5 5 0 1 1 7.071-7.071L100 92.929l61.465-61.464a5 5 0 0 1 7.07 7.071L107.071 100l61.464 61.465a4.998 4.998 0 0 1 0 7.07z"></path></svg>
            <img src="/img/loginIMG.svg" alt="loginIMG.svg">
            <form id="form_sign_in" onsubmit='validate(signin); return  false' >
                <input name="user_email" type="text" placeholder="email" data-validate="email">
                <input name="user_password" type="password" placeholder="Password"  data-validate="str" data-min="<?= _USER_PASSWORD_MIN_LEN?>" data-max="<?= _USER_PASSWORD_MAX_LEN?>"> 
                <div id="wrong_user"></div>
                <button type="submit">Sign in</button>
                Not a user yet?
                <button type="button"onclick="displaySignup()">Sign Up</button>
            </form>
            <form id="form_sign_up" action="" onsubmit='validate(signup); return  false' >
                <input name="user_first_name" type="text" placeholder="First Name" data-validate="str" minlength="<?=_USER_FIRST_NAME_MIN_LEN ?>" maxlength="<?=_USER_FIRST_NAME_MAX_LEN ?>"data-min="<?= _USER_FIRST_NAME_MIN_LEN?>" data-max="<?= _USER_FIRST_NAME_MAX_LEN?>">
                <input name="user_last_name" type="text" placeholder="Last name" data-validate="str" minlength="<?=_USER_LAST_NAME_MIN_LEN ?>" maxlength="<?=_USER_LAST_NAME_MAX_LEN ?>"data-min="<?= _USER_LAST_NAME_MIN_LEN?>" data-max="<?= _USER_LAST_NAME_MAX_LEN?>">
                <input name="user_password" type="password" placeholder="Password"  > 
                <input name="user_confirm_password" type="password" placeholder="Confirm password" data-validate="match" data-match-name="user_password"> 
                <input id ="user_email" name="user_email" type="text" placeholder="Email" data-validate="email" onblur="emailInuse()">
                <p id="email_taken">Email in use</p>
                <button>signup</button>
            </form>
        </div>
    </div>