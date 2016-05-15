<?php
	
	class Login extends Application{

		public static $_loginPage="/page=login";
		
		public  function connecter($log,$mdp){

			global $client;
			$client=new Client();
			$result=$client->getClientByLoginMdp($log,$mdp);

			if(!empty($result)){
			   	$donnees=$result->fetchAll();

	             $_SESSION['idClient']=$donnees[0]['idClient'];
	    		 
	    		 
	    		 return true;
			
	}else{
		return false;
	}

		}

		public  function deconnecter(){

		}

	}
?>