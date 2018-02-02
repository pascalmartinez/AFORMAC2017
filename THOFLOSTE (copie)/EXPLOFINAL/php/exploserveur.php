<?php
//Modification des nom de variables pour uniformiser l'écriture et l'indentation
//Suppression de fonction inutile permettant de bloquer le clic droit ainsi que le débuggeur
//Suppression d'une fonction redondante

   // vérification en cas de bug
   if ($_POST['url']==null) {
     $url='/home/';
   }

   $url=$_POST['url'];

   //////*  Test si url valide *//////
   $test_dir_cmd='ls \*.\* '.$url;

   if (shell_exec($test_dir_cmd)==null) {

     $messError = "Folder is empty";
     $url=$_POST['urlbak'];

   }
   else {
     $messError = '';
   }

   /////* listage des dossiers */////

   $urlDir=$url.'*/';

   $cmdDir='ls -d '.$urlDir;

   $dirData=shell_exec($cmdDir);

   // lecture du fichier contenant la liste des dossiers courants
   $dirLght=strlen($dirData);
   $tabDir=[];
   $tabShortDir=[];
   $dirCurrent='';

   for ($i=0; $i < $dirLght; $i++) {
     if (ctype_space($dirData[$i])) {
       array_push($tabDir,$dirCurrent);
       //ajout du répertoire trouvé dans le tabkleau des répertoires
       $dirShort=basename($dirCurrent);
       $dirShort=ucfirst($dirShort);
       $dirCurrent='';
       //vidage du répertoire copié
       array_push($tabShortDir,$dirShort);
       // ajout de la liste des noms de répertoires
     }
     else {
       $dirCurrent=$dirCurrent.$dirData[$i];
       //remplissage de l'adresse de chaque répertoire

     }
   }

   /////* listage des fichiers *//////
   $cmdLs='find '.$url.' -maxdepth 1 -type f ';
   $lsData=shell_exec($cmdLs);


   // lecture du fichier contenant la liste des fichiers

   $filLght=strlen($lsData);
   $tabFil=[];
   $tabShortFil=[];
   $filCurrent='';
// Revoir les noms des variables
   for ($j=0; $j < $filLght; $j++) {
     if (ctype_space($lsData[$j])) {
       array_push($tabFil,$filCurrent);
       //ajout du répertoire trouvé dans le tableau des répertoires
       $fileShort=basename($filCurrent);
       $fileShort=ucfirst($fileShort);
       $filCurrent='';
       //vidage du répertoire copié
       array_push($tabShortFil,$fileShort);
       // ajout de la liste des noms de répertoires
     }
     else {
       $filCurrent=$filCurrent.$lsData[$j];
       //remplissage de l'adresse de chaque répertoire

     }
   }

   /////* préparation de l'url pour remonter dans l'arborescence */////

   if ($url=='/') {
     //$urlback = dirname($url);
     $urlback = '/';
   }
   else {
     $urlback = dirname($url) .'/';
   }

   //remplissage de la table passer à la page client
   $tabData=[$messError,$lsData,$url,$tabShortDir,$tabDir,$urlback,$tabShortFil,$tabFil];


   echo json_encode($tabData) ;
   //passage de la table en retour ajax à la page client

?>
