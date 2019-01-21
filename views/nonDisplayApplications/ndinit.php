<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 16.01.2019
     * Time: 19:42
     */

    session_start();

    require_once "../../models/User.php";
    require_once "../../models/Post.php";

    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
        //letzte aktivität innerhalb von 30minuten
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
    }
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
    $isLoggedIn = false;


    include_once "../helper/head.php";

    if (!isset($_SESSION['uID'])) {
        header("Location: /awsmcms");
    }else{
        $isLoggedIn = true;
        $currentUser = User::get($_SESSION['uID']);
    }