<?php

	require_once("_header.php");
	
	if(!empty($_SESSION['idClient'])){
	
	$listeCommande=new Commande();
	$result=$listeCommande->getAllCommande($_SESSION['idClient']);
	$donnees=$result->fetchAll();
	?>
  <div id="detailCommande" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4>Detail Commande</h4>
      </div>
      <div class="modal-body" >

        <table class="table table-striped tcart" >
          <thead>
          <tr>
            <th >Produit</th>
            <th >Quantité</th>
            <th >Prix</th>
            <th >Prix Total</th>
          </tr>
          </thead>
          <tbody class="tableauCommande">
          
          
          </tbody>
        </table>

      </div>
     
    </div>
  </div>
</div>


	<div class="items" style="background-color: white;">
  		<div class="container">
		    <div class="row">


		    	 <div class="col-md-9 col-sm-9">
        <!-- title -->
          <h5 class="title">Historique des commandes</h5>

            <table class="table table-striped tcart" style="width: 850px">
              <thead>
                <tr>
                  <th style="width: 50px">Date de Commande</th>
                  <th style="width: 50px">ID</th>
                  <th style="width: 50px">Nombre de produit</th>
                  <th style="width: 50px"> Prix Total</th>
                  <th style="width: 50px"></th>
                  
                </tr>
              </thead>
              <tbody>
               <?php
		    		foreach($donnees as $donnee){
		    	?>

		    	<tr>
		    		<td><?php echo $donnee['dateCommande']; ?></td>
		    		<td><?php echo $donnee['idCommande']; ?></td>
		    		<td><?php echo $donnee['nbrProduit']; ?></td>
		    		<td><?php echo $donnee['prix']; ?> DT</td>
		    		<td><a href="#detailCommande" rel=<?php echo $donnee['idCommande']?> class="detail"  data-toggle="modal">Detail</a></td>
		    	</tr>

		    	<?php
		   		 }	
		    	?>
		    	</tbody>
		    	</table>
		    	</div>



    		</div>
    	</div>
    </div>
    <script type="js/detailCommande.js"></script>
<?php
}
else{
	require_once("erreur.php");
}
	require_once("_footer.php");


?>