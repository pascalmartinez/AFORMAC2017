<?php

$coordonnes = array(
  "Mail"=>$_POST["mail"],
  "Prénom"=>$_POST["prenom"],
  "Nom"=>$_POST["nom"],
  "Adresse"=>$_POST["adresse"],
  "Age"=>$_POST["age"],
  "Téléphone"=>$_POST["telephone"]);

  $resultat = "";

foreach ($coordonnes as $key => $value) {
  if($value==""){
    $resultat = $resultat."$key non renseigné<br>";

  }else {
    $resultat = $resultat."$key saisie ok<br>";
  }
}
    header('Location: index.php?resultat='.$resultat);

?>
