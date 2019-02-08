<?php  require_once("../../core/includes.php");

    if( !empty($_GET) ){ // Check url has id in it

        $r = new Review;
        $review = $r->get_by_id($_GET['id']);

        if( !empty($_POST) ){ // Check if form was submitted
            $r->edit($_GET['id']);
            header("Location: /");
            exit();
        }

    }else{
        header("Location: /");
        exit();
    }


    // unique html head vars
    $title = 'Edit Review';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");

?>

    <div class="container">

            <div class="row">

                <div class="col-md-8 mt-5">

                    <div class="card border-success mt-3">

                        <div class="card-header">
                            <h4>Edit Review:</h4>
                        </div><!-- .card-header -->

                        <div class="card-body">

                            <form method="post" enctype="multipart/form-data">
                                <div>
                                    <label>Rating:</label>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="rating" required>
                                        <option></option>
                                        <option value="one-star" <?=($review['rating'] == 'one-star' ? 'selected' : '')?> >1 Star</option>
                                        <option value="two-star" <?=($review['rating'] == 'two-star' ? 'selected' : '')?>>2 Star</option>
                                        <option value="three-star" <?=($review['rating'] == 'three-star' ? 'selected' : '')?>>3 Star</option>
                                        <option value="four-star" <?=($review['rating'] == 'four-star' ? 'selected' : '')?>>4 Star</option>
                                        <option value="five-star" <?=($review['rating'] == 'five-star' ? 'selected' : '')?>>5 Star</option>
                                    </select>
                                </div>
                                <div>
                                    <label>Review:</label>
                                </div>
                                <div class="form-group">
                                    <textarea id="comment-form" class="form-control form-control-lg" name="description" required><?=$review['description']?></textarea>
                                </div>

                                <input class="btn btn-primary" type="submit" value="Submit">

                            </form>

                        </div><!-- .card-body -->

                    </div><!-- .card -->

                </div><!-- .col-md-8 -->

            </div><!-- .row -->

    </div><!-- .container -->

<?php require_once("../../elements/footer.php");
