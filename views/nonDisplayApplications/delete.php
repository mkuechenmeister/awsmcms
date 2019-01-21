<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 19.01.2019
     * Time: 16:39
     */
    require_once "ndinit.php";

    if (!isset($_GET['deleteID'])) {

        header('Location: /awsmcms');
        exit();
    }else{
        Post::delete($_GET['deleteID']);
        header('Location: /awsmcms/views/article/');
        exit();
    }
