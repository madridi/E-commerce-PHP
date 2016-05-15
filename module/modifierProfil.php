<?php
	require_once("../inc/autoload.php");
	if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['login'])&&isset($_POST['mdp'])&&isset($_POST['adresse'])
		&&isset($_POST['email'])&&isset($_POST['tlf'])){
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$login=$_POST['login'];
			$mdp=$_POST['mdp'];
			$adresse=$_POST['adresse'];
			$email=$_POST['email'];
			$tlf=$_POST['tlf'];
			
			$client=new Client();
    
	    	$ClientCurrent=$client->getClient($_SESSION['idClient']);
			$ClientCurrent->modifier($_SESSION['idClient'],$nom,$prenom,$login,$mdp,$adresse,$email,$tlf);
	}else{
		header('location:/?page=erreur.php');
	}
?>