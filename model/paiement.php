<?php 

require_once("objet.php");

class paiement extends objet {

    protected static string $classe = "paiement";
    protected static string $identifiant = "IDPaiement";

    // ------------ attributs ---------------

    protected ?int $IDPaiement;
    protected string $datePaiement;
    protected float $montantPaiement;
    protected int $numCarteBancairePaiement;
    protected int $cryptogrammePaiement;
    protected string $nomPorteurCartePaiement;
    protected string $datePeremptionCarte;
    protected int $IDCommande;

    // ------------ constructeur -----------

    public function __construct(int $IDPaiement = NULL, string $datePaiement = NULL, float $montantPaiement = NULL,int $numCarteBancairePaiement = NULL,int $cryptogrammePaiement = NULL, string $nomPorteurCartePaiement = NULL, string $datePeremptionCarte = NULL, string $IDCommande = NULL) {
        if(!is_null($IDPaiement)){
            $this->IDPaiement = $IDPaiement;
            $this->datePaiement = $datePaiement;
            $this->montantPaiement = $montantPaiement;
            $this->numCarteBancairePaiement = $numCarteBancairePaiement;
            $this->cryptogrammePaiement = $cryptogrammePaiement;
            $this->nomPorteurCartePaiement = $nomPorteurCartePaiement;
            $this->datePeremptionCarte = $datePeremptionCarte;
            $this->IDCommande = $IDCommande;
        }
    }


}
?>