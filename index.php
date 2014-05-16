<?php
session_start();

if (isset($_SESSION['user']))
    header('Location: main.php');
else
    header('Location: login.php');

