<?php
	
	require_once('../inc/autoload.php');

	$panier=new Panier();
	$sortie=array();
	$sortie['nbrProduit']=$panier->_nombreProduit;
	$sortie['prixTot']=$panier->$_totalPrix;;
	retrun json_encode($sortie);
