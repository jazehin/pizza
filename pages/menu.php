<?php

$content = "pages/akcios.php";

if (isset($_GET["p"]))
{
    switch ($_GET["p"])
    {
        case "adatlap":
            $content = "pages/adatlap.php";
            break;
        case "pizzak":
            $content = "pages/pizzak.php";
            break;
        case "rnd":
            $content = "pages/rnd.php";
            break;
    }
}


?>