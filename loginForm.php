<!-- Material form register -->
<div id="signInCard" class="card">

    <h5 class="card-header white-text text-center py-4" style="background-color: #2e2e2e;">
        <strong>Login</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="loginHandler.php" method="post">

            <!-- Username -->
            <div class="md-form mt-0">
                <input type="text" id="materialRegisterFormUsername" placeholder="Username" class="form-control" name="usernameInput">
                <label for="materialRegisterFormEmail"></label>
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" class="form-control" name="passwordInput" placeholder="Password" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="materialRegisterFormPassword"></label>
                <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                </small>
            </div>

            <!-- Sign up button -->
            <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

            <!-- Social register -->
            <p>or sign up with:</p>

            <a id="signUpSocialMediaIcon" type="button" class="btn-floating btn-fb btn-sm">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a id="signUpSocialMediaIcon" type="button" class="btn-floating btn-tw btn-sm">
                <i class="fab fa-twitter"></i>
            </a>
            <a id="signUpSocialMediaIcon" type="button" class="btn-floating btn-li btn-sm">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a id="signUpSocialMediaIcon" type="button" class="btn-floating btn-git btn-sm">
                <i class="fab fa-github"></i>
            </a>

            <hr>

            <!-- Terms of service -->
            <p>Not a member?
                <a href="registerForm.php" target="_self">Register Now</a>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->