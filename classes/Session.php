<?php
require_once('../inc/autoload.php');
	class Session{

		public static function supprimerProduit($idProd,$quantite=null){

			if(!empty($_SESSION['panier'][$idProd])){

				$produit=new Produit();
				$prix=$produit->getPrixProd($idProd);

				if($quantite!=null){
					
				
					$_SESSION['panier']['nbrProduit']=floatVal($_SESSION['panier']['nbrProduit'])-$quantite;
					$_SESSION['panier']['prixTot']=floatVal($_SESSION['panier']['prixTot'])-(floatVal($prix['prixTot'])*$quantite);
					
					$_SESSION['panier'][$idProd]=floatVal($_SESSION['panier'][$idProd])-$quantite;
					
				}
				else{
						$_SESSION['panier']['nbrProduit']=floatVal($_SESSION['panier']['nbrProduit'])-floatVal($_SESSION['panier'][$idProd]);
						$_SESSION['panier']['prixTot']=floatVal($_SESSION['panier']['prixTot'])-((floatVal($prix['prix']))
						*(floatVal($_SESSION['panier'][$idProd])));
						unset($_SESSION['panier'][$idProd]);
					
				
					//unset($_SESSION['panier']['$idProd']);
					}
			}
		}
		

		public static function ajouterProduit($idProd,$quantite=1){
			$produit=new Produit();
			$prix=$produit->getPrixProd($idProd);

			if(empty($_SESSION['panier']['prixTot']))
				{$_SESSION['panier']['prixTot']=0;}

			if(empty($_SESSION['panier']['nbrProduit']))
				{$_SESSION['panier']['nbrProduit']=0;}

			$_SESSION['panier']['nbrProduit']=floatVal($_SESSION['panier']['nbrProduit'])+$quantite;
			$_SESSION['panier']['prixTot']=floatVal($_SESSION['panier']['prixTot'])+(floatVal($prix['prix'])*$quantite);
		
			$_SESSION['panier'][$idProd]=$quantite;
			
		}
	}

?>