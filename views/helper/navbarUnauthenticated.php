<?php

    function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    $path = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME);

?>

<nav class="navbar navbar-inverse navbar-fixed-top blue" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Awesome CMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">


            </ul>

            <form class="navbar-form navbar-right" method="post" action="views/nonDisplayApplications/logmein.php">
<!--                <label style="color: white" for="username">Benutzername</label>-->
                <input type="text"  class="form-control" id="username" name="username" placeholder="Benutzername">
<!--                <label style="color: white" for="upwd">Password</label>-->
                <input type="password" class="form-control" id="upwd" name="upwd" placeholder="Passwort">

                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div><!--/.navbar-collapse -->
    </div>
</nav>
<br><br>