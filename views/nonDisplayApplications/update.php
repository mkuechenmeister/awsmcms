<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 19.01.2019
     * Time: 17:03
     */
    require_once "ndinit.php";

    if (!isset($_GET['updateID'])) {
        header("Location: /awsmcms");
        exit();
    }else{
        $post = Post::get($_GET['updateID']);
        $title = $_POST['title'];
        $date = $_POST['releasedate'];
        $owner = $_POST['owner'];
        $inhalt = $_POST['content'];



        $post->setTitle($title);
        if (!$date == null) {

            $post->setTimeCreated($date);
        }
        $post->setUser($owner);
        $post->setInhalt($inhalt);
        $post->update();
        $t = $post->getTimeCreated();
        header("Location: /awsmcms");
       //var_dump($_POST);
        //var_dump($post);
    }