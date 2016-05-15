<?php
		require_once("../inc/autoload.php");


$retour=array();
	if(isset($_GET['idProd'])&&(isset($_GET['quantite']))&&(isset($_GET['prixTot']))){

		$idProd=$_GET['idProd'];
		$quantite=$_GET['quantite'];
		$prixTot=$_GET['prixTot'];
		
			unset($_SESSION['panier'][$idProd]);
			$_SESSION['panier']['prixTot']=$_SESSION['panier']['prixTot']-$prixTot;
			$_SESSION['panier']['nbrProduit']=$_SESSION['panier']['nbrProduit']-$quantite;
			$retour=array('nbrProduit'=>$_SESSION['panier']['nbrProduit'],
							'prixTot'=>$_SESSION['panier']['prixTot']);
			
	}
echo json_encode($retour);
?>