<?php
require_once('_header.php');

$idCat=Url::getParam("categorie");
$idFour=Url::getParam("fournisseur");

if(($idCat!=null)||($idFour!=null)){
		$type=null;
		if(($idFour!=null)&&($idCat!=null))
			$type="rechercherParFournisseur";
		else if($idCat!=null)
			$type="rechercheParCategorie"; 

		if($type=="rechercheParCategorie"){
		   $categorie=new Categorie();
		   $result=$categorie->getProduits($idCat);
		   $donnees=$result->fetchAll();
		}
		if($type=="rechercherParFournisseur"){
		   $fournisseur=new Fournisseur();
		   $result=$fournisseur->getProduitsCategorie($idFour,$idCat);
		   $donnees=$result->fetchAll();
		}
   ?>



<div class="items">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title"> 
        
        <?php  


        if(empty($donnees[0]['nomCategorie']) && ($type=="rechercheParCategorie")){
                 echo "Categorie Vide<br><br><br><br><br><br>";
      		  }else if($type=="rechercheParCategorie"){
        		echo $donnees[0]['nomCategorie'] ;
        	}
        	if(empty($donnees[0]['nomFournisseur']) && ($type=="rechercherParFournisseur")){
                 echo "Il n'a pas des produits<br><br><br><br><br><br>";
      		  }else if($type=="rechercherParFournisseur"){
        		echo "<u>Marque</u>: ".$donnees[0]['nomFournisseur']."<br>
        		       <u>Adresse</u>: ".$donnees[0]['adresse']."<br>
        		       <u>Mail</u>: ".$donnees[0]['mail']."<br>
        		       <u>Type Produits</u>: ".$donnees[0]['nomCategorie']."<br>" ;
        	}
         ?> 
        </h3>
      </div>
      <hr>
<?php
   foreach($donnees as $donnee){
  

?>  

      <!-- Item #1 -->
     <div class="col-md-4 col-sm-6">
        <div class="item">
          <!-- Item image -->
          <div class="item-image">
            <a href="#detailProduit" data-toggle="modal" class="getDetailProduit" rel=<?php echo $donnee['IdProduit']?>><img src=<?php echo $donnee['photo']?> alt="" style="width:100px;height:150px;" /></a>
          </div>
          <!-- Item details -->
          <div class="item-details">
            <!-- Name -->
            <!-- Use the span tag with the class "ico" and icon link (hot, sale, deal, new) -->
            <h5><a href="#detailProduit" data-toggle="modal" class="getDetailProduit" rel=<?php echo $donnee['IdProduit']?>><?php echo $donnee['nom']?></a>
            <?php 
            if($donnee['etat']=="promo") {
              echo '<span class="ico"><img src="img/hot.png" alt="" /></span>'; 
              }           
            ?>
            </h5>
            <div class="clearfix"></div>
            <!-- Para. Note more than 2 lines. -->
            <?php
               echo "<p>".$donnee['description']."</p>";
            ?>
            <hr />
            <!-- Price -->
            
            <div class="item-price pull-left"><?php echo $donnee['prix']." DT" ; ?></div>
             <?php

                      if(!empty($_SESSION['idClient'])){
                   ?>
                   <div class="button pull-right " class="ajouter_panier"><?php  echo Panier::activeBouton($donnee['IdProduit']); ?></div>
                   <?php
                   }
                   ?>
            <!-- Add to cart -->
            
            
          </div>
        </div>
      </div>
                                                                       

  



<?php
   }
?>

  </div>
  </div>
</div>
<?php
}else{
	require_once("erreur.php");
}

require_once('_footer.php');
?>