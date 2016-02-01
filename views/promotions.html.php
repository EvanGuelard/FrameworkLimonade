<h2>Liste des promotions  &nbsp;-&nbsp; <a href="#popup_ajout" class="popup"><button> <i class="fa fa-plus fa-lg" id='suppr'></i>&nbsp;Ajouter une promotion</button></a></h2>
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

<table id="tab_promotions" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Identifiant</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
foreach($liste_promo as $key => $value) {
    echo "<tr>";
    echo "<td>".$key."</td>";
    echo "<td>".$value."</td>";
    echo "<td>
            <a href=\"#popup_modif_$value\" class=\"popup\"><i class=\"fa fa-pencil fa-lg\" id='modif'></i></a>  <a  href=\"#popup_suppr_$value\" class=\"popup\"><i class=\"fa fa-times fa-lg\" id='suppr'></i></a>
    </td>";

    echo "</tr>";
}            
        ?> 
    </tbody>
</table>

<div id="popup_ajout" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Ajouter une promotion</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <form method="post" action="?/promotions">            
            <input type="hidden" name="type" value="post_ajout"/>
            <table class="table_popup">
               <tr>
                   <td class="tab_gauche">Nom de la promotion : </td>
                   <td class="tab_droite"><input type="text" name="nom_promo" /></td>
               </tr>
               <tr>
                   <td class="tab_gauche">ID de la promotion * :</td>
                   <td class="tab_droite"><input type="text" name="code_promo" /></td>
               </tr>
            </table>  
            <br>
            * doit contenir 'A' suivi de l'année (chiffre entre 1 et 5)
            <br>
            <br>
            <input type="submit" value="Valider" />
        </form>
    </section>
</div>

<?php

foreach($liste_promo as $key => $value) { ?>
<div id="popup_modif_<?php echo $value ?>" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Modifier la promotion "<?php echo $value ?>"</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <form method="post" action="?/promotions">            
            <input type="hidden" name="type" value="post_modif"/>
            <input type="hidden" name="identifiant_promo" value="<?php echo $value; ?>"/>
            
            <table class="table_popup">
               <tr>
                   <td class="tab_gauche"> Nouveau nom de la promotion : </td>
                   <td class="tab_droite"><input type="text" name="nom_promo" value="<?php echo  $key; ?>"/></td>
               </tr>
               <tr>
                   <td class="tab_gauche">Nouvel ID promotion : </td>
                   <td class="tab_droite"><input type="text" name="code_promo" value="<?php echo  $value; ?>" /></td>
               </tr>
            </table>  
            <br>
            <input type="submit" value="Valider" />           
        </form>
    </section>
</div>

<div id="popup_suppr_<?php echo $value ?>" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Supprimer la promotion "<?php echo $value ?>"</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        Etes-vous sur de vouloir supprimer la promotion "<?php echo $value ?>" ?
        <br><br>
        <form method="post" action="?/promotions">



            <input type="hidden" name="type" value="post_suppr"/>
            <input type="hidden" name="identifiant_promo" value="<?php echo $value; ?>"/>
            <input type="hidden" name="nom_promo" value="<?php echo $key; ?>"/>
            <input type="submit" value="Valider" />

        </form>
    </section>
</div>
<?php
                                        }
?>