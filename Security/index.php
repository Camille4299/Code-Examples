<?php
    include("scripts/sessions.php");
    ?>
    <form action="scripts/doLogin.php" method="post">
        <input type="input" name="uName" value="" />
        <input type="submit" name="submit" value="Log In" />
    </form>
    <?php
        if((isset($_SESSION['message'])) && ($_SESSION['message'] === "Authenticated"))
        {
            echo $_SESSION['message'];
            echo "<p><a href=\"scripts/doLogout.php\">The Back Room ;-)</a></p>";
        }
    ?>