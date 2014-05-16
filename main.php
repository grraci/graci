<?php
session_start();

if (!isset($_SESSION['user']))
    header('Location: login.php');

?>

<h1> HERRO </h1>
