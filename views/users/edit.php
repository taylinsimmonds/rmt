<?php
require_once '../../core/includes.php';

$u = new User;

if( !empty($_POST) ){ // Form was submitted
    $u->edit();
    header('Location: /users/');
    exit();
}

$user = $u->get_by_id($_SESSION['user_logged_in']);


$title = 'Edit Profile';
require_once '../../elements/html_head.php';
require_once '../../elements/nav.php';


?>

<div class="container">


    <div class="row">

        <div class="col-sm-6 mt-5">
            <div class="card-header">
                <center>
                <h2>Edit Profile</h2>
            </center>
            </div>

            <div class="card-body border">

            <form action="/" method="post">

                <div class="form-group">
                    <label>First Name:</label>
                    <input class="form-control" type="text" name="firstname" value="<?=$user['firstname']?>" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input class="form-control" type="text" name="lastname" value="<?=$user['lastname']?>" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input class="form-control" type="email" name="email" value="<?=$user['email']?>" required>
                </div>
                <div class="form-group">
                    <label>Select a Category:</label>
                    <br>
                    <select class="form-control" name="category" required>
                        <option></option>
                        <option value="student">Student</option>
                        <option value="parent">Parent</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Leave empty to keep same password">
                </div>

                <div class="form-group">
                    <label>Your Timezone</label>

                    <select class="form-control chosen-select" name="timezone" required>
                        <option></option>
                        <?php
                        $timezone_identifiers = DateTimeZone::listIdentifiers();

                        foreach( $timezone_identifiers as $timezone ){

                            $selected = $timezone == $user['timezone'] ? 'selected' : '';

                            echo '<option value="'.$timezone.'" '.$selected.'>'.$timezone.'</option>';
                        }

                        ?>

                    </select>

                </div>

                <center>
                <input class="btn btn-primary pl-3 pr-3" type="submit" value="Submit">
                </center>

            </form>

            </div> <!-- .card-body -->

        </div><!-- .col-sm-6 -->

    </div><!-- .row -->

</div><!-- .container -->

<?php require_once '../../elements/footer.php';
