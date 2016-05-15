<?php

	class Commande extends Application{

		public $_table="commande";

		public function getAllCommande($idClient){

			$result=$this->db->query('select c.idCommande,c.dateCommande, SUM(lc.prixTot) as prix, SUM(lc.quantite) as nbrProduit
									from commande c,lignecommande lc 
									where c.idCommande=lc.idCommande and c.idClient='.$idClient.
									'  group by c.idCommande order by c.dateCommande desc ');
			return $result;
		}

		public function passerCommande($idClient){

			if(!empty($_SESSION['panier'])){
				//ajouter COmmande
				$result = $this->db->prepare('INSERT INTO commande (idClient,dateCommande) 
				VALUES(
				 :idClient,
				 NOW())');
				 
			   $result->execute(array(
				'idClient'=>$idClient));

				//recuperer idCOmmande de dernier commande

			$result = $this->db->query('select idCommande from commande where idClient='.$idClient.' order by dateCommande desc ');
			$donnee=$result->fetchAll();
			$idCommande=$donnee[0]['idCommande'];
			echo "<script>alert(".$idCommande.");</script>";
			$produit=new Produit();
			 foreach ($_SESSION['panier'] as $key => $value) {
			   if(($key!="prixTot")&&($key!="nbrProduit")){
				
				$result2=$produit->getProduit($key);
				$donnee=$result2->fetchAll();

				$prixTot=FloatVal($donnee[0]['prix'])*FloatVal($_SESSION['panier'][$key]);

				$result3 = $this->db->prepare('INSERT INTO lignecommande (idCommande,IdProduit,quantite,prixTot) 
				VALUES(
				 :idCommande,
				 :IdProduit,
				 :quantite,
				 :prixTot)');
				 
				   $result3->execute(array(
				'idCommande'=>$idCommande,
				'IdProduit'=>$donnee[0]['IdProduit'],
				'quantite'=>$_SESSION['panier'][$key],
				'prixTot'=>$prixTot));
				 
			}
		
		}
}
}
		public function getAllProduit($idCommande){

			$result=$this->db->query('select  p.nom, lc.quantite, lc.prixTot
									from lignecommande lc, produit p
									where  p.IdProduit=lc.IdProduit and lc.idCommande='.$idCommande);
			return $result;
		}
	}

?>