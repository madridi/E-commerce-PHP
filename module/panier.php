<?php
	require_once("../inc/autoload.php");


	
		if(isset($_GET['idProd']) && isset($_GET['action'])){
		$sortie=array();
		$idProd=$_GET['idProd'];
		$action=$_GET['action'];

		

		$produit=new Produit();
		$result=$produit->getProduit($idProd);
		$donnee=$result->fetchAll();
		

		if(count($donnee)>0){
			switch ($action) {
				case '0':
					 Session::supprimerProduit($idProd);
					 $sortie=array('idProd'=>$idProd,
					 				'action'=>'1',
					 				'prixTot'=>$_SESSION['panier']['prixTot'],
					                'nbrProduit'=>$_SESSION['panier']['nbrProduit']);
					
					break;
				case '1':
				
				    Session::ajouterProduit($idProd);
					$sortie=array('idProd'=>$idProd,
					 				'action'=>'0',
					 				'prixTot'=>$_SESSION['panier']['prixTot'],
					                'nbrProduit'=>$_SESSION['panier']['nbrProduit']);
					break;
				
			}

		}
		echo json_encode($sortie);
	}
?>
