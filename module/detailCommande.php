<?php
	 
	 	require_once("../inc/autoload.php");


	 	/*
                
        if(isset($_POST['idClient'])){
        	$client=new Client();
            $idClient=$_POST['idClient'];
				$result=$client-> getClientById($idClient);
            
       
        

 $donnee=$result->fetchAll();

                if(count($donnee)>0){
              $retour=array('nom'=>$donnee[0]['nom'],'prenom'=>$donnee[0]['prenom']);
echo json_encode($retour);
                }else{
                    echo json_encode("prob requet");
                }
        }else{
            echo json_encode("prob post");
        }
*/
	
	if(isset($_POST['idCommande'])){
		
		$idCommande=$_POST['idCommande'];
		//$action=$_POST['action'];

$retour=array();
		$commande=new Commande();
		$result=$commande->getAllProduit($idCommande);
		//$donnee=$result->fetchAll();
		 //if(count($result->fetchAll())>0){
		 	//for($i=0;$i<count($donnee);$i++){
  //  $retour=array();
		 	while ($donnee=$result->fetch()) {
		 		
              $retour[]=array('nom'=>$donnee['nom'],
              				'quantite'=>$donnee['quantite'],
              				'prix'=>$donnee['prixTot']);
              
		 	}
		 echo json_encode($retour);
//}
//echo json_encode($retour);
//}
             /*   }else{
                    echo json_encode("prob requet");
                }*/
        }else{
            echo json_encode("prob post");
        }

?>