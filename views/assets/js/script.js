$(document).ready(function(){

    /* ===========================
        Search
       =========================== */

    $('#search-form-input').on('keyup', function(e){
        var formdata = $(this).serialize();

        $.post('/teachers/search.php', formdata, function(data){
            console.log(data)

            $('.search-results').html('');
            var teachers = JSON.parse(data);
            var teachersHTML = '';
            $.each(teachers, function(key, teacher){
                teachersHTML += '';
                teachersHTML += '<div class="teacher-item" data-teacherID="'+teacher.id+'">';

                teachersHTML += '<div class="row result-row">';
                    teachersHTML += '<div class="col">';
                        teachersHTML += '<img class="teacher-photo img-fluid p-2" src="/assets/staff-photos/'+teacher.filename+'" alt="Search Icon">';
                    teachersHTML += '</div> <!-- .col-md-2 -->';

                    teachersHTML += '<div class="col-md-9">';

                        teachersHTML += '<h3 class="teacher-name pt-2">'+teacher.firstname+' '+teacher.lastname+'</h3>';

                        teachersHTML += '<div class="searched-teacher-info row">';

                            teachersHTML += '<div class="col-md-3">';
                                teachersHTML += '<h5>Program:</h5>';
                                teachersHTML += '<p class="teacher-program">'+teacher.program+'</p>';
                            teachersHTML += '</div> <!-- .col-md-3 -->';

                            teachersHTML += '<div class="col-md-3">';
                                teachersHTML += '<h5>About:</h5>';
                                teachersHTML += '<p class="teacher-about">'+teacher.about+'</p>';
                            teachersHTML += '</div> <!-- .col-md-3 -->';

                            teachersHTML += '<div class="col-md-3">';
                                teachersHTML += '<h5>Review Rating:</h5>';
                                teachersHTML += '<p class="teacher-review-rating">'+teacher.review_rating+'</p>';
                            teachersHTML += '</div> <!-- .col-md-3 -->';

                            teachersHTML += '<div class="col-md-3">';
                                teachersHTML += '<h5>Recent Review:</h5>';
                                teachersHTML += '<p class="recent-review">Dope!</p>';
                            teachersHTML += '</div> <!-- .col-md-3 -->';

                        teachersHTML += '</div> <!-- .row -->';

                        teachersHTML += '<div class="profile-btm-row row mr-3">';

                            teachersHTML += '<div class="col">';
                                teachersHTML += '<div>';
                                    teachersHTML += '<button class="add-review-btn" type="button">Add Review <span class="caret"></span></button>';
                                teachersHTML += '</div> <!-- .dropdown -->';

                            teachersHTML += '</div> <!-- .col -->';

                            teachersHTML += '<div class="col mr-2">';
                                teachersHTML += '<div>';
                                    teachersHTML += '<button class="view-more-btn type="button">View More <span class="caret"></span></button>';
                                teachersHTML += '</div> <!-- .dropdown -->';
                            teachersHTML += '</div> <!-- .col -->';

                        teachersHTML += '</div> <!-- #profile-btm-row -->';

                    teachersHTML += '</div> <!-- .col-md-9 -->';

                teachersHTML += '</div> <!-- .row -->';

                teachersHTML += '<div class="add-review-section mb-5">';

                    teachersHTML += '<form action="/reviews/add.php" method="post">';

                        teachersHTML += '<div class="row">';

                                teachersHTML += '<div class="d-inline mt-3 ml-5">';
                                    teachersHTML += '<h5>Rating:</h5>';
                                teachersHTML += '</div>';
                                teachersHTML += '<div class="d-inline mt-3 ml-3 mr-3">';
                                    teachersHTML += '<select id="rating-btn" class="form-control" name="rating" required>';
                                        teachersHTML += '<option></option>';
                                        teachersHTML += '<option value="one-star">1 Star</option>';
                                        teachersHTML += '<option value="two-star">2 Star</option>';
                                        teachersHTML += '<option value="three-star">3 Star</option>';
                                        teachersHTML += '<option value="four-star">4 Star</option>';
                                        teachersHTML += '<option value="five-star">5 Star</option>';
                                    teachersHTML += '</select>';
                                teachersHTML += '</div>';

                                // teachersHTML += '<div id="post-anonymously" class="d-inline mt-3">';
                                //     teachersHTML += '<input type="checkbox" name="anonymoys" value="Post Anonymously"> Post Anonymously';
                                // teachersHTML += '</div>';

                        teachersHTML += '</div> <!-- .row -->';

                        teachersHTML += '<div class="m-3">';
                            teachersHTML += '<textarea id="comment-form" class="form-control form-control-lg" placeholder="Write a review..." name="description" required></textarea>';
                        teachersHTML += '</div>';

                        teachersHTML += '<input class="btn mb-3 ml-3" type="submit" value="Add Review">';

                    teachersHTML += '</form>';

                teachersHTML += '</div> <!-- #add-review-section -->';

                if(teacher.reviews){

                    $.each(teacher.reviews, function(key, review){

                        teachersHTML += '<div class="view-more-section review-item mb-3" data-reviewID="'+review.id+'">';

                            teachersHTML += '<div class="row">';

                                teachersHTML += '<div class="col-md-3 ml-3 mt-3">';
                                    teachersHTML += '<h5 class="review-user">User: Anonymous</h5>';
                                teachersHTML += '</div> <!-- .col -->';
                                teachersHTML += '<div class="col-md-3 mt-3">';
                                    teachersHTML += '<h5 class="posted-time">'+convertUnixToData(review.posted_time)+'</h5>';
                                teachersHTML += '</div> <!-- .col -->';

                                teachersHTML += '<div class="edit-btns">';
                                    teachersHTML += '<a href="/reviews/edit.php?id='+review.id+'"><i class="edit-review far fa-edit"></i></a>';
                                    teachersHTML += '<i class="delete-review far fa-trash-alt"></i>';
                                teachersHTML += '</div>';

                            teachersHTML += '</div> <!-- .row -->';

                            teachersHTML += '<div class="ml-3">';
                                teachersHTML += '<span class="review-rating">Rating: '+review.rating+'</span>';
                            teachersHTML += '</div>';

                            teachersHTML += '<div class="ml-3 mt-2 mb-3">';
                                teachersHTML += '<span class="review-description">Description: '+review.description+'</span>';
                            teachersHTML += '</div>';

                        teachersHTML += '</div> <!-- .view-more-section -->';


                    });
                }









            teachersHTML += '</div><!-- .teacher-item -->';




            });
            $('.search-results').html(teachersHTML);
        });

    });

    $('#search-form').submit(function(e){
        e.preventDefault(); //Submit no longer refreshs the page
    });

/* ===========================
    Show/Hide Reviews Sections
   =========================== */

    $('.search-results').on('click','.add-review-btn',function(){
        var $reviewBtn = $(this);
        $reviewBtn.closest('.teacher-item').find('.add-review-section').toggle();
    });

    $('.search-results').on('click','.view-more-btn', function(){
        var $viewMoreBtn = $(this);
        $viewMoreBtn.closest('.teacher-item').find('.view-more-section').toggle();
    });


    /* ===========================
        Add review to database
       =========================== */
    $(document).on('submit', '.add-review-form', function(e){
        e.preventDefault();

        // Components
        var $reviewForm = $(this);
        var $reviewBox = $reviewForm.find('.reviewForm-reviewBox');
        var $review_loop = $reviewForm.closest('.teacher-item').find('.teachers-reviews-section');

        // Values
        var teacher_id = $reviewForm.closest('.teacher-item').attr('data-teacherID');
        var rating = $reviewForm.find('.rating-btn').val();
        var description = $reviewForm.find('.comment-form').val();
        // var review = $reviewBox.val();

        if( $.trim(description).length > 0 ){ // They typed something

            $.post('/reviews/add.php', {"teacher_id":teacher_id,"rating":rating,"description":description}, function(review_data){
                console.log(review_data);
                review_data = JSON.parse(review_data);

                // if( review_data.error === false ){
                    // $reviewCount.text(review_data.review_count);

                    var reviewLoopHtml = '';
                    $.each(review_data.reviews, function(key, review){

                        // reviewLoopHtml += '<div class="user-review">';
                        // if( review.user_owns == 'true' ){
                        //     reviewLoopHtml += '<i class="fas fa-times-circle delete-review" data-reviewID="'+review.id+'"></i>';


                        reviewLoopHtml += '<div class="view-more-section review-item mb-3" data-reviewID="'+review.id+'">';

                            reviewLoopHtml += '<div class="row">';

                                reviewLoopHtml += '<div class="col-md-3 ml-3 mt-3">';
                                    reviewLoopHtml += '<h5 class="review-user">User: Anonymous</h5>';
                                reviewLoopHtml += '</div> <!-- .col -->';
                                reviewLoopHtml += '<div class="col-md-3 mt-3">';
                                    reviewLoopHtml += '<h5 class="posted-time">'+convertUnixToData(review.posted_time)+'</h5>';
                                reviewLoopHtml += '</div> <!-- .col -->';

                                reviewLoopHtml += '<div class="edit-btns">';
                                    reviewLoopHtml += '<a href="/reviews/edit.php?id='+review.id+'"><i class="edit-review far fa-edit"></i></a>';
                                    reviewLoopHtml += '<i class="delete-review far fa-trash-alt"></i>';
                                reviewLoopHtml += '</div>';

                            reviewLoopHtml += '</div> <!-- .row -->';

                            reviewLoopHtml += '<div class="ml-3">';
                                reviewLoopHtml += '<span class="review-rating">Rating: '+review.rating+'</span>';
                            reviewLoopHtml += '</div>';

                            reviewLoopHtml += '<div class="ml-3 mt-2 mb-3">';
                                reviewLoopHtml += '<span class="review-description">Description: '+review.description+'</span>';
                            reviewLoopHtml += '</div>';

                        reviewLoopHtml += '</div> <!-- .view-more-section -->';

                    }); // END EACH LOOP

                    $review_loop.html(reviewLoopHtml);
                    $reviewBox.val('');
                    $reviewForm[0].reset();



            });

        }

    });

    /* ===========================
        Delete Reviews
       =========================== */

    $(document).on('click', '.delete-review', function(){

        var $deleteBtn = $(this);
        var $reviewItem = $deleteBtn.closest('.review-item');

        var teacher_id = $deleteBtn.closest('.teacher-item').attr('data-teacherID');
        var review_id = $deleteBtn.closest('.review-item').attr('data-reviewID');
        $.post('/reviews/delete.php', {"review_id":review_id, "teacher_id":teacher_id}, function(data){

            console.log(data);

            $reviewItem.remove();

        });

    });

}); // END DOCUMENT READY

function convertUnixToData(unix_timestamp){
    var a = new Date(unix_timestamp * 1000);
      var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
      var year = a.getFullYear();
      var month = months[a.getMonth()];
      var date = a.getDate();
      var time =  month + ' ' + date + ', ' + year;
      return time;

}
