<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 19.01.2019
     * Time: 14:31
     */
    require_once "ndinit.php";

    if ($_POST['title'] == '') {
        header('Location: /awsmcms');
    } else {
        $title = $_POST['title'];
        $date = $_POST['releasedate'];
        $content = $_POST['content'];
        $owner = $_POST['owner'];
    }

   // Post::createNewPost($title, $content, User::getUserByUsername($owner)->getId(), $date);
    Post::createNewPost($title, $content, $_SESSION['uID'], $date);

    header('Location: /awsmcms/views/article');
