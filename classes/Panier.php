<?php

	class Panier{
   


		public $_produit;
		public $_nombreProduit;
		public $_totalPrix;
		public $_vide;


		public function __construct(){
			$_produit=new Produit();
			$_vide=(empty($_SESSION['panier']))?true:false;
			$this->getNombreProduit();
			$this->getTotalPrix();
		}



		public function getTotalPrix(){

			$tot=0;
			if(!($this->_vide)){
				foreach($_SESSTION['panier'] as  $idProd=>$prod){
					$tot+=($prod['quantite']*$_produit->getPrixProduit($idProd));
				}
			}		
			$this->_totalPrix=$tot;

		}

		public function getNombreProduit(){

			$nbr=0;
			if(!($this->_vide)){
				foreach($_SESSTION['panier'] as $idProd=>$prod){
					$nbr+=$prod['quantite'];
				}
			}		
			$this->_nombreProduit=$nbr;
		}

		
		public static function activeBouton($idProduit){
		
			
			if (!empty($_SESSION['panier'][$idProduit])){
				$id=0;
				$label="Supprimer";
			}else{
				$id=1;
				$label="Acheter";
			}
			$sortie='<a href="#" class="ajouter_panier" id="bouton_'.$idProduit.'" ';
			$sortie.=($id==0)?:'style="background-color:#00CC00; "';
			$sortie.=' rel= "';
			$sortie.=$idProduit.'_'.$id.'" > ';
			$sortie.=$label." </a>";
			return $sortie;
			}
		}
	

?>