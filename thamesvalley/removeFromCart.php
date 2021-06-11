<?php
session_start();
echo print_r($_SESSION['cart']);
$key = $_POST['key'];

unset($_SESSION['cart'][$key]);
echo print_r($_SESSION['cart']);

?>