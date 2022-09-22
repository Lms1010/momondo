<?php

require_once __DIR__."/_x.php";

session_start();
_respond(json_encode($_SESSION['user']), 200);