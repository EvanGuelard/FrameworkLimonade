
<h2>Liste des fichiers &nbsp;-&nbsp; <a href="#popup_ajout" class="popup"><button> <i class="fa fa-plus fa-lg" id='suppr'></i>&nbsp;Ajouter un fichier</button></a></h2>
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

<table id="tab_fichiers" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Id</th>
            <th>Rang</th>
            <th>Nom</th>
            <th>Fichier</th>
            <th>Promo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
    $i=0;
foreach($liste_doc as $libelle => $value) {
    echo "<tr>";
    echo "<td>".$value['id']."</td>";
    echo "<td>".$value['rang']."</td>";
    echo "<td>".$value['libelle']."</td>";
    echo "<td><a href=\"./docs/pdf/".$value['fichier']."\" target=\"_blanl\">".$value['fichier']."</a></td>";
    echo "<td>".$value['promo']."</td>";
    echo "<td><a href=\"#popup_rang_$i\" class=\"popup\"><i class=\"fa fa-sort fa-lg\"></i></a> <a href=\"#popup_assoc_$i\" class=\"popup\"><i class=\"fa fa-exchange fa-lg\"></i></a>  <a href=\"#popup_suppr_$i\" class=\"popup\"><i class=\"fa fa-times fa-lg\"></i></a></td>";
    echo "</tr>";
    $i++;
}            
        ?>
    </tbody>
</table>
<?php
    $i=0;
foreach($liste_doc as $libelle => $value) { ?>
    <div id="popup_suppr_<?php echo $i ?>" class="popupContainer" style="display:none;">
        <header class="popupHeader">
            <span class="header_title">Supprimer le fichier "<?php echo $value['libelle'] ?>"</span>
            <span class="modal_close"><i class="fa fa-times"></i></span>
        </header>

        <section class="popupBody">
            Etes-vous sur de vouloir suprimer le fichier "<?php echo $value['libelle'] ?>" ?
            <form method="post" action="?/fichiers" enctype="multipart/form-data">
                <input type="hidden" name="type" value="post_suppr"/>
                <input type="hidden" name="fic_a_suppr" value="<?php echo $value['id'] ?>"/>
                <input type="hidden" name="nom_fic" value="<?php echo $value['libelle'] ?>"/>
                <br>
                <input type="submit" value="Valider" />
            </form>
        </section>
    </div>
<?php $i++;
    } ?>
    
<div id="popup_ajout" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Ajouter un fichier</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <form method="post" action="?/fichiers" enctype="multipart/form-data">
            <input type="hidden" name="type" value="post_ajout"/>
            <table class="table_popup">
               <tr>
                   <td class="tab_gauche"> Rang : </td>
                   <td class="tab_droite"><select name="rang">
                           <?php
                                for($j = 1; $j < $rang+1; $j++) {           
                                    echo "<option value=".$j.">".$j."</option>";
                                }
                            ?>
                        </select></td>
               </tr>
               <tr>
                   <td class="tab_gauche">Promotion : </td>
                   <td class="tab_droite">
                        <select name="id_promo">
                            <?php 
                            foreach($liste_promo as $key => $value) {
                                echo "<option value=".$value.">".$value."</option>";
                            }
                        ?>
                        </select>
                  </td>
               </tr>
                <tr>
                   <td class="tab_gauche"> Nom du fichier : </td>
                   <td class="tab_droite"><input type="text" name="nom_fic" /></td>
               </tr>
                <tr>
                   <td class="tab_gauche"> Fichier : </td>
                   <td class="tab_droite"><input type="file" name="fic" /></td>
               </tr>
            </table>  
            <br>
            <input type="submit" value="Valider" />
        </form>
    </section>
</div>

<?php
$i=0;
foreach($liste_doc as $libelle => $value) { ?>
<div id="popup_assoc_<?php echo $i ?>" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Associer à une promotion</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <form method="post" action="?/fichiers">
            <input type="hidden" name="type" value="post_assoc"/>
            <input type="hidden" name="fic_assoc" value="<?php echo $value['id']; ?>"/>
            <input type="hidden" name="nom_fic" value="<?php echo $value['fichier']; ?>"/>
            
            <table class="table_popup">
               <tr>
                   <td class="tab_center"> Associer "<?php echo $value['fichier']; ?>" à : </td>
                </tr>
                  <tr>
                   <td class="tab_center">
                        <select name="id_promo">
                        <?php 
                            foreach($liste_promo as $key => $value) {
                                echo "<option value=".$value.">".$value."</option>";
                            }
                        ?>
                        </select>
                  </td>
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
$i=0;
foreach($liste_doc as $libelle => $value) { ?>
<div id="popup_rang_<?php echo $i ?>" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Changer le rang</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>

    <section class="popupBody">
        <form method="post" action="?/fichiers">
            <input type="hidden" name="type" value="post_rang"/>
            <input type="hidden" name="fic_assoc" value="<?php echo $value['id']; ?>"/>

            <table class="table_popup">
                <tr>
                    <td class="tab_center">Rang courant :  <?php echo $value['rang']; ?> </td>
                </tr>
                <tr>
                    <td class="tab_center">
                       Nouveau rang : 
                        <select name="id_rang">
                           <?php
                                for($j = 1; $j < $rang+1; $j++) {           
                                    echo "<option value=".$j.">".$j."</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
            </table>  
            <br>
            <input type="submit" value="Valider" />
        </form>
    </section>
</div>
<?php $i++;
                                          } ?>