<?php

require_once('../inc/autoload.php');

$retour=array();
if(!empty($_SESSION['panier'])){
	  $produit=new Produit();
     foreach ($_SESSION['panier'] as $key => $value) {
			if(($key!="prixTot")&&($key!="nbrProduit")){
				
				$result=$produit->getProduit($key);
				$donnee=$result->fetch();
				$prix=floatVal($value)*floatval($donnee['prix']);
				
				 $retour[]=array(	'id'=>$donnee['IdProduit'],
				 					'nom'=>$donnee['nom'],
		              				'quantite'=>$value,
		              				'prix'=>($value*$donnee['prix']),
		              				'prixPiece'=>$donnee['prix']);
			}
		}

              				

		
	}	
	
		 echo json_encode($retour);

       

?>