<?php require_once '../../core/includes.php';

$t = new Teacher;
$teachers=$t->get_all();

echo json_encode($teachers);
exit();
