$(document).ready(function (){
   

    $('.detail').click(function(){
        var trigger=$(this);
      var idCommande=trigger.attr("rel");
       $('.tableauCommande').html(' ');
    	$.ajax({
  	 		type:'POST',
  	 		url:"module/detailCommande.php",
  	 		dataType:"json",
            cache:false,
   	 		data:"idCommande="+idCommande,
          // beforeSend:function(data) { alert(idCommande);},
            success:function(data){
           
                var prixTot=0;
              $.each(data,function(k,v){
           $('.tableauCommande').html($('.tableauCommande').html()+'<tr><td>'+v.nom+'</td><td>'+v.quantite+'</td><td>'+v.prix+'</td><td></td></tr>');
           prixTot+=Number(v.prix);
          });
              $('.tableauCommande').html($('.tableauCommande').html()+'<tr><td></td><td></td><td></td><td>'+prixTot+' DT</td></tr>');
          
  	 			
  	 		},
  	 		error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                     }

  	 	});});
  
});