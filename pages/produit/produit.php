<!-- vue d'un produit -->
<?php
    include_once('produit.functions.php');
    if(isset($_GET['idp'])){
    $produit=getProduit($_GET['idp']);
    var_dump($produit);
?>
<div id="produit-unique">
    <h2><?= $produit['nom'] ?></h2>
    <hr/>
    <div class="horizontal-layout">
        <div class="produit-unique-image">
            <img src="<?= $produit['image']?>" class="img-responsive" alt="Image">
        </div>
        <div class="produit-unique-center">
            <h3>Description :</h3>
            <?= $produit['description']?>
            <div class="produit-unique-prix"><?= $produit['prix']?>€</div>
            <button type="button" class="btn btn-info">Ajouter</button>
        </div>
        <div class="produit-unique-admin-buttons">
            <button type="button" class="btn btn-info">Supprimer</button>
            <button type="button" class="btn btn-warning">Editer</button>
        </div>
    </div>
</div>
<?php } ?>