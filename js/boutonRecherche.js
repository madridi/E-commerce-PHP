$(function(){


	$('#boutonRecherche').click(function(){
		var nomProduit
		 	$.ajax({
  	 		type:'Post',
  	 		url:'pages/recherche.php',
  	 		dataType:'json',
        
   	 	data:"nomProduit="+nomProduit,
    //  beforeSend:function(data){alert(item[1])},
  	 		success:function(data){},
  	 			error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                     }

	});
 
});
	});