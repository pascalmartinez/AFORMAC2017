<?php
$coordonnes = array(
  "mail"=>$_POST["mail"],
  "prenom"=>$_POST["prenom"],
  "nom"=>$_POST["nom"],
  "adresse"=>$_POST["adresse"],
  "age"=>$_POST["age"],
  "téléphone"=>$_POST["telephone"]);

foreach ($coordonnes as $key => $value) {
  if($value==""){
    echo $key .' '. 'non renseigné<br>';
  }else {
    echo $key. ' '.'saisie ok<br>';
  }
}


?>
