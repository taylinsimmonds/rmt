<?php require_once '../../core/includes.php';
// header("Content-Type: application/json");

    // Add new review to Db
    $r = new Review;
    $review_data = $r->add($review_data);

echo json_encode($review_data);
die();
