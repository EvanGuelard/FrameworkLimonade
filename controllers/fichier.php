<?php

function f_fic() {
     
    include 'connect.php';
    
    $sql = ' SELECT * FROM document';

    if(!$result = $db->query($sql)){
        die('There was an error running the query (promo.php) [' . $db->error . ']');
    }

    $liste_doc = array();
    
    $i=0;
    while($row = $result->fetch_assoc()){
        
        $liste_doc[$i] = array(
            'id' => $row['id'],
            'rang' => $row['rang'],
            'promo' => $row['promo'],
            'libelle' => $row['libelle'],
            'fichier' => $row['fichier']);
        $i++;
    }
    
    set("liste_doc", $liste_doc);
    
    $sql_promo = ' SELECT id_promo, nom_promo FROM promo';

    if(!$result = $db->query($sql_promo)){
        die('There was an error running the query (promo.php) [' . $db->error . ']');
    }

    $liste_promo = array();

    while($row = $result->fetch_assoc()){
        $liste_promo[$row['nom_promo']] = $row['id_promo'];

    }
    
    $sql_rang = ' SELECT MAX(rang) as rang FROM document';
    
    if(!$result = $db->query($sql_rang)){
        die('There was an error running the query (promo.php) [' . $db->error . ']');
    }
    
    while($row = $result->fetch_assoc()){
        $rang = $row["rang"];
    }

    set('rang', $rang);
    set("liste_promo", $liste_promo);
    
    return html('fichiers.html.php', 'layout.html.php');
}

function post_fichier() {

    include 'connect.php';
    
    $success = "";
    $error = "";

    if(isset($_POST['type'])) {

        //INSERTION
        if($_POST["type"] == "post_ajout") {
            
            if(isset($_POST['rang']) && !empty($_POST['rang'])  || isset($_POST['nom_fic']) && !empty($_POST['nom_fic'])) {
                
                if(isset($_POST['rang']) && !empty($_POST['rang'])) $rang = $_POST['rang'];
                if(isset($_POST['id_promo'])) $id_promo = $_POST['id_promo'];
                if(isset($_POST['nom_fic']) && !empty($_POST['nom_fic'])) $nom_fic = $_POST['nom_fic'];
                
                if ($_FILES['fic']['error'] == 0 && $_FILES['fic']['type'] == "application/pdf")  {
                    $fic = $_FILES['fic']['name'];
                    
//                    $annee = substr($id_promo, -1);
                    
                    $annee1 = strpos ( $id_promo , 'A1');
                    $annee2 = strpos ( $id_promo , 'A2');
                    $annee3 = strpos ( $id_promo , 'A3');
                    $annee4 = strpos ( $id_promo , 'A4');
                    $annee5 = strpos ( $id_promo , 'A5');
                    
                    if($annee1 || $annee2) {
                        $dest = "./docs/pdf/A12/".$fic;
                        $_FILES['fic']['name'] = "A12/".$_FILES['fic']['name'];
                    } else if($annee3 || $annee4 || $annee5) {
                        $dest = "./docs/pdf/A345/".$fic;
                        $_FILES['fic']['name'] = "A345/".$_FILES['fic']['name'];
                    } else {
                        $dest = "./docs/pdf/".$fic;
                    }
                    
                    $fic = $_FILES['fic']['name'];
                    
                    move_uploaded_file($_FILES["fic"]["tmp_name"], $dest);
                    
                } else {
                    $error = "Erreur lors du transfert du fichier";
                }
                
                $nom_fic = htmlspecialchars($nom_fic);
                
                if(isset($fic)) {  
                    $sql_ajout = 'INSERT INTO document (id, rang, promo, libelle, fichier) VALUES ("", "'.$rang.'", "'.$id_promo.'", "'.$nom_fic.'", "'.$fic.'")';

                    if ($db->query($sql_ajout) === TRUE) {
                        $success = "$fic bien ajouté !";
                    } else {
                        $error = "Error: $sql_ajout <br> $db->error";
                    }
                }
                else {
                    $error = "Aucun champ ne doit être vide";
                }
                
            } else {
                $error = "Aucun champ ne doit être vide";
            }
            
        }
        
        //MODIFICATION
        if($_POST["type"] == "post_assoc") {
            

            if(isset($_POST['id_promo']) && !empty($_POST['id_promo'])) $id_promo = $_POST['id_promo'];
            if(isset($_POST['fic_assoc']) && !empty($_POST['fic_assoc'])) $fic_assoc = $_POST['fic_assoc'];
            if(isset($_POST['nom_fic']) && !empty($_POST['nom_fic'])) $nom_fic = $_POST['nom_fic'];

                
            $sql_modif = 'UPDATE document SET promo="'.$id_promo.'" WHERE id="'.$fic_assoc.'"';
            
                if ($db->query($sql_modif) === TRUE) {
                    $success = "$nom_fic à bien été associé à $id_promo";
                } else {
                    $error = "Error: $sql_modif <br> $db->error";
                }

            
        }
        
        //SUPPRESSION
        if($_POST["type"] == "post_suppr") {
            
            if(isset($_POST['fic_a_suppr']) && !empty($_POST['fic_a_suppr'])) $id = $_POST['fic_a_suppr'];
            if(isset($_POST['nom_fic']) && !empty($_POST['nom_fic'])) $nom_fic = $_POST['nom_fic'];
            
            $sql_suppr = 'DELETE FROM document WHERE id="'.$id.'"';

            if ($db->query($sql_suppr) === TRUE) {
                $success = "$nom_fic à bien été supprimé !";
            } else {
                $error = "Error: $sql_suppr <br> $db->error";
            }

        }
    }
    
    //RANG
    if($_POST["type"] == "post_rang") {

        if(isset($_POST['fic_assoc']) && !empty($_POST['fic_assoc'])) $id = $_POST['fic_assoc'];
        if(isset($_POST['id_rang']) && !empty($_POST['id_rang'])) $rang = $_POST['id_rang'];

        $sql_modif_rang = 'UPDATE document SET rang="'.$rang.'" WHERE id="'.$id.'"';


        if ($db->query($sql_modif_rang) === TRUE) {
            $success = 'Rang bien modifié !';
        } else {
            $error = "Error: $sql_modif_rang <br> $db->error";
        }

    }
    
    f_fic();
    set("success", $success);
    set("error", $error);
    
    return html('fichiers.html.php', 'layout.html.php');
}
?>