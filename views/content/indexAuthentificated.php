<?php
    $posts = Post::getAll()
?>

<div class="jumbotron">
    <div class="container">
        <h1>Hallo <?=$currentUser->getFirstName();?></h1>
        <p>Schön dass du wieder hier bist.</p>
        <p>Hier siehst du die letzten Posts</p>
        <p><a class="btn btn-primary btn-lg" href="/awsmcms/views/article/create.php" role="button">Neuen Eintrag erstellen &raquo;</a></p>
    </div>
</div>


<div class="container">

    <?php
        if ($posts == null) {
            ?>

            <h1>Es konnten keine Einträge gefunden werden.</h1>
            <?php
        }else
        {
            ?>
            <!-- Example row of columns -->
            <div class="row">

                <?php
                    foreach ($posts as $post):

                        ?>



                        <div class="col-md-4">
                            <h2><?= $post->getTitle(); ?></h2>
                            <p><?= $post->getInhalt(); ?></p>
                            <p><a class="btn btn-default" href="/awsmcms/views/article/view.php?id=<?= $post->getID() ?>"
                                  role="button">View details &raquo;</a></p>
                        </div>


                    <?php
                    endforeach;
                ?>
            </div>
            <?php
        }
    ?>
