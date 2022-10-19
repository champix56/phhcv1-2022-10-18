<?php
include_once 'include/functions/sql.php';
/**
 * fonction pour recuperer un tableau de categories
 */
function getCategories(){
    //recup descripteur $mysqli
    global $mysqli;
    //requete
    $req="SELECT `id`,`nom` FROM `categories`";
    //query
    $result = mysqli_query($mysqli,$req);
    //creer tableau
    $return_tab=[];
    //pour chaque  fetch_assoc pousser la ligne dans le tableau
    while ($categorie = mysqli_fetch_assoc($result)) {
        array_push($return_tab,$categorie);
    }
    //retourner le tableau rempli
    return $return_tab;
}
?>