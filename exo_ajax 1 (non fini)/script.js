$(document).ready(function () {
//  getMessages();
  $('.formulaire').submit(function () {

      var nom =$('.nom').val();
      var message = $('.message').val();

      $.post('send.php',{nom:nom,message:message}, function(donnees){
        $('.afficher').text(donnees);
      });
    return false;

      });

});
