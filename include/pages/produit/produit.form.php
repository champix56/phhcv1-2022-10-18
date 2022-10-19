<?php
    var_dump($_POST);
?>
<div id="produit-form" style=";padding:5px 25px;">
    <h2>Edition produit</h2>
    <form action="" method="POST">
        id:XXX<br/>
        <label for="nomProduit">Nom produit :</label>
        <input type="text" name="nomProduit" id="i_nomProduit"><br/>
        <label for="categorieProduit">Categorie</label>
        <select name="categorieProduit" id="i_categorieProduit">
            <option value="">une categorie</option>
        </select>
        <hr/>
        <div id="produit-form-content" style="display:flex">
            <div style="width:60%">
                <label for="descriptionProduit">Description</label><br/>
                <textarea name="descriptionProduit" id="i_descriptionProduit" cols="30" rows="10" style="margin-left:15%;width:70%;resize : none;"></textarea><br/>
                <label for="eanProduit">barcode</label><br/>
                <input type="text" name="eanProduit" id="i_eanProduit"><br/>
                <label for="prixProduit">Prix</label><br/>
                <input type="number" name="prixProduit" id="i_prixProduit" min="0.01" step="0.01">
        </div>
            <div style="flex-grow:1;padding:5px 15px;text-align:center">
                <label for="urlImageProduit">url image</label><br/>
                <input type="text" name="urlImageProduit" id="i_urlImageProduit" style="max-width:45vw;max-height:45vh;">
                <hr/>
                <img src="" alt="" id="imageProduit">
            </div>
        </div>
        <hr/>
        <div style="display:flex;justify-content:space-between;">
            <button type="reset" class="btn btn-warning">reset</button>
            <button type="submit" class="btn btn-info">valider</button>
        </div>
    </form>
</div>
