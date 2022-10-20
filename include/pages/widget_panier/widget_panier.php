<?php
  session_start();
  var_dump($_SESSION);
?>

<style>
    #w-panier {display: flex;flex-direction: column;padding: 5px;}
    .w-panier-produit {display: flex;}
    .w-panier-produit td{padding: 2px 15px;}
    .w-panier-produit-img{max-width:128px;height: 100px;size: auto;}
    .w-panier-produit-content-body{min-width:200px;}
    .w-panier-produit-content-body>div:nth-child(1){text-decoration: underline;font-size: large;font-weight: 900;}
    .w-panier-produit-content-body .qte{font-style: italic;}
    /* .w-panier-produit-content-body>div:nth-child(2){font-style: italic;} */
    .w-panier-produit-total{text-align: right;padding-right: 10px;}
    .w-panier-produit-buttons{text-align: center;}
    .w-panier-produit-buttons>button{padding: 0 5px;height: 20px; font-size: 8px;}
  </style>
  <div id="w-panier">
    <div class="w-panier-produit">
      <table class="w-panier-produit-table">
        <tr>
          <td><img class="w-panier-produit-img" src="https://www.huezbikehire.com/wp-content/uploads/2020/11/PINARELLO-F12-NOIR-BLANC-1.jpg" alt="" /></td>
          <td class="w-panier-produit-content-body">
            <div>nom</div>
            <div class="qte">quantite x prix</div>
            <div class="w-panier-produit-buttons">
              <button type="button" class="btn btn-warning">-</button>
              <button type="button" class="btn btn-info">+</button>
            </div>
          </td>
          <td>prix total</td>
        </tr>
      </table>
    </div>
    <hr />
     <div class="w-panier-produit-total">Total : total</div>
  
    <button type="button" class="btn btn-primary">valider</button>
  </div>
  