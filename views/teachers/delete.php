<?php require_once '../../core/includes.php';

$t = new Teacher;
$t->delete();
header("Location: /");
exit();
