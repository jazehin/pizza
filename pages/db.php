<?php

function Connect()
{
    $server = "localhost";
    $user   = "root";
    $pass   = "";
    $db     = "14sz";

    $con = mysqli_connect($server, $user, $pass, $db);
    if (!$con) 
    {
        die("nem");
    }

    return $con;
}

?>