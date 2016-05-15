

$(document).ready(function (){
   

    $('.panier').click(function(){
        var trigger=$(this);
            $.ajax({
        type:'POST',
        url:"module/detailPanier.php",
        dataType:"json",
            cache:false,
          beforeSend:function(data) { },
            success:function(data){
             
             if($(".nbrProduit").text()==0){
              $('.tableauPanier').html('');
              $('.detailPanier').html('Panier vide');
              $('#footerPanier').hide();
             }else{
                  $('.tableauPanier').html('<tr><th>nom</th><th>quantite</th><th>prix</th><th></th><th></th></tr>');
                  $('.detailPanier').html('');
                  $.each(data,function(k,v){
                 
                     $('.detailPanier').html($('.detailPanier').html()+
                      '<tr class="tr'+v.id+'"><td  id="nom_'+v.id+'">'+v.nom+'</td>'+
                      '<td><input type="number" max="10" min="1" style="widht:5px;" value='+v.quantite+' class="quantite" rel='+v.id+' id="quantite_'+v.id+'"></td>'+
                      '<td class="prix" id="prix_'+v.id+'" rel="'+v.prixPiece+'">'+v.prix+'</td>'+                                     
                    // '<td><a href="#">Modifier</a></td>'+
                     '<td><a href="#" class="supprimerProd" rel="'+v.id+'">Supprimer</td><td></td></tr>');
                 
              });
              
            
              $('#footerPanier').show();

            }



/////////////////
 $('.quantite').change(function(){
      
      var prixNov=0;
      var prixCurrent;
      var trigger=$(this);
      var idProd=trigger.attr('rel');
    
      var quantiteNov=$(this).val();
      

              prix=$('#prix_'+idProd).attr('rel');
             
             prixNov=parseFloat(prix)*parseFloat(quantiteNov);
            

             
              $('#prix_'+idProd).text(prixNov.toString());

///// modifier bouton panier

 var quantiteTot=0;
               var prixTot=0;
$(".quantite").each(function(){ 
  quantiteTot=quantiteTot+parseFloat($(this).val());
});
$(".prix").each(function(){ 
  
  prixTot=prixTot+parseFloat($(this).text());
});
           /*   var lesQuantites=$('.quantite');
               var lesPrix=$('.prix');

               var quantiteTot=0;
               var prixTot=0;
             for(var i=0;lesPrix.lenght;i++){
                quantiteTot+=parseFloat(lesQuantites[i].val());
             }

             for(var i=0;lesQuantites.lenght;i++){
               prixTot+=parseFloat(lesPrix[i].text());
             }
*/
             $('.nbrProduit').text(quantiteTot);
              $('.prixTot').text(prixTot);


            $.ajax({
            type:'GET',
            url:"module/modifierQuantite.php",
            dataType:"json",
            data:{idProd:idProd, quantite:quantiteNov , quantiteTot:quantiteTot , prixTot:prixTot},
            cache:false,
           // beforeSend:function(data) { },
            success:function(data){
              

             },
             error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                     }
            });

    });


///// supprimer produit

////////////////
 $('.supprimerProd').click(function(){
      
      
      var trigger=$(this);
      var idProd=trigger.attr('rel');
      var quantite=parseFloat( $('#quantite_'+idProd).val());
      var prix=parseFloat($('#prix_'+idProd).text());
      
    

             
             
             

///// modifier bouton panier

       nbrNov=parseFloat($('.nbrProduit').text())-quantite;
             
             prixNov=parseFloat($('.prixTot').text())-prix;

            $('.nbrProduit').text(nbrNov);
             $('.prixTot').text(prixNov);     
         
//supprimer ligne de tableau
          trigger.parent().parent().remove();
        
//modifier bouton produit

$('#bouton_'+idProd).text('Ajouter');
$('#bouton_'+idProd).attr('rel',idProd+'_1'),
$('#bouton_'+idProd).removeAttr('style');
$('#bouton_'+idProd).css('background-color','#00CC00');



            $.ajax({
            type:'GET',
            url:"module/supprimerPanier.php",
            dataType:"json",
            data:{idProd:idProd, quantite:quantite, prixTot:prix},
            cache:false,
           // beforeSend:function(data) { },
            success:function(data){
              


             },
             error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                     }
            });

    });


////////////////

        },
        error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                     }

          });
       });



    //////////////// 

   
  
});