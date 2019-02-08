<?php  require_once("../../core/includes.php");
    // unique html head vars
    $title = 'Home Page';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");
?>

<div class="container">

    <div id="search-results" class="mt-5">
        <div class="row">
            <div class="col">
                <img id="teacher-photo" class="img-fluid p-2" src="../assets/img/profile-pic-kiko.jpg" alt="Search Icon">
            </div> <!-- .col-md-2 -->

            <div class="col-md-9">

                <h3 class="pt-2">Kiko (The Hoff) Carisse</h3>

                <div class="row">

                    <div class="col-md-3">
                        <h5>Program:</h5>
                        <p>Web Development</p>
                    </div> <!-- .col-md-3 -->

                    <div class="col-md-3">
                        <h5>About:</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div> <!-- .col-md-3 -->

                    <div class="col-md-3">
                        <h5>Review Rating:</h5>
                        <p>5 Stars</p>
                    </div> <!-- .col-md-3 -->

                    <div class="col-md-3">
                        <h5>Recent Review:</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div> <!-- .col-md-3 -->

                </div> <!-- .row -->

                <div id="profile-btm-row" class="row mr-3">

                    <div class="col">
                        <div class="dropdown">
                            <button id="add-review-btn" class="dropdown-toggle" type="button" data-toggle="dropdown">Add Review <span class="caret"></span></button>
                        </div> <!-- .dropdown -->

                    </div> <!-- .col -->

                    <div class="col mr-2">
                        <div class="dropdown">
                            <button id="view-more-btn" class="dropdown-toggle" type="button" data-toggle="dropdown">View More <span class="caret"></span></button>
                        </div> <!-- .dropdown -->
                    </div> <!-- .col -->

                </div> <!-- #profile-btm-row -->

                <div class="clearfix"></div>

            </div> <!-- .col-md-9 -->

        </div> <!-- .row -->

    </div> <!-- #search-results -->

    <div id="add-review-section" class="mb-5">

        <form class="" method="post">

            <div class="row">

                    <div class="col mt-3 ml-3">
                        <div class="dropdown">
                            <button id="rating-btn" class="dropdown-toggle" type="button" data-toggle="dropdown">Rating<span class="caret"></span></button>
                            <ul id="" class="nav-dropdowns dropdown-menu">
                              <li class="dd-list-items"><i class="fas fa-star"></i></li>
                              <li class="dd-list-items"><i class="fas fa-star"></i><i class="fas fa-star"></i></li>
                              <li class="dd-list-items"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></li>
                              <li class="dd-list-items"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></li>
                              <li><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></li>
                            </ul>
                        </div> <!-- .dropdown -->
                    </div> <!-- .col mt-3 ml-3 -->

                    <div id="post-anonymously" class="col mt-3">
                        <input type="checkbox" name="anonymoys" value="Post Anonymously"> Post Anonymously
                    </div>

            </div> <!-- .row -->

            <div class="m-3">
                <input id="comment-form" class="form-control form-control-lg" placeholder="Write a review...">
            </div>

            <input class="btn btn-primary mb-3 ml-3" type="submit" value="Add Review">

        </form>

    </div> <!-- #add-review-section -->

    <h3 class="ml-3">Reviews</h3>

    <div id="view-more-section">

        <div class="row">

            <div class="col-md-3 ml-3 mt-3">
                <h5>User: Anonymous</h5>
            </div> <!-- .col -->
            <div class="col-md-3 mt-3">
                <h5>January 16,2019</h5>
            </div> <!-- .col -->

            <div class="col mt-3 float-right">
                <i id="edit-review" class="far fa-edit"></i>
                <i id="delete-review" class="far fa-trash-alt"></i>
            </div>

            <div class="clearfix"></div>

        </div> <!-- .row -->

        <div class="ml-3">
            <span>Rating: 5 Stars</span>
        </div>

        <div class="ml-3 mt-2 mb-3">
            <span>Description: Basically the Steve Jobs of the coding world.</span>
        </div>

    </div> <!-- #view-more-section -->

</div> <!-- .container -->

<?php require_once("../../elements/footer.php");
