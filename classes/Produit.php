<?php
	
	class Produit extends Application{

		private $_table="produit";

		public function getAllproduits(){

			$result=$this->db->query('select * from produit');
			return $result;
		}

		public function getproduitsByNom($nomProduit){

			$result=$this->db->query('select * from produit where nom='.$nomProduit);
			return $result;
		}

		public function getProduit($idProd){
			$result=$this->db->query('select * from produit where IdProduit='.$idProd);
			return $result;
		}

		public function getPrixProd($idProd){
			$result=$this->db->query('select prix from produit where IdProduit='.$idProd);
			$prix=$result->fetch();
			return $prix;
		}

		public function getDetailProduit($idProduit){
			$result=$this->db->query('select  p.nom as nomProduit,p.description,p.quantite,p.prix,p.photo,c.nomCategorie,f.nom as nomFournisseur
				from produit p,fournisseur f,categorie c
			 where  c.idCategorie=p.idCategorie and
			 		f.idFournisseur=p.idFournisseur and
			 		p.IdProduit='.$idProduit);
			return $result;
		}
	}


?>