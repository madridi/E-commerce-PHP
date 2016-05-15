$(document).ready(function (){
   

    $('.getDetailProduit').click(function(){
        var trigger=$(this);
      var idProduit=trigger.attr("rel");
       $('.detailProd').html(' ');
      $.ajax({
        type:'POST',
        url:"module/detailProduit.php",
        dataType:"json",
            cache:false,
        data:"idProduit="+idProduit,
          // beforeSend:function(data) { alert(idProduit);},
            success:function(data){
              
             

              $.each(data,function(){
           $('.detailProd').html(
            '<tr><td>Nom </td><td>'+data.nom+'</td></tr>'+
            '<tr><td>Description</td><td>'+data.description+'</td></tr>'+
            '<tr><td>Categorie</td><td>'+data.categorie+'</td></tr>'+
            '<tr><td>Marque</td><td>'+data.marque+'</td></tr>'+
            '<tr><td>Prix</td><td>'+data.prix+' DT</td></tr>'+
            
            '<tr><td>Photo</td><td><img src='+data.photo+' style="width:100px;height:150px;"/></td></tr>'+
            '<tr><td>Quantite restante</td><td>'+data.quantite+'</td></tr>');
          });
                
          
        },
        error: function(request, error) { // Info Debuggage si erreur         
                       alert("Erreur : responseText: "+request.responseText);
                     }

      });});
  
});

