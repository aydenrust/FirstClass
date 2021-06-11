<?php
session_start();

include "planner.php";


//$p = new planner($_POST['size'], $_POST['age'], $_POST['lang'], $_POST['quantity'], $_POST['ruler'], $_POST['pocket'], $_POST['cover'], $_POST['total']);

$planner = array(
size=>$_POST['size'],
age=>$_POST['age'],
lang=>$_POST['lang'],
quantity=>$_POST['quantity'],
ruler=>$_POST['ruler'],
pocket=>$_POST['pocket'],
bully=>$_POST['bully'],
green=>$_POST['green'],
nutrition=>$_POST['nutrition'],
cover=>$_POST['cover'],
pgs=>$_POST['pgs'],
total=>$_POST['total'],
schoolboardpgs=>$_POST['schoolboardpgs']
);

array_push($_SESSION['cart'], $planner);



//echo print_r($_SESSION['cart']);
