//Modification des noms de variables, $ interdit


function go(id){
// préparation des variables pour l'ajax
  if (id==null) {

    // si premier chargement de la page : initialisation
      var urlclt = "\/home\/";
      var urlsav = "\/home\/";
      var urlcur = "\/home\/";

  }
  else
  {
    // sauvegarde de l'url précédente et récupération de l'url voulue
    var id_clk ="#"+id;
    var urlsav = $("#btbk").attr('name');


     if(id=="search"){
      var urlclt=document.getElementById("search").value;
      var urlcur = $("#current").text();
     }
     else{
       var urlclt = $(id_clk).attr('name');
       var urlcur = $(id_clk).attr('name');

      }
  }

// lancement du nettoyage de page AJAX
      $.ajax({
        type: 'post',
        url: 'php/exploserveur.php',  //page de traitement a appeller
        data: {url:urlclt,urlbak:urlcur},
        //data: passage des variables préparées à la page php de traitement
        success: function(response,status){
          //récupération des données du traitement php
          var a = JSON.parse(response);
          //récupération du tableau php en javascript

          // gestion des erreurs
          if (a[0]!='') {
            alert(a[0]);
          }

          //vidage des champs div à remplir
          $("#chem").empty();
          $("#screenleft").empty();
          $("#screenright").empty();
          $("#retour").empty();

          //affichage url dossier courant
          courantUrl="<p id=\"current\"><span style=\" font-weight: bold\">CHEMIN : </span> "+urlcur+"</p>";
          $("#chem").append(courantUrl);

          //affichage des dossiers
          var tabDir=a[4];
          var tabShortDir=a[3];
          for (var vtab in tabDir) {

            linkUrl=tabDir[vtab];
            linkRep = "<a class=\"linkdossier\" id=\"direp"+vtab+"\" onclick=\"go(this.id)\" name=\""+linkUrl+"\"><img class=\"images\" src=\"img/dossier.png\">"+tabShortDir[vtab]+"</a>"

             $("#screenleft").append(linkRep);
             $("#screenleft").append('<br>');

          }
          var tabFil=a[7];
          var tabShortFil=a[6];
          for (var vtabf in tabFil) {

            linkUrlFile=tabFil[vtabf];
            linkFile = "<a id=\"fil"+vtabf+"\" ondblclick=\"rename(this.id)\" name=\""+linkUrlFile+"\">"+tabShortFil[vtabf]+"</a>"

             $("#screenright").append(linkFile);
             $("#screenright").append('<br>');

          }

          //affichage du lien de retour
          linkRetour = "<input id=\"btbk\" onclick=\"go(this.id)\" name=\""+a[5]+"\" type=\"button\" value=\"RETOUR\" class=\"butback\">"
          $("#screenleft").append('<br>');
          $("#retour").append(linkRetour);
        }
      });
}
