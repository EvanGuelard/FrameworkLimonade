<?php

function f_promo() {
    
    include 'connect.php';
    
    $sql = ' SELECT id_promo, nom_promo FROM promo';

    if(!$result = $db->query($sql)){
        die('There was an error running the query (promo.php) [' . $db->error . ']');
    }

    $liste_promo = array();

    while($row = $result->fetch_assoc()){
        $liste_promo[$row['nom_promo']] = $row['id_promo'];

    }
    
    set("liste_promo", $liste_promo);
    
    return html('promotions.html.php', 'layout.html.php');
}


function post_promo() {
    
    
    include 'connect.php';

    $success = "";
    $error = "";
    
    if(isset($_POST['type'])) {
       
        //INSERTION
        if($_POST["type"] == "post_ajout") {
            
            if(isset($_POST['nom_promo']) && !empty($_POST['nom_promo']) || isset($_POST['code_promo']) && !empty($_POST['code_promo'])) {
            
            if(isset($_POST['nom_promo']) && !empty($_POST['nom_promo'])) {
                $nom_promo = $_POST['nom_promo'];
            
                if(isset($_POST['code_promo']) && !empty($_POST['code_promo'])) {
                    $code_promo = $_POST['code_promo'];
                    
                    if(!ereg( ".*A[1-5].*" , $code_promo)) {
                        $error = "L'identifiant doit contenir 'A' suivi de l'année (chiffre entre 1 et 5)";
                    } else {
                            
                            $code_promo = str_replace("&", "_et_", $code_promo);
                            $nom_promo = htmlspecialchars($nom_promo);
                            $code_promo = htmlspecialchars($code_promo);

                        $sql_ajout = 'INSERT INTO promo (id_promo, nom_promo) VALUES ("'.$code_promo.'", "'.$nom_promo.'")';

                        if ($db->query($sql_ajout) === TRUE) {
                            $success = "$nom_promo - $code_promo à bien été ajouté !";
                        } else {
                            $error = "Error: $sql_ajout <br> $db->error";
                        }
                    }
                } else {
                    $error = "Aucun champ ne doit être vide";
                }
            
            } else {
                $error = "Aucun champ ne doit être vide";
            }
            } else {
                $error = "Aucun champ ne doit être vide";
            }
            
        }
        
        //MODIFICATION
        if($_POST["type"] == "post_modif") {
            if(isset($_POST['nom_promo']) && !empty($_POST['nom_promo']) || isset($_POST['code_promo']) && !empty($_POST['code_promo'])) {

                if(isset($_POST['nom_promo']) && !empty($_POST['nom_promo'])) {
                    $nom_promo = $_POST['nom_promo'];

                    if(isset($_POST['code_promo']) && !empty($_POST['code_promo'])) {
                        $code_promo = $_POST['code_promo'];
                        
                        if(!ereg( ".*A[1-5].*" , $code_promo)) {
                            $error = "L'identifiant doit contenir 'A' suivi de l'année (chiffre entre 1 et 5)";
                        } else {

                            if(isset($_POST['identifiant_promo'])) $identifiant_promo = $_POST['identifiant_promo'];
                            
                            $code_promo = str_replace("&", "_et_", $code_promo);
                            $nom_promo = htmlspecialchars($nom_promo);
                            $code_promo = htmlspecialchars($code_promo);

                            $sql_modif = 'UPDATE promo SET id_promo="'.$code_promo.'", nom_promo="'.$nom_promo.'" WHERE id_promo="'.$identifiant_promo.'"';

                            if ($db->query($sql_modif) === TRUE) {
                                $success = "$nom_promo - $code_promo à bien été modifié !";
                            } else {
                                $error = "Error: $sql_modif <br> $db->error";
                            }
                        }
                    } else {
                        $error = "Aucun champ ne doit être vide";
                    }
                } else {
                    $error = "Aucun champ ne doit être vide";
                }
            } else {
                $error = "Aucun champ ne doit être vide";
            }
        }
        
        //SUPPRESSION
        if($_POST["type"] == "post_suppr") {
            if(isset($_POST['identifiant_promo'])) $identifiant_promo = $_POST['identifiant_promo'];
            
            if(isset($_POST['nom_promo'])) $nom_promo = $_POST['nom_promo'];

            $sql_suppr = 'DELETE FROM promo WHERE id_promo="'.$identifiant_promo.'"';

            if ($db->query($sql_suppr) === TRUE) {
                $success = "$nom_promo - $identifiant_promo à bien été supprimé !";
            } else {
                $error = "Error: $sql_suppr <br> $db->error";
            }

        }  
    }
    
    f_promo();
    set("success", $success);
    set("error", $error);
    
    return html('promotions.html.php', 'layout.html.php');
}

?>