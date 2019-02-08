<?php  require_once("../core/includes.php");
    // unique html head vars
    $title = 'Home Page';
    require_once("../elements/html_head.php");
    require_once("../elements/nav.php");
?>

        <div class="mb-5 banner">
            <center>
            <h1 class="big-banner">Welcome to Rate My Teacher</h1>
            <h1 id="small-banner">Rate My Teacher</h1>
            <h2 class="big-banner">Helping students, parents and teachers make informed decisions about their education</h2>
            </center>
        </div>

        <div class="container">

        <?php //Search Bar ?>
        <div class="search-form">
            <form id="search-form" class="form-inline my-2" action="/" method="get">
              <input id="search-form-input" class="form-control form-control-lg" type="text" name="search" placeholder="Teacher Name" aria-label="Search">
            <div class="search-select">
                <div id="search-select" class="dropdown">
                    <button class="btn dropdown-toggle search-select" type="button" data-toggle="dropdown">Program<span class="caret"></span></button>
                    <ul id="search-select-dd" class="dropdown-menu">
                      <li>Animation</li>
                      <li>Audio Recording & Engineering</li>
                      <li>Graphic Design</li>
                      <li>Professional Development</li>
                      <li>Web Development</li>
                    </ul>
                </div> <!-- .dropdown -->
            </div> <!-- .search-select -->
            <!-- <img id="search-btn" type="submit" class="img-fluid" src="assets/img/icon-search.png" alt="Search Icon"> -->
            <i id="search-btn" class="fas fa-search"></i>

            </form> <!-- search form -->
        </div> <!-- .search-form -->

        <div class="search-results mt-5">

        <?php
        $t = new Teacher;
        $teachers = $t->get_all();

        $r = new Review;

        foreach($teachers as $teacher){

        ?>

            <div class="teacher-item" data-teacherID="<?=$teacher['id']?>">

                <div class="row result-row">
                    <div>
                        <img class="teacher-photo img-fluid p-2" src="/assets/staff-photos/<?=$teacher['filename']?>" alt="Search Icon">
                    </div> <!-- .col-md-2 -->

                    <div class="col-md-9" >

                        <h3 class="teacher-name pt-2"><?=$teacher['firstname'] . ' ' . $teacher['lastname']?></h3>

                        <div class="searched-teacher-info row">

                            <div class="col-md-3">
                                <h5>Program:</h5>
                                <p class="teacher-program"><?=$teacher['program']?></p>
                            </div> <!-- .col-md-3 -->

                            <div class="col-md-3">
                                <h5>About:</h5>
                                <p class="teacher-about"><?=$teacher['about']?></p>
                            </div> <!-- .col-md-3 -->

                            <div class="col-md-3">
                                <h5>Review Rating:</h5>
                                <p class="teacher-review-rating"><?=$teacher['review_rating']?></p>
                            </div> <!-- .col-md-3 -->

                            <div class="col-md-3">
                                <h5>Recent Review:</h5>
                                <p class="recent-review">Dope!</p>
                            </div> <!-- .col-md-3 -->

                        </div> <!-- .row -->

                        <div class="profile-btm-row row mr-3">

                            <div class="col">
                                <div >
                                    <button class="add-review-btn" type="button">Add Review <span class="caret"></span></button>
                                </div> <!-- .dropdown -->

                            </div> <!-- .col -->

                            <div class="col mr-2">
                                <div >
                                    <button class="view-more-btn" type="button">View More <span class="caret"></span></button>
                                </div> <!-- .dropdown -->
                            </div> <!-- .col -->

                        </div> <!-- #profile-btm-row -->

                        <div class="clearfix"></div>

                    </div> <!-- .col-md-9 -->

                </div> <!-- .row -->

                <div class="add-review-section mb-2">

                    <form class="add-review-form" action="/reviews/add.php" method="post">

                        <div class="row">

                                <div class="d-inline mt-3 ml-5">
                                    <h5>Rating:</h5>
                                </div>
                                <div class="d-inline mt-3 ml-3 mr-3">
                                    <select class="rating-btn form-control" name="rating" required>
                                        <option selected disabled></option>
                                        <option value="one-star">1 Star</option>
                                        <option value="two-star">2 Star</option>
                                        <option value="three-star">3 Star</option>
                                        <option value="four-star">4 Star</option>
                                        <option value="five-star">5 Star</option>
                                    </select>
                                </div>

                                <!-- <div class="post-anonymously d-inline mt-3">
                                    <input class="reviewForm-reviewBox" type="checkbox" name="anonymoys" value="Post Anonymously"> Post Anonymously
                                </div> -->

                        </div> <!-- .row -->

                        <div class="m-3">
                            <textarea class="comment-form form-control form-control-lg" placeholder="Write a review..." name="description" required></textarea>
                        </div>

                        <input class="btn mb-3 ml-3" type="submit" value="Add Review">

                    </form>

                </div> <!-- #add-review-section -->

                <div class="teachers-reviews-section">

                    <?php foreach($teacher['reviews'] as $review){ ?>

                        <div class="view-more-section review-item mb-3" data-reviewID="<?=$review['id']?>">

                            <div class="row">

                                <div class="col-md-3 ml-3 mt-3">
                                    <h5 class="review-user">User: Anonymous</h5>
                                </div> <!-- .col -->
                                <div class="col-md-3 mt-3">
                                    <h5 class="posted-time"><?=date('M d, Y', $review['posted_time'])?></h5>
                                </div> <!-- .col -->

                                <?php
                                if( $review['user_id'] == $_SESSION['user_logged_in'] ){ ?>
                                <div class="edit-btns">
                                    <a href="/reviews/edit.php?id=<?=$review['id']?>"><i class="edit-review far fa-edit"></i></a>
                                    <i class="delete-review far fa-trash-alt"></i>
                                </div>

                                <?php
                                }
                                 ?>

                            </div> <!-- .row -->

                            <div class="ml-3">
                                <span class="review-rating">Rating: <?=$review['rating']?></span>
                            </div>

                            <div class="ml-3 mt-2 mb-3">
                                <span class="review-description">Description: <?=$review['description']?></span>
                            </div>

                        </div> <!-- .view-more-section -->

                    <?php } ?>
                </div><!-- .teachers-reviews-section -->

            </div><!-- .teacher-item -->

        <?php } ?>

    </div> <!-- #search-results -->





    </div><!-- .container -->

<?php require_once("../elements/footer.php");
