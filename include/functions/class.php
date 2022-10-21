<?php
class Produit
{
    private $id;
    protected $nom;
    protected $prix;
    protected $ean;
    protected $image;
    protected $idcat;
    public $description;
    /**
     * Class constructor.
     */
    public function __construct($id,$nom,$desc,$prix,$ean,$img,$idcat)
    {  
        //set d'une valeur interne
        $this->id=$id;  
        $this->nom=$nom;  
        $this->description=$desc;  
        $this->prix=$prix;  
        $this->idcat=$idcat;  
        $this->img=$img;  
        $this->ean=$ean;  
    }   
    public function setNom($value) {
        $this->nom=$value;
    } 
    public function saveToDB(){}
    protected function applyReduction($taux){
        $this->prix*=$taux;
    }
    public function getId(){return $this->id;}
}
class ProduitPanier extends Produit
{
    private $qte;
    /**
     * Class constructor.
     */
    public function __construct($id,$nom,$desc,$prix,$ean,$img,$idcat,$qte=1)
    {
        parent::__construct($id,$nom,$desc,$prix,$ean,$img,$idcat);
        $this->qte=$qte;
    }
    public static function fromProduit(Produit $pr){
        return new ProduitPanier($pr->getId(),$pr->nom,$pr->description,$pr->prix,$pr->ean,$pr->ean,$pr->image,$pr->idcat,1);
    }
    public function getQte(){return $this->qte;}
    public function add($qte=1){
        $this->qte+=$qte;
    }
    public function remove($quantite=1){
        if($this->qte>=$quantite)$this->qte -= $quantite;
        else $this->qte = 0;
    }
    public function getNomAndID(){
        return $this->getId().':'.$this->nom;
    }

    //exposition protected
    public function applyReduction($tx){parent::applyReduction($tx);}
}
 
class Panier{
    private Array $produits;
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->produits=[];
    }
    public function addProduit(ProduitPanier $produit)
    {
        $tabOfResponse=array_filter($this->produits,function($item) use( $produit){
            return $item->getId()==$produit->getId();
        });
        if(count($tabOfResponse)>=1){
            echo '<h2>present</h2>';
            $produitDuPanier=$tabOfResponse[0];
            $produitDuPanier->add(1);
            var_dump($this->produits);
        }
        else{
            echo '<h2>NON present</h2>';
            
            array_push($this->produits,$produit);
            var_dump($this->produits);

        }
    }
    //public function dumpPanier(){var_dump($this);}
}

?>