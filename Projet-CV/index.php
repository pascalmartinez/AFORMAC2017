<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php
      if (isset($_GET["resultat"])) {
        echo $_GET["resultat"];

        //inset = est-ce que ca existe? oui alors affiche moi le resultat
      }
    ?>

  <form class="" action="verification.php" method="post">
    <p>Veuillez rentrer votre prénom s'il vous plaît.</p>
    <input type="text" name="prenom" value="">
    <p>Veuillez rentrer votre nom.</p>
    <input type="text" name="nom" value="">
    <p>Veuillez indiquer votre adresse.</p>
    <input type="text" name="adresse" value="">
    <p>Veuillez rentrer votre age.</p>
    <input type="number" name="age" value="">
    <p>Veuillez rentrer votre téléphone.</p>
    <input type="tel" name="telephone" value="">
    <p>Veuillez rentrer votre e-mail.</p>
    <input type="email" name="mail" value="" ></br>
    <input type="checkbox" name="" value="">
    <p>Cocher la case pour accepter l'envoi de newsletter.</p>
    <input type="submit" value="Valider" />
    <p>Appuyer pour envoyer.</p>
  </form>



  </body>
</html>
