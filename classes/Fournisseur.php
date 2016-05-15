<?php

	class Fournisseur extends Application{

		private $_table="fournisseur";

		public function getFournisseurById($id){

				
			$result=$this->db->query('select * from '.$this->_table.'  where idFournisseur='.$id);
				
			return $result;
					

		}

		public function getFournisseurByNom($nom){

			$result=$this->db->query('select * from '.$this->_table.'  where idFournisseur='.$nom);
				
			return $result;
					

		}

		public function getAllFournisseur(){

				
			$result=$this->db->query('select * from '.$this->_table.' order by nom ASC');
				
			return $result;
					

		}

		public function getProduits($idFour){
			$result=$this->db->query('select f.nom as nomFournisseur,f.adresse,f.mail,p.nom,p.description,p.etat,p.photo,p.prix,p.idProduit from produit p,fournisseur f where f.idFournisseur=p.idFournisseur and f.idFournisseur='.$idFour);
			
				
			return $result;
		}
    	
    	public function getProduitsCategorie($idFour,$idCat){
    		$result=$this->db->query('select c.nomCategorie,f.nom as nomFournisseur,f.adresse,f.mail,p.IdProduit,p.nom,p.description,p.etat,p.photo,p.prix,p.idProduit from categorie c,produit p,fournisseur f where f.idFournisseur=p.idFournisseur and c.idCAtegorie=p.idCategorie and p.idFournisseur='.$idFour.' and p.idCategorie='.$idCat);
    		return $result;
    	}
		
	}
?>