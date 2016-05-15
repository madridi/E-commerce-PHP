<?php
	 
	 	require_once("../inc/autoload.php");

	
	if(isset($_POST['idProduit'])){
		
		$idProduit=$_POST['idProduit'];
		//$action=$_POST['action'];

        $retour=array();
		$produit=new Produit();
		$result=$produit->getDetailProduit($idProduit);
		$donnee=$result->fetchAll();
		 if(count($donnee)>0){
		 	//for($i=0;$i<count($donnee);$i++){
		 	
              $retour=array('nom'=>$donnee[0]['nomProduit'],
              				'description'=>$donnee[0]['description'],
              				'categorie'=>$donnee[0]['nomCategorie'],
              				'marque'=>$donnee[0]['nomFournisseur'],
              				'prix'=>$donnee[0]['prix'],
              				'photo'=>$donnee[0]['photo'],
              				'quantite'=>$donnee[0]['quantite']);
		 	
		 
echo json_encode($retour);
//}
               }else{
                    echo json_encode("prob requet");
                }
        }else{
            echo json_encode("prob post");
        }

?>