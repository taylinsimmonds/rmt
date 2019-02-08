<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Home Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");
?>

<div class="container">

<div class="row">

    <div class="col-md-6">

    <div class="card mt-5">

        <div class="card-header">
            <h2>Create your Account</h2>
        </div> <!-- .card-header -->

        <div class="card-body">
            <form action="/users/add.php" method="post">
                <div class="form-group">
                    <label>First Name:</label>
                    <br>
                    <input class="form-control" type="text" name="firstname" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <br>
                    <input class="form-control" type="text" name="lastname" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <br>
                    <input class="form-control" type="email" name="email" placeholder="example@email.com" required>
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
                    <label>Your Timezone</label>

                    <select id="signup-timezone-select" class="form-control" name="timezone" required>
                        <option></option>
                        <?php
                        $timezone_identifiers = DateTimeZone::listIdentifiers();

                        foreach( $timezone_identifiers as $timezone ){
                            echo '<option value="'.$timezone.'">'.$timezone.'</option>';
                        }

                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <br>
                    <input class="form-control" type="password" name="password" required>
                </div>
                <center>
                <input class="btn btn-primary" type="submit" value="Create an Account">
                </center>
            </form>
        </div> <!-- .card-body -->

    </div> <!-- .card -->

    </div> <!-- .col-md-6 -->

    </div> <!-- .row -->

</div> <!-- .container -->

<?php require_once("../elements/footer.php");
