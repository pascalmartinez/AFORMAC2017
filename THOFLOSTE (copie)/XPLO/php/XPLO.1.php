<?php
// appel des fonctions utilisées
include 'functionsSRV1.0.php';

// vérification en cas de bug
if ($_POST['url']==null) {
  $url='/home/';
}

$url=$_POST['url'];


//////*  Test si url valide *//////////
$test_dir_cmd='ls \*.\* '.$url;

if (shell_exec($test_dir_cmd)==null) {

  $mess_error = "Folder is empty";
  $url=$_POST['urlbak'];

}
else {
  $mess_error = '';
}


/////* listage des dossiers */////

$urldir=$url.'*/';

$cmddir='ls -d '.$urldir;

$dirData=shell_exec($cmddir);


// lecture du fichier contenant la liste des dossiers courants

$dir_lght=strlen($dirData);
$tabDir=[];
$tabShortDir=[];
$dir_current='';

for ($i=0; $i < $dir_lght; $i++) {
  if (ctype_space($dirData[$i])) {
    array_push($tabDir,$dir_current);
    //ajout du répertoire trouvé dans le tabkleau des répertoires
    $dir_short=basename($dir_current);
    $dir_short=ucfirst($dir_short);
    $dir_current='';
    //vidage du répertoire copié
    array_push($tabShortDir,$dir_short);
    // ajout de la liste des noms de répertoires
  }
  else {
    $dir_current=$dir_current.$dirData[$i];
    //remplissage de l'adresse de chaque répertoire

  }

}



/////* listage des fichiers *//////

//$cmdls='ls -s \*.\* '.$url;
//$cmdls='tree -L 1 -type f '.$url;
$cmdls='find '.$url.' -maxdepth 1 -type f' ;//-perm 777';
$lsData=shell_exec($cmdls);


// lecture du fichier contenant la liste des fichiers

$fil_lght=strlen($lsData);
$tabFil=[];
$tabShortFil=[];
$fil_current='';

for ($j=0; $j < $fil_lght; $j++) {
  if (ctype_space($lsData[$j])) {
    array_push($tabFil,$fil_current);
    //ajout du répertoire trouvé dans le tabkleau des répertoires
    $fil_short=basename($fil_current);
    $fil_short=ucfirst($fil_short);
    $fil_current='';
    //vidage du répertoire copié
    array_push($tabShortFil,$fil_short);
    // ajout de la liste des noms de répertoires
  }
  else {
    $fil_current=$fil_current.$lsData[$j];
    //remplissage de l'adresse de chaque répertoire

  }

}



/* préparation de l'url pour remonter dans l'arborescence */

if ($url=='/') {
  //$urlback = dirname($url);
  $urlback = '\/';
}
else {
  $urlback = dirname($url);//.'/';
}






//remplissage de la table passer à la page client
$tabData=[$mess_error,$lsData,$url,$tabShortDir,$tabDir,$urlback,$tabShortFil,$tabFil];


echo json_encode($tabData) ;
//passage de la table en retour ajax à la page client
?>
