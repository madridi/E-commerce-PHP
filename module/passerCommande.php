<?php
require_once('../inc/autoload.php');
$commande=new Commande();
$result=$commande->passerCommande($_SESSION['idClient']);

require_once('viderPanier.php');


?>