<?php

class Teacher extends Db {

    function get_all(){

        // $user_id = (int)$_SESSION['user_logged_in'];

        if( !empty($_POST['search']) ){ // They're searching something

            $search = $this->data['search'];

            $sql = "SELECT
            teachers.*
            FROM teachers
            WHERE teachers.firstname
            LIKE '%$search%'
            OR CONCAT(teachers.firstname, ' ', teachers.lastname)
            LIKE '%$search%'";

        }else{ // They're not searching
            $sql = "SELECT
            teachers.*
            FROM teachers";
        }

        $teachers = $this->select($sql);

        foreach( $teachers as $key => $teacher ){

            $r = new Review;
            $reviews = $r->get_all_by_teacher_id($teacher['id']);
            $teachers[$key]['reviews'] = $reviews;

        }

        return $teachers;

    }

    function get_by_id($id){

        $id = (int)$id;

        $sql = "SELECT * FROM teachers WHERE id = '$id'";

        $teacher = $this->select($sql)[0];

        return $teacher;

    }

    function add(){

        $firstname = $this->data['firstname'];
        $lastname = $this->data['lastname'];
        $program = $this->data['program'];
        $about = $this->data['about'];
        $review_rating = $this->data['review_rating'];
        $util = new Util;
        $file_upload = $util->file_upload();
        $filename = $file_upload['filename'];
        $current_time = time();

        if( $file_upload['file_upload_error_status'] === 0 ){ // File upload was successful
            $sql = "INSERT INTO teachers (firstname, lastname, program, about, review_rating, filename, posted_time) VALUES ('$firstname', '$lastname', '$program', '$about', '$review_rating' '$filename', '$current_time')";

            $this->execute($sql);
        }


    }

    function edit($id){

        $id = (int)$id;
        $this->check_ownership($id); // Make sure user owns post that's being editted

        $firstname = $this->data['firstname'];
        $lastname = $this->data['lastname'];
        $program = $this->data['program'];
        $about = $this->data['about'];
        $review_rating = $this->data['review_rating'];
        $current_user_id = (int)$_SESSION['user_logged_in'];

        if( !empty($_FILES['fileToUpload']['name']) ) { // Check if new file submitted

            $util = new Util;
            $file_upload = $util->file_upload(); // Upload new file
            $filename = $file_upload['filename'];

            if( $file_upload['file_upload_error_status'] === 0 ){ // File upload was successful

                // Get old filename from db first
                $old_teacher_image = trim($this->get_by_id($id)['filename']);

                // Save filename to DB
                $sql = "UPDATE teacher SET firstname='$firstname', lastname='$lastname', program='$program', about='$about', review_rating='$review_rating', filename='$filename' WHERE id='$id' AND user_id='$current_user_id'";

                $this->execute($sql);

                // Delete the old project image file
                if( !empty($old_teacher_image) ){
                    if( file_exists(APP_ROOT.'/views/assets/files/'.$old_teacher_image )){
                        unlink( APP_ROOT.'/views/assets/files/'.$old_teacher_image );
                    }
                }

            }

        }else{ // if no new file was submitted

            $sql = "UPDATE teachers SET firstname='$firstname', lastname='$lastname', program='$program', about='$about', review_rating='$review_rating' WHERE id='$id' AND user_id='$current_user_id'";

            $this->execute($sql);

        }

    }

    function delete(){

        $current_user_id = (int)$_SESSION['user_logged_in'];
        $id = (int)$_GET['id'];
        $this->check_ownership($id);

        // Delete the old project image file
        $teacher_image = trim($this->get_by_id($id)['filename']);
        if( !empty($teacher_image) ){
            if( file_exists(APP_ROOT.'/views/assets/files/'.$teacher_image )){
                unlink( APP_ROOT.'/views/assets/files/'.$teacher_image );
            }
        }

        $sql = "DELETE FROM teachers WHERE id='$id' AND user_id='$current_user_id'";
        $this->execute($sql);

    }

    function check_ownership($id){

        $id = (int)$id;

        $sql = "SELECT * FROM teachers WHERE id = '$id'";

        $teacher = $this->select($sql)[0];

        if( $teacher['user_id'] == $_SESSION['user_logged_in'] ){
            return true;
        }else{
            header("Location: /");
            exit();
        }

    }

}
