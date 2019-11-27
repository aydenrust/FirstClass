<?php
session_start();
echo print_r($_POST);
$key = $_POST['key'];

unset($_SESSION['cart'][$key]);
echo print_r($_POST);

?>