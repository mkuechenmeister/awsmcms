<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 18.01.2019
     * Time: 14:09
     */
    require_once "ndinit.php";

    session_unset();
    session_destroy();
    header("Location: ../../index.php");
    exit();