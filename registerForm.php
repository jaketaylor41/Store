<?php require_once 'header.php';
session_start();
?>



<!-- Material form register -->
<div id="registerCard" class="card">

    <h5 class="card-header white-text text-center py-4" style="background-color: #2e2e2e;">
        <strong>Register</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="processNewUser.php">

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" placeholder="First Name" name="firstname" class="form-control">
                        <label for="materialRegisterFormFirstName"></label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormLastName" placeholder="Last Name" name="lastname" class="form-control">
                        <label for="materialRegisterFormLastName"></label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="materialRegisterFormEmail" placeholder="E-Mail" name="email" class="form-control">
                <label for="materialRegisterFormEmail"></label>
            </div>

            <!-- Username -->
            <div class="md-form mt-0">
                <input type="text" id="materialRegisterFormEmail" placeholder="Username" name="username" class="form-control">
                <label for="materialRegisterFormEmail"></label>
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" placeholder="Password" class="form-control" name="password" aria-describedby="materialRegisterFormPasswordHelpBlock">
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
            <p>By clicking
                <em>Sign up</em> you agree to our
                <a href="" target="_blank">terms of service</a>
        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->