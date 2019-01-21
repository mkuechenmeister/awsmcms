
    <?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 16.01.2019
     * Time: 22:45
     */


    $pageTitle = "Benutzereinstellungen";
    include_once "articleinit.php";

?>
    <div class="container">

        <div class="form-group">
            <form action="/awsmcms/views/nonDisplayApplications/updateAccount.php?updateID=<?= $currentUser->getId();?>" method="post">
                <h2>Deine Benutzerdaten</h2>
                <p class="hint-text">Hier kannst du Einstellungen an deinem Account vornehmen</p>

                <div class="form-group">
                    <div class="row">
                        <label for="first">Vorname</label>
                        <div class="col-xs-6"><input type="text" id="first" class="form-control" name="first"  required="required" value="<?=$currentUser->getFirstname();?>"></div>
                    </div>
                    <div class="row">
                        <label for="last">Nachname</label>
                        <div class="col-xs-6"><input type="text" id="last" class="form-control" name="last" value="<?=$currentUser->getLastname();?>" required="required"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="uname">Username</label>
                        <div class="col-xs-6"><input type="text" id="uname" class="form-control" name="uname" value="<?=$currentUser->getUsername();?>" required="required"></div>
                    </div>
                    <div class="row">
                        <label for="mail">Email</label>
                        <div class="col-xs-6"><input type="email" id="mail" class="form-control" name="mail" value="<?=$currentUser->getEmail();?>" required="required"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-6"><input type="password" class="form-control" name="password" placeholder="Password" ></div>
                        <div class="col-xs-6"><input type="password" class="form-control" name="cpassword" placeholder="Confirm Password"></div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Ändern</button>
                </div>
            </form>
        </div>


    <?php
        require_once "../helper/footer.php";
    ?>