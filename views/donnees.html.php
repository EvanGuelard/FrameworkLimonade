<h2>Tableau des données personnelles - <a href="donnes_eleves.csv"><button><i class="fa fa-download fa-lg" id='suppr'></i> Exporter</button></a></h2>
<br>
<br>
<?php
    if(!isset($error)) $error="";
    if(!isset($success)) $success="";
    if($error != "") {
        echo "<div class=\"message error\">";
            echo "<p><i class=\"fa fa-times fa-lg\"></i> $error</p>";
        echo "</div>";
        $error = "";
    }
    elseif($success != "") {
        echo "<div class=\"message success\">";
            echo "<p><i class=\"fa fa-check fa-lg\"></i> $success</p>";
        echo "</div>";
        echo "<br>";
        $succes= "";
    }
?>

<table id="tab_donnees_perso" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Identifiant</th>
            <th>Nom</th>  
            <th>Prénom</th>
            <th>Date naissance</th>
            <th>Tel</th>
            <th>Courriel</th>
            <th>Modifier</th>
        </tr>
    </thead>
    <tbody>
        <?php

for($i = 0; $i < count($liste_eleve); $i++) {
    echo "<tr>";
    foreach($liste_eleve[$i] as $key => $value) {
        echo "<td>".$value."</td>";
    }
    echo "<td><a href=\"#popup_modif_$i\" class=\"popup\"><i class=\"fa fa-pencil fa-lg\"></i></a></td>";
    echo "</tr>";
}
        ?>
    </tbody>
</table>

<br>

<?php
$i=0;
foreach($liste_eleve as $libelle => $value) { ?>
<div id="popup_modif_<?php echo $i ?>" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Modifier</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <form method="post" action="?/donnees_perso">
            <input type="hidden" name="type" value="post_modif"/>
            <input type="hidden" name="id" value="<?php echo $value['id']; ?>"/>
            
            <table class="table_popup">
               <tr>
                   <td class="tab_gauche">Nouvel Identifiant : </td>
                   <td class="tab_droite"><input type="text" name="id_eleve" value="<?php echo  $value['identifiant']; ?>"/></td>
               </tr>
                 <tr>
                   <td class="tab_gauche">Nouveau Nom : </td>
                   <td class="tab_droite"> <input type="text" name="nom_eleve" value="<?php echo  $value['nom']; ?>" /></td>
               </tr>
                 <tr>
                   <td class="tab_gauche">Nouveau Prénom : </td>
                   <td class="tab_droite"><input type="text" name="prenom_eleve" value="<?php echo  $value['prenom']; ?>" /></td>
               </tr>
                 <tr>
                   <td class="tab_gauche">Nouvelle Date de Naissance : </td>
                   <td class="tab_droite"><input type="text" name="date_nais_eleve" class="datepicker" value="<?php echo  $value['date_nais']; ?>" /></td>
               </tr>
                 <tr>
                   <td class="tab_gauche"> Nouveau Numéro : </td>
                   <td class="tab_droite"><input type="text" name="tel_eleve" value="<?php echo  $value['tel']; ?>" /></td>
               </tr>
                 <tr>
                   <td class="tab_gauche">Nouveau Mail :</td>
                   <td class="tab_droite"><input type="text" name="mail_eleve" value="<?php echo  $value['email']; ?>" /></td>
               </tr>
                
            </table>  
            <br>
            <input type="submit" value="Valider" />
        </form>
    </section>
</div>
<?php $i++;
                                          } ?>

<?php 

$fp = fopen('donnes_eleves.csv', 'w');

$entetes = array_keys($liste_eleve[0]);

foreach($entetes as &$entete) { 
    $entete = (is_string($entete)) ? 
        iconv("UTF-8", "Windows-1252//TRANSLIT", $entete) : $entete; 
}

fputcsv($fp, $entetes, ';');

foreach ($liste_eleve as $donnee) {
    foreach($donnee as &$champ) { 
        $champ = (is_string($champ)) ? 
            iconv("UTF-8", "Windows-1252//TRANSLIT", $champ) : $champ; 
    }
    $temp = array($donnee['id'], $donnee['identifiant'], $donnee['nom'], $donnee['prenom'], $donnee['date_nais'], $donnee['tel'], $donnee['email']);
    fputcsv($fp, $temp, ';');
}


?>
