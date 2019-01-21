<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 16.01.2019
     * Time: 21:49
     */
    require_once "ndinit.php";

    if (!$_POST['username']== "") {
        //var_dump($_POST);
       // include_once "init.php";

        $user = User::getUserByUsername($_POST['username']);
        if ($user == null) {
            header("Location: ../index.php?error=OOPs something went wrong");
            exit();
        } else {

            $isValid = password_verify($_POST['upwd'], $user->getHashedPwd());
        }

        if (!$isValid) {
            header("Location: ../../index.php?error=OOPs something went wrong");
            exit();

        } else {
            $_SESSION['uID'] = $user->getId();
            header("Location: ../../index.php?message=Success");
            exit();

        }

    } else {
        header("Location: ../../index.php?message=cantTouchThis");
        exit();


    }

