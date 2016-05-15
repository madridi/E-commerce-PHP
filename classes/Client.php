<?php
	class CLient extends Application {
		public $_table="client";
		private $_idClient;
		private $_nomClient;
		private $_prenomClient;
		private $_adresseClient;
		private $_loginClient;
		private $_mdpClient;
		private $_tlfCLient;
		private $_emailClient;

	
		public function getClient($idClient){
			$result= $this->db->prepare('select * from client where idClient=:idClient');
				$result->execute(array('idClient' => $idClient));
			
			$donnees=$result->fetchAll();
			$this->_idClient=$donnees[0]['idClient'];
			$this->_nomClient=$donnees[0]['nom'];
			$this->_prenomClient=$donnees[0]['prenom'];
			$this->_adresseClient=$donnees[0]['adresse'];
			$this->_emailClient=$donnees[0]['email'];
			$this->_loginClient=$donnees[0]['login'];
			$this->_mdpClient=$donnees[0]['mdp'];
			$this->_tlfCLient=$donnees[0]['telephone'];
			return $this;
		}

		public function getClientById($idClient){
				
				
				$result=$this->db->query('select * from '.$this->_table.'  where idClient='.$idClient);
				
			return $result;
		}

		public  function getClientByLoginMdp($log,$mdp){

			$result= $this->db->prepare('select * from client where login=:login  and  mdp=:mdp');
				$result->execute(array(
				'login'=>$log,
				'mdp' =>$mdp)); 
			return $result;

		}

		

		public function modifier($idClient,$nom,$prenom,$login,$mdp,$adresse,$email,$tlf){

			$result = $this->db->prepare('UPDATE client 
				SET nom = :nom,
				 prenom = :prenom,
				 login = :login,
				 mdp = :mdp,
				 adresse = :adresse,
				 email = :email,
				 telephone = :tlf
				  WHERE idClient= :idClient');
			$result->execute(array(
				'nom'=>$nom, 
				'prenom'=>$prenom, 
				'login'=>$login, 
				'mdp'=>$mdp, 
				'adresse'=>$adresse, 
				'email'=>$email, 
				'tlf'=>$tlf, 
				'idClient'=>$idClient));
			
		}

		public function ajouter($nom,$prenom,$login,$mdp,$adresse,$email,$tlf){

			$result = $this->db->prepare('INSERT INTO client (nom,prenom,login,mdp,adresse,email,telephone) 
				VALUES(
				 :nom,
				 :prenom,
				 :login,
				 :mdp,
				 :adresse,
				 :email,
				 :tlf)');
				 
			$result->execute(array(
				'nom'=>$nom, 
				'prenom'=>$prenom, 
				'login'=>$login, 
				'mdp'=>$mdp, 
				'adresse'=>$adresse, 
				'email'=>$email, 
				'tlf'=>$tlf
				));

			$result=$this->getClientByLoginMdp($login,$mdp);
			if(!empty($result)){
			   	$donnees=$result->fetchAll();

	             $_SESSION['idClient']=$donnees[0]['idClient'];

			return $donnees;}
			return null;
			
		}

		public function getId(){
			return $this->_idClient;

		}
		public function getEmail(){
			return $this->_emailClient;

		}
		public function getNom(){
			return $this->_nomClient;
			
		}
		public function getPrenom(){
			return $this->_prenomClient;
			
		}
		public function getAdresse(){
			return $this->_adresseClient;
		}
		public function getLogin(){
			return $this->_loginClient;
		}
		public function getMdp(){
			return $this->_mdpClient;
		}
		public function getTlf(){
			return $this->_tlfCLient;
		}
	}
?>