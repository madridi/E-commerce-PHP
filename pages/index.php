<?php
require_once('_header.php');

  $produit=new Produit();
  $result=$produit->getAllproduits();
  $donnees=$result->fetchAll();

  $result->closeCursor();
  


    $categorie=new Categorie();
     $resultCat=$categorie->getAllCategorie();
     $donneesCat=$resultCat->fetchAll();

     $fournisseur=new Fournisseur();
     $resultFour=$fournisseur->getAllFournisseur();
     $donneesFour=$resultFour->fetchAll();

  
?>

<!-- Flex Slider starts -->
<form class="form-inline  col-md-4 col-md-offset-8" role="form" style="margin-left: 820px;" method="POST" action=<?php echo dirname($_SERVER['PHP_SELF']).'\pages\recherche.php'; ?>>
        <div class="form-group">
        <input type="text" class="form-control" id="search" placeholder="Rechercher" name="nomProduit">
        </div>
        
        <button type="submit" class="btn btn-default" id="boutonRecherche">Rechercher</button>
      </form>
<div><br></div>
<div class="container flex-main">
  <div class="row">
    <div class="col-md-12">
            
            <div class="flex-image flexslider">
              <ul class="slides">
                  <!-- Each slide should be enclosed inside li tag. -->
                  
                  <!-- Slide #1 -->
                  <?php
                  
                    foreach($donnees as $donnee){
                      if($donnee['etat']=="promo"){


                  ?>
                <li>
                  <!-- Image -->
                  <img src=<?php echo $donnee['photo'] ;?> alt=""/>
                  <!-- Caption -->
                  <div class="flex-caption">
                     <!-- Title -->
                     <h3><?php echo $donnee['nom']; ?> <span class="color">Juste <?php echo $donnee['prix']; ?> DT </span></h3>
                     <!-- Para -->
                     <p> <?php echo $donnee['description']; ?> </p>
                     <?php

                      if(!empty($_SESSION['idClient'])){
                   ?>
                    <div class="button">
                      <?php  echo Panier::activeBouton($donnee['IdProduit']); ?>
                     </div>
                   <?php
                   }
                   ?>
                    
                  </div>
                </li>
                <?php
                }
                }
                
                ?>
                  
               
                
              </ul>
            </div>

    </div>
  </div>
</div>

<!-- Flex slider ends -->

<!-- Promo box starts -->



<!-- Promo box ends -->






<!-- Items -->





<div class="items">
  <div class="container">
    <div class="row">

      <!-- Sidebar -->
      <div class="col-md-3 col-sm-3 hidden-xs">

        <h5 class="title">Categories</h5>
        <!-- Sidebar navigation -->
          <nav>
            <ul id="nav">
              <!-- Main menu. Use the class "has_sub" to "li" tag if it has submenu. -->
              <li><a href=<?php echo dirname($_SERVER['PHP_SELF']); ?> >Home</a></li>


                  

                     <?php

                    
                    foreach($donneesCat as $donneeCat){
                     ?>
              <li class="has_sub"><a href="#"><?php echo $donneeCat['nomCategorie']; ?></a>
                <!-- Submenu -->
                <ul>
                <?php
                 foreach($donneesFour as $donneeFour){
                 ?>
                     <li><a href=<?php echo dirname($_SERVER['PHP_SELF']).'/?page=catalogue&amp;categorie='.$donneeCat['idCategorie'].'&amp;fournisseur='.$donneeFour['idFournisseur'];?> >
                       <?php echo $donneeFour['nom'] ;?> </a></li>
                  <?php
                  }
                  ?>
                              
                </ul>
              </li>
               <?php

                    }

                  ?>
             
              
            </ul>
          </nav>
<br />
          <!-- Sidebar items (featured items)-->

          <div class="sidebar-items">

            <h5 class="title">Nouveaux produits</h5>

            <!-- Item #1 -->
            <?php
              for($i=0;$i<count($donnees);$i++){
                 if($i==4){
                   break;
                 }

            ?>
            <div class="sitem">
              <!-- Don't forget the class "onethree-left" and "onethree-right" -->
              <div class="onethree-left">
                <!-- Image -->
                <a href="#detailProduit" data-toggle="modal" class="getDetailProduit" rel=<?php echo $donnee['IdProduit']?>><img src=<?php echo $donnees[$i]['photo']; ?> alt="" class="img-responsive" /></a>
              </div>
              <div class="onethree-right">
                <!-- Title -->
                <a href="#detailProduit" data-toggle="modal" class="getDetailProduit" rel=<?php echo $donnee['IdProduit']?>><?php echo $donnees[$i]['nom']; ?></a>
                <!-- Para -->
                <p><?php echo $donnees[$i]['description']; ?></p>
                <!-- Price -->
                <p class="bold"><?php echo $donnees[$i]['prix']." DT"; ?></p>
              </div>
              <div class="clearfix"></div>
            </div>

           <?php
           }
           ?>

      </div>
   </div>

<!-- Main content -->
      <div class="col-md-9 col-sm-9">

        <!-- Breadcrumb -->
       

                            <!-- Title -->
                              <h4 class="pull-left">Produits</h4>


                                          <!-- Sorting -->
                                            <div class="form-group pull-right">                               
                                                <select class="form-control" name="ordonner">
                                                <option>Date</option>
                                                <option>Nom (A-Z)</option>
                                                <option>Nom (Z-A)</option>
                                                <option>Prix (plus cher)</option>
                                                <option>Prix (moins cher)</option>
                                                
                                                </select>  
                                            </div>

                          <div class="clearfix"></div>

              <div class="row">

                <!-- Item #1 -->

                   <?php
                    
                    foreach($donnees as $donnee){
                   
                  ?>
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
                   <div class="button pull-right " ><?php  echo Panier::activeBouton($donnee['IdProduit']); ?></div>
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
               
                <div class="col-md-9 col-sm-9">
                <br><br><br>

                                    <!-- Pagination -->
                                    <div class="paging">
                                       <span class='current'>1</span>
                                       <a href='#'>2</a>
                                       <span class="dots">&hellip;</span>
                                       <a href='#'>6</a>
                                       <a href="#">Next</a>
                                    </div>
                </div>           

              </div>


            </div>                                                                    



    </div>
  </div>
</div>

<!-- Recent items carousel starts -->


<!-- Recent Posts ends -->

<!-- Newsletter starts -->


<!-- Newsletter ends -->

<!-- Footer starts -->

<?php
require_once('_footer.php');
?>
 