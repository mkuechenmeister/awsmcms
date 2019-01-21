<?php
    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 19.01.2019
     * Time: 18:42
     */
    require_once "ndinit.php";

    if (!isset($_GET['updateID'])) {
        header('Location: /awsmcms');
        exit();
    }else{

        $tempUser = User::get($_GET['updateID']);
        if (!($currentUser == $tempUser)) {
            header('Location: /awsmcms');
            exit();

        }else{

            $first = $_POST['first'];
            $last = $_POST['last'];
            $uname = $_POST['uname'];
            $mail = $_POST['mail'];
            $pwd = $_POST['password'];
            $cpwd = $_POST['cpassword'];

            if ((!$pwd == null) && $pwd == $cpwd) {
                $hpwd = password_hash($pwd, PASSWORD_DEFAULT);
                $tempUser->setHashedPwd($hpwd);
            }

            if (!$first == null) {
                $tempUser->setFirstName($first);
            }

            if (!$last == null) {
                $tempUser->setLastName($last);
            }

            if (!$mail == null) {
                $tempUser->setEmail($mail);
            }

            if (!$uname == null) {
                $tempUser->setUsername($uname);
            }

            $tempUser->update();



            header('Location: /awsmcms');
            exit();

        }

    }