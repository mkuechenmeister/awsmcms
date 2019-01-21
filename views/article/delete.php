<?php
    $pageTitle = "Delete";
    require_once "articleinit.php";
?>
<div class="container">
    <h2>Beitrag löschen</h2>

    <form class="form-horizontal" action="delete.php?id=29" method="post">
        <input type="hidden" name="id" value="29"/>
        <p class="alert alert-error">Wollen Sie den Beitrag wirklich löschen?</p>
        <div class="form-actions">
            <button type="submit" class="btn btn-danger">Löschen</button>
            <a class="btn btn-default" href="index.php">Abbruch</a>
        </div>
    </form>


    <?php
    require_once "../helper/footer.php";
    ?>