<?php
		require_once("../inc/autoload.php");


$retour=array();
	if(isset($_GET['idProd'])&&(isset($_GET['quantite']))&&(isset($_GET['quantiteTot']))&&(isset($_GET['prixTot']))){

		$idProd=$_GET['idProd'];
		$qauntite=$_GET['quantite'];
		$prixTot=$_GET['prixTot'];
		$quantiteTot=$_GET['quantiteTot'];
			$_SESSION['panier'][$idProd]=$qauntite;
			$_SESSION['panier']['prixTot']=$prixTot;
			$_SESSION['panier']['nbrProduit']=$quantiteTot;
			$retour=array('quantite'=>$_SESSION['panier'][$idProd]);
			
	}
echo json_encode($retour);
?>