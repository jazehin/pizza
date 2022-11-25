<?php

function Query($sql) {
    $con = Connect();
    $query = mysqli_query($con, $sql);
    mysqli_close($con);
    return $query;
}

function Rnd() {
    $sql = "SELECT count(ID) AS c FROM pizzak;";
    $result = Query($sql);
    return mysqli_fetch_array($result);
}

function Akcios() {
    $sql = "SELECT * FROM pizzak WHERE akcios = 1;";
    return Query($sql);
}

function Pizzak($sql) {
    return Query($sql);
}

function Adatlap($id) {
    $sql = "SELECT * FROM pizzak WHERE ID = " . $id . ";";
    return Query($sql);
}

?>