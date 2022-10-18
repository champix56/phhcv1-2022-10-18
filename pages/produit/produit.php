<!-- vue d'un produit -->
<?php
    include_once('produit.functions.php');
    $produit=getProduit(1);
    var_dump($produit);
?>
<div id="produit-unique">
    <h2>TITRE DU PRODUIT</h2>
    <hr/>
    <div class="horizontal-layout">
        <div class="produit-unique-image">
            <img src="https://lapierre-shopware.accell.cloud/thumbnail/64/bb/9f/1648474576/E-Sensium%202.2%20MY21%20Web%20-%20View%20PNG_800x800.png" class="img-responsive" alt="Image">
        </div>
        <div class="produit-unique-center">
            <h3>Description :</h3>
            Excepteur laboris exercitation reprehenderit sunt amet elit quis voluptate. Nostrud Lorem minim sit consectetur laboris proident excepteur tempor. Officia veniam dolore sunt incididunt ut consequat quis nisi cillum eiusmod minim anim. Voluptate duis exercitation consequat et quis nisi laborum velit esse aliqua. Nisi irure occaecat ad exercitation cupidatat ex elit qui in ad culpa non dolor.
            Cupidatat est occaecat aliquip ex fugiat excepteur. Est proident irure culpa culpa cupidatat. Lorem pariatur magna dolore excepteur. Duis excepteur labore elit officia elit.
            <div class="produit-unique-prix">50.00€</div>
            <button type="button" class="btn btn-info">Ajouter</button>
        </div>
        <div class="produit-unique-admin-buttons">
            <button type="button" class="btn btn-info">Supprimer</button>
            <button type="button" class="btn btn-warning">Editer</button>
        </div>
    </div>
</div>
