<?php
    $pageTitle = "Alle Beiträge";
    require_once "articleinit.php";
    $data = Post::getAllJoined();
?>

    <div class="container">
    <div class="row">
        <h2>Beiträge</h2>
    </div>
    <div class="row">
        <p>
            <a href="create.php" class="btn btn-success">Erstellen <span class="glyphicon glyphicon-plus"></span></a>
        </p>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Titel</th>
                <th>Inhalt</th>
                <th>Besitzer</th>
                <th>Freigabedatum</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach ($data as $entry):


            ?>
            <tr>
                <td><?=$entry['bTitel'];?></td>
                <td><?=$entry['bInhalt'];?></td>
                <td><?=$entry['uUsername'];?></td>
                <td><?=$entry['bTimeCreated'];?></td>
                <td><a class="btn btn-info" href="/awsmcms/views/article/view.php?id=<?=$entry['bID'];?>"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;<a
                            class="btn btn-primary" href="/awsmcms/views/article/update.php?id=<?=$entry['bID'];?>"><span
                                class="glyphicon glyphicon-pencil"></span></a>&nbsp;<a
                            class="btn btn-danger" href="/awsmcms/views/nonDisplayApplications/delete.php?deleteID=<?=$entry['bID'];?>"><span
                                class="glyphicon glyphicon-remove"></span></a>
                </td>
            </tr>
            <?php
endforeach;
 ?>

            </tbody>
        </table>
    </div>

<?php
    require_once "../helper/footer.php";
?>