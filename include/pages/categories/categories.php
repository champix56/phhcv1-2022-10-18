<h2>Liste des catégories</h2><hr/>
<div id="categories-liste">
    <?php
include_once 'categories.functions.php';
//recuperation liste categories
$categories = getCategories();
//pour chaques lignes de categorie
foreach ($categories as $categorie) {
    //var_dump($categorie);
    //afficher le html de la categorie
    ?>
            <div class="categories-liste-categorie">
                <h3><?=$categorie['nom']?></h3>
                <a href="?page=produits&idcat=<?=$categorie['id'];?>"><button type="button" class="btn btn-info">voir</button></a>
            </div>
        <?php
}
?>
</div>