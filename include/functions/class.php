<?php
class Produit
{
    private $id;
    private $nom;
    private $prix;
    private $ean;
    private $image;

    public $description;
    /**
     * Class constructor.
     */
    public function __construct($id,$nom,$desc,$prix,$ean,$img)
    {  
        //set d'une valeur interne
        $this->id=$id;  
        $this->nom=$nom;  
        $this->description=$desc;  
        $this->prix=$prix;  
        $this->img=$img;  
        $this->ean=$ean;  
    }    
}
class ProduitPanier extends Produit
{
    private $qte;
    /**
     * Class constructor.
     */
    public function __construct($id,$nom,$desc,$prix,$ean,$img,$qte=1)
    {
        parent::__construct($id,$nom,$desc,$prix,$ean,$img);
        $this->qte=$qte;
    }
    public function getQte(){return $this->qte;}
    public function add($qte=1){
        $this->qte+=$qte;
    }
    public function remove($quantite=1){
        if($this->qte>=$quantite)$this->qte -= $quantite;
        else $this->qte = 0;
    }
}
 
class Panier{
    private $produits;
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->produits=[];
    }
    public function addProduit(ProduitPanier $produit)
    {
        array_push($this->produits,$produit);
    }
    //public function dumpPanier(){var_dump($this);}
}

?>