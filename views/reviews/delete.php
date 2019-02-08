<?php

require_once '../../core/includes.php';

$review_data = array(
    "error" => true
);

 if( !empty ($_POST['review_id']) ){
     
     $r = new Review;
     $r->delete();

 }

 die();
