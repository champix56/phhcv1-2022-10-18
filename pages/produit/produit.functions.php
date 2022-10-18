<?php
include_once 'functions/sql/sql.php';
/**
 * get product all values
 */
function getProduit($id)
{
    global $mysqli;
    sql_connect();
    echo $req = "SELECT * FROM `produits` WHERE id=" . $id;
    $returned = mysqli_query($mysqli, $req);
    return mysqli_fetch_assoc($returned);
}
