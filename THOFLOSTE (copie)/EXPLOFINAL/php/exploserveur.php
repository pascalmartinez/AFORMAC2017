<?php

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
   //$cmdLs='ls -s \*.\* '.$url;
   //$cmdLs='tree -L 1 -type f '.$url;
   $cmdLs='find '.$url.' -maxdepth 1 -type f ';
   $lsData=shell_exec($cmdLs);


   // lecture du fichier contenant la liste des fichiers

   $fil_lght=strlen($lsData);
   $tabFil=[];
   $tabShortFil=[];
   $fil_current='';
// Revoir les noms des variables
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
