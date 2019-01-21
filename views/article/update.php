<?php
    $pageTitle = "Update";
    require_once "articleinit.php";

    if (!isset($_GET['id'])) {
        header("Location: /awsmcms");
        exit();
    }else{
        $post = Post::get($_GET['id']);
        $owner = User::get($post->getUser());
    }
?>

<div class="container">
    <div class="row">
        <h2>Beitrag bearbeiten</h2>
    </div>

    <form class="form-horizontal" action="/awsmcms/views/nonDisplayApplications/update.php?updateID=<?=$post->getID();?>" method="post">

        <div class="row">
            <div class="col-md-5">
                <div class="form-group required">
                    <label class="control-label">Titel *</label>
                    <input type="text" class="form-control" name="title" maxlength="45" value="<?=$post->getTitle();?>">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div class="form-group required">
                    <label class="control-label">Freigabedatum *</label>
                    <input type="date" class="form-control" name="releasedate">
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
                <div class="form-group required">
                    <label class="control-label">Besitzer *</label>
                    <select class="form-control" name="owner">
                        <option value="<?=$owner->getId();?>">-Besitzer auswählen-</option>
                        <?php
                            if (!( $owner == $currentUser)) {?>

                                 <option value="<?=$owner->getId();?>" selected><?=$owner->getUsername();?></option>
                                 <option value="<?=$currentUser->getId();?>"><?=$currentUser->getUsername();?></option>
                                 <?php
                            }else{
                                ?>
                            }
                                 <option value="<?=$owner->getId();?>"  selected><?=$owner->getUsername();?></option>
                                 <?php

                            }
                        ?>

                        </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group required">
                    <label class="control-label">Inhalt *</label>
                    <textarea class="form-control" name="content" rows="10"><?=$post->getInhalt();?></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Aktualisieren</button>
            <a class="btn btn-default" href="/awsmcms">Abbruch</a>
        </div>
    </form>

<?php
    require_once "../helper/footer.php";
?>