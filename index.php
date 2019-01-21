
<?php
    $pageTitle = "Martin´s Awesome CMS";
    include_once "views/helper/init.php";

    /**************************Lade den jeweiligen Header***********************************/

    if ($isLoggedIn) {
        include_once "views/helper/navbar.php";
    } else {
        include_once "views/helper/navbarUnauthenticated.php";
    }

    /**********************************************Lade den Jeweiligen Content****************************/

    if ($isLoggedIn) {
        include_once "views/content/indexAuthentificated.php";
    }else {
        include_once "views/content/indexUnauthenticated.php";
    }
    /**********************************************Lade den Footer****************************/

    include_once "views/helper/footer.php";

?>



