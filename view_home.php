<?php
    require_once __DIR__."/_x.php"
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
    <header>
        <div id="logo_container">
            <img src="/Momondo-Logo.wine.svg" alt="Momondo">     
        </div>
     
        <a href="">Trips</a>
        <a href="/login">Login</a>
        <a href="">Dansk</a>
    </header>
    <nav>   
        <a href="/login">Login</a>
        <a href="">Login</a>
        <a href="">Login</a>
        <a href="">Login</a>
        <a href="">Login</a>
    </nav>
    <form>
        <div id="from_container">
                <input id="from_city"
                name="from_city" 
                type="text" 
                placeholder="From" 
                maxlength= <?= _FROM_FLIGHT_MAX_LEN?>
                minlength= <?= _FROM_FLIGHT_MIN_LEN?>
                oninput="showResultFrom()"
                >

                <div id="from_result" ></div>

        </div>
        <div id="to_container">
                <input id="to_city"
                name="to_city" 
                type="text" 
                placeholder="To" 
                maxlength= <?= _TO_FLIGHT_MAX_LEN?>
                minlength= <?= _TO_FLIGHT_MIN_LEN?>
                oninput="showResultTo()"
                >
                <div id="to_result" ></div>
        </div>
    </form>
    <footer>
        footer
    </footer>
    <script src="app.js"></script>
</body>
</html>