<?php

	require_once("../inc/autoload.php");
	if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['login'])&&isset($_POST['mdpConfirmer'])&&isset($_POST['mdp'])
		&&isset($_POST['adresse'])&&isset($_POST['email'])&&isset($_POST['tlf'])){
			$nom=$_POST['nom'];
			$prenom=$_POST['prenom'];
			$login=$_POST['login'];
			$mdp=$_POST['mdp'];
			$mdpConfirmer=$_POST['mdpConfirmer'];
			$adresse=$_POST['adresse'];
			$email=$_POST['email'];
			$tlf=$_POST['tlf'];
			
			if($mdp==$mdpConfirmer){
			$client=new Client();
    		$result=$client->ajouter($nom,$prenom,$login,$mdp,$adresse,$email,$tlf);
	    	if(!is_null($result)){
	    		header('location:../');
	    	}else{
	    		echo 'probleme lors de l"ajout';
	    	}
			
		}else{
			echo'<script>alert("les deux mots de passe ne sont pas identiques");</script>';
		}
	}else{
		header('location:/?page=erreur.php');
	}

?>