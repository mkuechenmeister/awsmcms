<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 16.01.2019
     * Time: 22:45
     */


    $pageTitle = "Signup to AWSM CMS";
    include_once "views/helper/init.php";
    include_once "views/helper/navbarUnauthenticated.php";

?>
    <div class="container">

        <div class="form-group">
            <form action="views/nonDisplayApplications/signmeup.php" method="post">
                <h2>Regestrierungsformular</h2>
                <p class="hint-text">Create your account. It's free and only takes a minute.</p>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6"><input type="text" class="form-control" name="first" placeholder="First Name" required="required"></div>
                        <div class="col-xs-6"><input type="text" class="form-control" name="last" placeholder="Last Name" required="required"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6"><input type="text" class="form-control" name="uname" placeholder="Username" required="required"></div>
                        <div class="col-xs-6"><input type="email" class="form-control" name="mail" placeholder="Email" required="required"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6"><input type="password" class="form-control" name="password" placeholder="Password" required="required"></div>
                        <div class="col-xs-6"><input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" required="required"></div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Anmelden</button>
                </div>
            </form>
        </div>



<?php
    include_once "views/helper/footer.php";
?>