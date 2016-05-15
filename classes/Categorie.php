<?php

	class Categorie extends Application{

		private $_table="categorie";

		public function getcategorieById($idCat){

				
			$result=$this->db->query('select * from '.$this->_table.'  where idCategorie='.$idCat);
				
			return $result;
					

		}

		public function getCategorieByNom($nomCat){

			$result=$this->db->query('select * from '.$this->_table.'  where nomCategorie='.$nomCat);
				
			return $result;
					

		}

		public function getAllCategorie(){

				
			$result=$this->db->query('select * from '.$this->_table);
				
			return $result;
					

		}

		public function getProduits($idCat){
			$result=$this->db->query('select c.nomCategorie,p.nom,p.description,p.etat,p.photo,p.prix,p.IdProduit 
									from produit p,categorie c 
									where c.idCategorie=p.idCategorie and c.idCategorie='.$idCat);
			
				
			return $result;
					

		}

	}
?>