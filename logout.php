<?php

require_once __DIR__ . "/config.php";

unset($_SESSION['id']);

session_destroy();

header("Location: login.php");
exit;