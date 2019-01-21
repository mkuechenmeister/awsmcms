<?php

    /**
     * Created by PhpStorm.
     * User: Martin
     * Date: 16.01.2019
     * Time: 23:24
     */
    require_once "ndinit.php";
    if (isset($_POST['uname'])) {

        $uname = htmlspecialchars($_POST['uname']);
        $first = htmlspecialchars($_POST['first']);
        $last = htmlspecialchars($_POST['last']);
        $mail = htmlspecialchars($_POST['mail']);
        $password = htmlspecialchars($_POST['password']);
        $cpassword = htmlspecialchars($_POST['cpassword']);

        if (!$password == $cpassword) {
            header("Location: ../../signup.php?error=OOps Something went wrong1");
        } else {
            $temp = User::getUserByUsername($uname);
            if ($temp == null) {
                User::createNewUser($uname, $first, $last, $mail, password_hash($password, PASSWORD_DEFAULT));//==bcrypt
                header("Location: ../../index.php?message=Success");
            } else {

                var_dump($temp);

                header("Location: ../../signup.php?error=OOps Something went wrong2");
            }
        }


    }