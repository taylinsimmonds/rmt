<?php
class Review extends Db {

    function get_by_id($id){
        $id = (int)$id;
        $sql = "SELECT * FROM reviews WHERE id = '$id'";
        $review = $this->select($sql)[0];
        return $review;
    }

    function get_all_by_teacher_id($teacher_id){

        $user_id = $_SESSION['user_logged_in'];
        $teacher_id = (int)$teacher_id; //teacher id is equal to the integar version of teacher id

        $sql = "SELECT reviews.*
        -- IF(reviews.user_id = '$user_id', 'true', 'false') AS user_owns
        FROM reviews
        LEFT JOIN teachers
        ON  reviews.teacher_id = teachers.id
        LEFT JOIN users
        ON  reviews.user_id = users.id
        WHERE teacher_id = '$teacher_id'
        ORDER BY posted_time DESC LIMIT 5
        "; //Grabs all data from the comments database for each teacher id

        $all_teacher_reviews = $this->select($sql); // all results stored in the $all_project_comments variable

        return $all_teacher_reviews;

    }

    function get_count($teacher_id){
        $teacher_id = (int)$teacher_id; //Type casts it so that only an integar can be used

        $sql = "SELECT COUNT(id) AS review_count FROM reviews WHERE teacher_id = '$teacher_id' ";

        $review_count = $this->select($sql)[0];
        return $review_count['review_count'];
    }


    function add($review_data){

        $rating = $this->data['rating'];
        $description = $this->data['description'];
        $posted_time = time();
        $user_id = (int)$_SESSION['user_logged_in'];
        $teacher_id = $this->data['teacher_id'];

        $sql = "INSERT INTO reviews (rating, description, posted_time, user_id, teacher_id) VALUES('$rating', '$description','$posted_time','$user_id', '$teacher_id')"; //gets all information to send to database

            //Check if inserted successfully
            $review_id = $this->execute_return_id($sql);
            if( !empty($review_id) ){
                if( $review_id != 0 && is_numeric($review_id) ){
                    $review_data['error'] = false;
                }
            }

            // Get review count total
            $review_count = $this->get_count($teacher_id);
            $review_data['review_count'] = $review_count;

            //Return all comments for teacher
            $all_teacher_reviews = $this->get_all_by_teacher_id($teacher_id);
            $review_data['reviews'] = $all_teacher_reviews;

            return $review_data; //return data to be printed on the screen
    }

    function edit($id){

        $id = (int)$id;

        $rating = $this->data['rating'];
        $description = $this->data['description'];
        $current_user_id = (int)$_SESSION['user_logged_in'];

            $sql = "UPDATE reviews SET rating='$rating', description='$description' WHERE id='$id' AND user_id='$current_user_id'";

            $this->execute($sql);

    }

    function delete(){

        $current_user_id = (int)$_SESSION['user_logged_in'];
        $id = (int)$_POST['review_id'];

        $sql = "DELETE FROM reviews WHERE id='$id' AND user_id='$current_user_id'";

        $this->execute($sql);

        exit();

    }
}
