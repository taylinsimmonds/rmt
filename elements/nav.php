<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a id="nav-logo" class="navbar-brand" href="/"> <img class="img-fluid" src="/assets/img/logo-cat.jpg" alt="CAT Logo" style="width:100px;height:50px;"> Centre for Arts & Technology - Rate My Teacher</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>

  </button>

        <!-- logged in Nav -->
          <?php
          // Check if user is logged in. Show welcome links
          if( $_SESSION['user_logged_in'] ){

              $u = new User;
              $user = $u->get_by_id($_SESSION['user_logged_in']);

              ?>

                <li id="logged-in" class="nav-item dropdown">
                  <a class="dropdown-toggle nav-text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome <?=$user['firstname']?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="/users/edit.php">Edit Profile</a>

                    <a class="dropdown-item" href="/users/logout.php">Logout</a>

                  </div>
                </li>


        <?php }else{ // user not logged in. ?>

            <div id="login-form" class="mt-4">
                <form action="/users/login.php" method="post">
                  <div class="form-row">
                    <div class="col">
                      <input type="email" class="login-form-element form-control" name="email" placeholder="email@example.com" required>
                    </div>
                    <div class="col">
                      <input type="password" class="login-form-element form-control" name="password" placeholder="password" required>
                    </div>
                    <button id="login-btn" type="submit" class="btn mb-2">Login</button>
                  </div>
                </form>
                <div id="create-an-account" class="float-right">
                    <a href="create-account.php">Create an Account</a>
                </div>
                <div class="clearfix"></div>
            </div>

          <?php } ?>

</nav>


<!-- Below the Nav -->
<div id="nav-headers-bg">

    <div class="container">

        <div id="nav-headers" class="row">

            <div class="col-md-4">
                <a class="nav-dropdown-headers" href="/">Home</a>
            </div>

            <div id="nav-teachers" class="col-md-4">
                <div class="dropdown ">
                    <button class="nav-dropdown-headers dropdown-toggle" type="button" data-toggle="dropdown">Teachers<span class="caret"></span></button>
                    <ul class="nav-dropdowns dropdown-menu">
                      <li class="dd-list-items">All Teachers</li>
                      <li class="dd-list-items">Chris Holmes</li>
                      <li class="dd-list-items">Taylin Simmonds</li>
                      <li class="dd-list-items">Kiko Carisse</li>
                      <li class="dd-list-items">Sean Ridgeway</li>
                      <li class="dd-list-items">Rolan Baron</li>
                      <li class="dd-list-items">Randal Typusiak</li>
                      <li class="dd-list-items">Carrie Kiesewetter</li>
                      <li class="dd-list-items">Miranda Abild</li>
                      <li class="dd-list-items">Matt Redmond</li>
                      <li>Debora Lampitt-McConnachie</li>
                    </ul>
                </div> <!-- .dropdown -->
            </div> <!-- .search-select -->

            <div id="nav-programs" class="col-md-4">
                <div class="dropdown">
                    <button class="nav-dropdown-headers dropdown-toggle" type="button" data-toggle="dropdown">Programs<span class="caret"></span></button>
                    <ul class="nav-dropdowns dropdown-menu">
                      <li class="dd-list-items">Animation</li>
                      <li class="dd-list-items">Audio Recording & Engineering</li>
                      <li class="dd-list-items">Graphic Design</li>
                      <li class="dd-list-items">Professional Development</li>
                      <li>Web Development</li>
                    </ul>
                </div> <!-- .dropdown -->

            </div> <!-- .search-select -->

        </div> <!-- #nav-headers -->

    </div> <!-- .container -->

</div> <!-- #nav-headers-bg -->
