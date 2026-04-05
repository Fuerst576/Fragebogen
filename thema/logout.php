<?php
session_start();

$_SESSION = array();

// Session zerstören
session_unset();
session_destroy();

header('Location: ../index.php');