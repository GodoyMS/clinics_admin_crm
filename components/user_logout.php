<?php


include 'connect.php';

session_start();
session_unset();
session_destroy();

header('../clinicas/index.php');

?>