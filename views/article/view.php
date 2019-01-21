<?php
    $pageTitle = "View";
    require_once "articleinit.php";
    if (!isset($_GET['id'])) {
        header('Location: /awsmcms');
        exit();
    }else {

        $post = Post::get($_GET['id']);
        $owner = User::get($post->getUser());
    }
?>

<div class="container">
    <h2>Beitrag anzeigen</h2>

    <p>
        <a class="btn btn-primary" href="/awsmcms/views/article/update.php?id=<?=$post->getId()?>">Aktualisieren</a>
        <a class="btn btn-danger" href="/awsmcms/views/nonDisplayApplications/delete.php?deleteID=<?=$post->getId()?>">Löschen</a>
        <a class="btn btn-default" href="/awsmcms">Zurück</a>
    </p>

    <table class="table table-striped table-bordered detail-view">
        <tbody>
        <tr>
            <th>Titel</th>
            <td><?=$post->getTitle()?></td>
        </tr>
        <tr>
            <th>Freigabedatum</th>
            <td><?=$post->getTimeCreated()?></td>
        </tr>
        <tr>
            <th>Besitzer</th>
            <td><?=$owner->getUsername()?></td>
        </tr>
        <tr>
            <th>Inhalt</th>
            <td><?= nl2br($post->getInhalt());?></td>
        </tr>
        </tbody>
    </table>

<?php
    require_once "../helper/footer.php";
?>