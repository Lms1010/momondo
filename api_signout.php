<?php

require_once __DIR__."/_x.php";

session_start();
unset($_SESSION['user']);

_respond("successfully logged out", 200);