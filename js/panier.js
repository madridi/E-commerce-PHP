
$(function(){
 


  if($(".ajouter_panier").length>0){

  	 $(".ajouter_panier").click(function(){

  	 	var trigger=$(this);
  	 	var param=trigger.attr("rel");
  	 	
  	 	var item=param.split("_");
     

  	 	$.ajax({
  	 		type:'GET',
  	 		url:'module/panier.php',
  	 		dataType:'json',
        
   	 	data:{idProd:item[0],action:item[1]},
    //  beforeSend:function(data){alert(item[1])},
  	 		success:function(data){
     // alert(data.action);
var sortie='<a href="#" class="ajouter_panier"  ';
var label="Acheter";
trigger.removeAttr('style');

if(data.action==0){
  trigger.css("background-color","#df4c4d");
  label="Supprimer";
}else{
   trigger.css("background-color","#00CC00");
}
     trigger.attr('rel',data.idProd+'_'+data.action);
      
     trigger.text(label);
   
   
     
          $(".prixTot").text(data.prixTot);

           $(".nbrProduit").text(data.nbrProduit);


  	 		},
  	 		error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                     }

  	 	});

  	 	return false;
  	 });
  }






/*function rafraichirPanier(idProd,action){

		$.ajax({
      type:'POST',
			url:'module/rafraichirPanier.php',
			dataType:'json',
      data:"idProduit="+idProd,
			success:function(data){
       // alert(data.prix);
        if(action==0){

				var val=parseFloat($(".prixTot").text());
         val+=parseFloat(data.prixTot);
					$(".prixTot").text(val);

          val=parseInt($(".nbrProduit").text());
     val=val-1;
     $(".nbrProduit").text(val);

        }else{

          var val=parseFloat($(".prixTot").text());
         val-=parseFloat(data.prixTot);
          $(".prixTot").text(val);

          val=parseInt($(".nbrProduit").text());
     val=val+1;
     $(".nbrProduit").text(val);
					}
        },
			

		error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                     }

		});

	}

*/



/*
	if($(".panier").length>0){

		var ancien=$(".panier").html();
		
  	 $(".panier").mouseover(function(){
        var ancien=$(".panier").html();
  	 	$(".panier").html('details');
  	 });

  	 $(".panier").mouseout(function( ancien ){
  	 	$(".panier").html(ancien);
  	 });

   }
   */

   if($(".bonjour").length>0){

    var ancien2=$(".bonjour").html();
    
     $(".bonjour").mouseover(function(){
      $(".bonjour").html('Modifier Profile');
     });

     $(".bonjour").mouseleave(function(){
      $(".bonjour").html(ancien2);
     });

   }
 

});