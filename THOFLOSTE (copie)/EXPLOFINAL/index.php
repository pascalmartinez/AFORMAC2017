<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="scss/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   <title>Explorateur</title>
   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src="js/script2.js"></script>
  </head>

<!-- Factorisation des pages (suppression d'une page index) + SCSS et CSS -->
<!-- Modification des noms des div -->

  <body id="idbody" onload="go()">
    <div class="container-fluid">
      <div class="row">
          <!-- <revoir les noms des div> -->
          <div class="col-12 access" id="chem"></div>
          <div class="col-12 barreRech" id="barreRech"><input placeholder="Recherche..." id="search" type="text" name="search" onblur="go(this.id)" ></div>
          <div class="col-12 retour" id="retour"></div>
          <div class="col-6 screenleft" id="screenleft"></div>
          <div class="col-6 screenright" id="screenright"></div>

      </div>
    </div>
  </body>
</html>
