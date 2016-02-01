<?php 

function f_donnees() {
    
    include 'connect.php';

    $sql = ' SELECT id, identifiant, nom_fils, prenom_fils, ddn_fils, tel_mobile, courriel FROM data';

    if(!$result = $db->query($sql)){
        die('There was an error running the query (promo.php) [' . $db->error . ']');
    }

    

    while($row = $result->fetch_assoc()){
        $liste_eleve[] = array(
            'id' => $row['id'],
            'identifiant' => $row['identifiant'],
            'nom' => $row['nom_fils'],
            'prenom' => $row['prenom_fils'],
            'date_nais' => $row['ddn_fils'],
            'tel' => $row['tel_mobile'],
            'email' => $row['courriel'],
        );
    }

    set("liste_eleve", $liste_eleve);

    return html('donnees.html.php', 'layout.html.php');
}


function post_donnees() {

    include 'connect.php';
    
    $success = "";
    $error = "";

    if(isset($_POST['type'])) {

        //MODIF
        if($_POST["type"] == "post_modif") {
            $var_err = 0;
            
            if(isset($_POST['id']) && !empty($_POST['id'])) $id = $_POST['id'];
            else $var_err++;
            if(isset($_POST['id_eleve']) && !empty($_POST['id_eleve'])) $id_eleve = $_POST['id_eleve'];
            else $var_err++;
            if(isset($_POST['nom_eleve']) && !empty($_POST['nom_eleve'])) $nom_eleve = $_POST['nom_eleve'];
            else $var_err++;
            if(isset($_POST['prenom_eleve']) && !empty($_POST['prenom_eleve'])) $prenom_eleve = $_POST['prenom_eleve'];
            else $var_err++;
            if(isset($_POST['prenom_eleve']) && !empty($_POST['date_nais_eleve'])) $date_nais_eleve = $_POST['date_nais_eleve'];
            else $var_err++;
            if(isset($_POST['tel_eleve']) && !empty($_POST['tel_eleve'])) $tel_eleve = $_POST['tel_eleve'];
            else $var_err++;
            if(isset($_POST['mail_eleve']) && !empty($_POST['mail_eleve'])) $mail_eleve = $_POST['mail_eleve'];
            else $var_err++;

            if (!$var_err) {
                
                $sql_modif = 'UPDATE data SET identifiant="'.$id_eleve.'", nom_fils ="'.$nom_eleve.'", prenom_fils ="'.$prenom_eleve.'", ddn_fils ="'.$date_nais_eleve.'", tel_mobile ="'.$tel_eleve.'", courriel ="'.$mail_eleve.'" WHERE id="'.$id.'"';

                if ($db->query($sql_modif) === TRUE) {
                    $success = 'Elève bien modifié !';
                } else {
                    $error= "Error: $sql_modif <br> $db->error";
                }
            }
            else $error = "Aucun champ ne doit être vide";
        }
    }
    
    f_donnees();
    set("success", $success);
    set("error", $error);
    
    return html('donnees.html.php', 'layout.html.php');
}
?>