
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
          $link00="<p id=\"current\"><span style=\" font-weight: bold\">CHEMIN : </span> "+urlcur+"</p>";
          $("#chem").append($link00);

          //affichage des dossiers
          var tabDir=a[4];
          var tabShortDir=a[3];
          for (var vtab in tabDir) {

            $linkurl=tabDir[vtab];
            $link = "<a class=\"linkdossier\" id=\"direp"+vtab+"\" onclick=\"go(this.id)\" name=\""+$linkurl+"\"><img class=\"images\" src=\"img/dossier.png\">"+tabShortDir[vtab]+"</a>"

             $("#screenleft").append($link);
             $("#screenleft").append('<br>');

          }
          var tabFil=a[7];
          var tabShortFil=a[6];
          for (var vtabf in tabFil) {

            $linkurlfil=tabFil[vtabf];
            $linkfil = "<a id=\"fil"+vtabf+"\" ondblclick=\"rename(this.id)\" name=\""+$linkurlfil+"\">"+tabShortFil[vtabf]+"</a>"

             $("#screenright").append($linkfil);
             $("#screenright").append('<br>');

          }

          //affichage du lien de retour
          $link2 = "<input id=\"btbk\" onclick=\"go(this.id)\" name=\""+a[5]+"\" type=\"button\" value=\"RETOUR\" class=\"butback\">"
          $("#screenleft").append('<br>');
          $("#retour").append($link2);
        }
      });
}
