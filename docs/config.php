<?php

  $titre = "Documents de rentrée";
  $annee = "2015";
  $cle = "isen2015";
  
  // informations concernant la base de données
  $DbHost = "127.0.0.1";
  $DbName = "rentree";
  $DbUser = "user";
  $DbPassword = "user"; 


//Modifications
/***/

$db = new mysqli($DbHost,  $DbUser,  $DbPassword, $DbName);
$db->query("SET NAMES 'utf8'");

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = ' SELECT id_promo, nom_promo FROM promo';

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

$libellePromo = array();

while($row = $result->fetch_assoc()){
    //    echo $row["nom_promo"] .' !!!!! '.$row["id_promo"] .'<br>';
    $libellePromo[$row['nom_promo']] = $row['id_promo'];

}

/***/
  
//  $libellePromo = array (
//    "1&#x02B3;&#x1D49; année, Cycle Sciences de l'Ingénieur" => "CSI_A1",
//    "1&#x02B3;&#x1D49; année, Cycle Informatique et Réseaux (Brest)" => "CIR_BREST_A1",
//    "1&#x02B3;&#x1D49; année, Cycle Informatique et Réseaux (Rennes)" => "CIR_RENNES_A1",        
//    "1&#x02B3;&#x1D49; année, BTS Prépa" => "BTSPREPA_A1",    
//    "2&#x1D49; année, Cycle Sciences de l'Ingénieur" => "CSI_A2",
//    "2&#x1D49; année, Cycle Informatique et Réseaux (Brest)" => "CIR_BREST_A2",
//    "2&#x1D49; année, Cycle Informatique et Réseaux (Rennes)" => "CIR_RENNES_A2",        
//    "2&#x1D49; année, BTS Prépa" => "BTSPREPA_A2",     
//    "3&#x1D49; année, Cycle Sciences de l'Ingénieur" => "CSI_A3",
//    "3&#x1D49; année, Cycle Informatique et Réseaux (alternant)" => "CIR_A3_ALT",
//    "3&#x1D49; année, Cycle Informatique et Réseaux (non alternant)" => "CIR_A3_NONALT",    
//    "3&#x1D49; année, Cycle Ingénieur Par l'Apprentissage" => "CIPA_A3",
//    "4&#x1D49; année, Majeure - M1" => "M_A4",
//    "4&#x1D49; année, Cycle Ingénieur Par l'Apprentissage" => "CIPA_A4",
//    "5&#x1D49; année, Majeure - M2 (alternant)" => "M_A5_ALT",
//    "5&#x1D49; année, Majeure - M2 (non alternant)" => "M_A5_NONALT",    
//    "5&#x1D49; année, Cycle Ingénieur Par l'Apprentissage" => "CIPA_A5"
//  );

  require_once("lib.php");
  
?>
