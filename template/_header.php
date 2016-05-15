<?php
     
     $categorie=new Categorie();
     $result=$categorie->getAllCategorie();
    #detailCommande
    //if(array_key_exists('idClient', $_SESSION)){
      if(!empty($_SESSION['idClient'])){
    //$_SESSION['idClient']=null;
    $client=new Client();
    //$_SESSION['idClient']=1;
    $ClientCurrent=$client->getClient($_SESSION['idClient']);
// $_SESSION['panier']=null;
   
    
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>LinCommerce</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>

  <!-- Stylesheets -->
  <link href="style/bootstrap.css" rel="stylesheet">
  <!-- Pretty Photo -->
  <link href="style/prettyPhoto.css" rel="stylesheet">
  <!-- Flex slider -->
  <link href="style/flexslider.css" rel="stylesheet">
  <!-- Sidebar nav -->
  <link href="style/sidebar-nav.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="style/font-awesome.css"> 
  <!-- Main stylesheet -->
  <link href="style/style.css" rel="stylesheet">
  <!-- Stylesheet for Color -->
  <link href="style/red.css" rel="stylesheet">
  
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/lin.png" >
</head>

<body>

 
<!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">

        <div class="col-md-4">
          <!-- Logo. Use class "color" to add color to the text. -->
          <div class="logo">
            <h1><a href=<?php echo dirname($_SERVER['PHP_SELF']); ?> > <img src="img/ecommerce.png" style="width: 35px;height: 35px;"></img>Lin<span class="color bold">E-Commerce</span></a></h1>
            <p class="meta"></p>
          </div>
        </div>

        <div class="col-md-6 col-md-offset-8">
          
          <!-- Search form -->
           

          <div class="hlinks ">
           
              <?php

                     if(!empty($_SESSION['idClient'])){
                   ?>
              <span >

              <!-- item details with price -->
              <a href="#cart" role="button" data-toggle="modal" class="panier">

              <span class="nbrProduit">
              <?php if(!empty($_SESSION['panier']['nbrProduit'])){echo $_SESSION['panier']['nbrProduit'];}else{echo "0";}?></span> Produits <i class="icon-shopping-cart"></i> 

              <span class="prixTot">
              <?php if(!empty($_SESSION['panier']['prixTot'])){echo $_SESSION['panier']['prixTot'];}else{echo "0";}?></span> DT   </a> 
              </span>

              <span class="lr"><a href="#modifierProfil" role="button" data-toggle="modal" class="bonjour"><span><i class="icon-user"> </i>   <span style="color:#66FF33  ;"> 
              <?php echo $ClientCurrent->getNom(); ?> </span></span> </a> 
              </span>

              <span class="lr" >

              <!-- item details with price -->
              <a href=<?php echo dirname($_SERVER['PHP_SELF'])."\module\deconnecter.php" ;?> role="button" > <i class="icon-close"></i>   Déconnecter</a> 
              </span>

              <?php
                }
                else{
              ?>

            

              <!-- Login and Register link -->
              <span class="lr"><a href="#login" role="button" data-toggle="modal">Login</a> ou <a href="#ajouter" role="button" data-toggle="modal">Register</a></span>

              <?php
           }
              ?>
          </div>
 
    
        </div>

      </div>
    </div>
  </header>
  <!-- Header ends -->
  
  
  <div id="detailProduit" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4>Detail de produit</h4>
  </div>
  <div class="modal-body">
       <table class="table table-striped tcart">
              
            <tbody class="detailProd">
               

          

          </tbody>
          </table>
  </div>
  </div>
  </div>
  </div>
  
  <!-- Cart, Login and Register form (Modal) -->

    <!-- Cart Modal starts -->
<div id="cart" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content" id="containerPanier">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4>Panier</h4>
      </div>
      <div class="modal-body">

        <table class="table table-striped tcart" >
          <thead class="tableauPanier">
      
         
          </thead>
          <tbody class="detailPanier">
            
          
          </tbody>
        </table>

      </div>
      <div class="modal-footer" id="footerPanier">
      <a href=<?php echo dirname($_SERVER['PHP_SELF']).'/module/viderPanier.php'; ?> class="btn btn-danger">Vider le panier</a>
        <a href=<?php echo dirname($_SERVER['PHP_SELF']).'/module/passerCommande.php'; ?> class="btn btn-danger">Passer la commande</a>

      </div>
    </div>
  </div>
</div>



<!-- Cart modal ends -->

  <!-- Login Modal starts -->
<div id="login" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4>Login</h4>
  </div>
  <div class="modal-body">

                    <div class="form" >

                                      <form class="form-horizontal" action=<?php echo dirname($_SERVER['PHP_SELF'])."\module\connecter.php "; ?>method="post">   
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="loginCnx">Login</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="loginCnx" name="loginCnx">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="mdpCnx">Mot de passe</label>
                                            <div class="col-md-9">
                                              <input type="password" class="form-control" id="mdpCnx" name="mdpCnx">
                                            </div>
                                          </div>
                                          <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                                             
                       </div>
                                          </div> 
                                          
                                          <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-default">Login</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                          </div>
                      </div>
                                      </form>
                                    </div> 

  </div>
  <div class="modal-footer">
    <p>Vous n'avez pas un compte? <a href="#ajouter"  data-toggle="modal">Register</a> ici.</p>
  </div>
  </div>
  </div>
</div>




<div id="modifierProfil" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4>Modifier votre profil</h4>
  </div>
  <div class="modal-body">
    <div class="form">
                                      <form class="form-horizontal" action=<?php echo dirname($_SERVER['PHP_SELF'])."\module\modifierProfil.php " ;?>method="post">
                                       <div class="form-group">
                                            <label class="control-label col-md-3" for="login">Login</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="login" name="login"
                                              value=<?php if(!empty($_SESSION['idClient'])){echo $ClientCurrent->getLogin();}?>>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3" for="mdp">Mot de passe</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="mdp" name="mdp"
                                              value=<?php if(!empty($_SESSION['idClient'])){ echo $ClientCurrent->getMdp();}?>>
                                            </div>
                                          </div>
                                          
                                         
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="nom">Nom</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="nom"  name="nom"
                                              value=<?php if(!empty($_SESSION['idClient'])){echo $ClientCurrent->getNom();}?>>
                                            </div>
                                          </div>   
                                           <div class="form-group">
                                            <label class="control-label col-md-3" for="prenom">Prenom</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="prenom"  name="prenom"
                                              value=<?php if(!empty($_SESSION['idClient'])){echo $ClientCurrent->getPrenom();}?>>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="email">Email</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="email"  name="email"
                                              value=<?php if(!empty($_SESSION['idClient'])){ echo $ClientCurrent->getEmail();}?>>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="adresse">Adresse</label>
                                            <div class="col-md-9">                               
                                                <select class="form-control" id="adresse" name="adresse"
                                                <option><?php if(!empty($_SESSION['idClient'])){echo $ClientCurrent->getAdresse();}?></option>
                                                <option>Ariana</option>
                                                <option>Tunis</option>
                                                <option>Bizert</option>
                                                <option>Mannouba</option>
                                                <option>Nabel</option>
                                                <option>Hammamet</option>
                                                <option>Sfax</option>
                                                <option>Tabarka</option>
                                                <option>Beja</option>
                                                </select>  
                                            </div>
                                          </div>           
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="tlf">Telephone</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="tlf" name="tlf"
                                              value=<?php if(!empty($_SESSION['idClient'])){ echo $ClientCurrent->getTlf();}?>>
                                            </div>
                                          </div>







                                          
                                          <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                                           
                      </div>
                                          </div> 
                                          
                                          <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-default">Modifer</button>
                                            
                      </div>
                                          </div>
                                      </form>
                                    </div>
  </div>
 
  </div>
  </div>
</div>

  <!-- Register Modal starts -->

<div id="ajouter" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4>Register</h4>
  </div>
  <div class="modal-body">
    <div class="form">
                                      <form class="form-horizontal" action=<?php echo dirname($_SERVER['PHP_SELF'])."\module\ajouterClient.php";?> method="post">
                                       <div class="form-group">
                                            <label class="control-label col-md-3" for="login">Login</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="login" name="login">
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-3" for="mdp">Mot de passe</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="mdp" name="mdp">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="mdp">Confirme mot de passe</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="mdp" name="mdpConfirmer">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="nom">Nom</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="nom" name="nom">
                                            </div>
                                          </div>   
                                           <div class="form-group">
                                            <label class="control-label col-md-3" for="prenom">Prenom</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="prenom" name="prenom">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="email">Email</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="email" name="email">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="adresse">Adresse</label>
                                            <div class="col-md-9">                               
                                                <select class="form-control" id="adresse" name="adresse">
                                                <option>&nbsp;</option>
                                                <option>Ariana</option>
                                                <option>Tunis</option>
                                                <option>Bizert</option>
                                                <option>Mannouba</option>
                                                <option>Nabel</option>
                                                <option>Hammamet</option>
                                                <option>Sfax</option>
                                                <option>Tabarka</option>
                                                <option>Beja</option>
                                                </select>  
                                            </div>
                                          </div>           
                                          <div class="form-group">
                                            <label class="control-label col-md-3" for="telephone">Telephone</label>
                                            <div class="col-md-9">
                                              <input type="text" class="form-control" id="telephone" name="tlf">
                                            </div>
                                          </div>
                                          
                                          
                                          <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                                           
                      </div>
                                          </div> 
                                          
                                          <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" class="btn btn-default">Register</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                      </div>
                                          </div>
                                      </form>
                                    </div>
  </div>
  <div class="modal-footer">
    <p>vous avez un compte? <a href="#login" data-toggle="modal">Login</a> ici.</p>
  </div>
  </div>
  </div>
</div>

<!-- Register modal ends -->

  <!-- Navigation -->
         <div class="navbar bs-docs-nav" role="banner">
           
             <div class="container">
               <div class="navbar-header">
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
      
        </div>
               <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
                 <ul class="nav navbar-nav">
                   <li><a href=<?php echo dirname($_SERVER['PHP_SELF']); ?>><i class="icon-home"></i></a></li>

                   <?php

                      if(!empty($_SESSION['idClient'])){
                   ?>
                   <li class="dropdown">
                      <a href=<?php echo dirname($_SERVER['PHP_SELF']).'/?page=listeCommande'; ?> >Liste Commandes</a>
                      
                   </li>                   
                  
                  <?php
                    }
                    
                    while($donne=$result->fetch()){
                     ?>
                     <li class="dropdown">
                      <a href=<?php echo dirname($_SERVER['PHP_SELF']).'/?page=catalogue&amp;categorie='.$donne['idCategorie']; ?> > <?php echo $donne['nomCategorie'] ?></a>
                      
                   </li>

                   <?php

                    }

                  ?>
                                                      
                   
                   <li><a href= <?php echo dirname($_SERVER['PHP_SELF']).'/?page=contact'; ?> >Contact</a></li>
                 </ul>
               </nav>
              </div>
           </div>
    <div><br><br></div>
          
