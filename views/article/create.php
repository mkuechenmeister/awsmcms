<?php
    $pageTitle = "Article";
    require_once "articleinit.php";
    ?>
<div class="container">
    <div class="row">
        <h2>Beitrag erstellen</h2>
    </div>

    <form class="form-horizontal" action="/awsmcms/views/nonDisplayApplications/addPost.php" method="post">

        <div class="row">
            <div class="col-md-5">
                <div class="form-group required">
                    <label class="control-label">Titel *</label>
                    <input type="text" class="form-control" name="title" maxlength="45" value="" required>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div class="form-group required">
                    <label class="control-label">Freigabedatum *</label>
                    <input type="date" class="form-control" name="releasedate" value="">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="form-group required">A
                    <label class="control-label">Besitzer *</label>
                    <input type="text" class="form-control" name="owner" value="<?=$currentUser->getUsername();?>" readonly >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group required">
                    <label class="control-label">Inhalt *</label>
                    <textarea class="form-control" name="content" rows="10" required></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Erstellen</button>
            <a class="btn btn-default" href="/awsmcms">Abbruch</a>
        </div>
    </form>



<?php
    require_once "../helper/footer.php";
    ?>