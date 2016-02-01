<!DOCTYPE HTML>
<html>
    <head>
        <title>Gestion</title>
        
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/s/dt/jq-2.1.4,dt-1.10.10/datatables.min.js"></script>

        
        <link rel="stylesheet" type="text/css" href="./includes/principal.css" />
        <script type="text/javascript" src="./includes/principal.js"></script> 
        <link rel="stylesheet" type="text/css" href="./includes/font-awesome/css/font-awesome.min.css" />
        
        <script type="text/javascript" src="./includes/jquery.leanModal.min.js"></script>
           <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
           <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
          <script>
          $(function() {
            $( ".datepicker" ).datepicker();
          });
          </script>
    </head>
    <body>
        <header>
            <img src="./includes/img/isen.png" alt="logo isen"/>
            <h2>Brest - Rennes</h2>
            <h1>Administration</h1>    
        </header>
        <?php //echo $content; ?>


        <section id="boutons">
            <a href="?/promotions/" ><button><i class="fa fa-graduation-cap fa-lg" id='suppr'></i> Gérer les promotions</button></a>
            <a href="?/fichiers/" ><button><i class="fa fa-file-pdf-o  fa-lg" id='suppr'></i> Gérer les fichiers</button></a>
            <a href="?/donnees_perso/" ><button><i class="fa fa-users fa-lg" id='suppr'></i> Gérer les données personnelles</button></a>
        </section>

        <section id="content">
            <?php 
            if (isset($content)){ 
                echo $content;
            }
            else{
                echo "Il y a une erreur.";
            }
            ?>
        </section>
        <footer>            
  © ISEN Bretagne (2015) - Contact : <a href="mailto:jean-pierre.gerval@isen-bretagne.fr?subject=Documents de rentrée">jean-pierre.gerval@isen-bretagne.fr</a>
        </footer>
    </body>
</html>