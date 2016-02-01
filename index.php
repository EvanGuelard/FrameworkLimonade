<?php

require_once '/lib/limonade.php';

dispatch('/', 'f_promo');

dispatch('/promotions/', 'f_promo');

dispatch_post('/promotions', 'post_promo');

dispatch('/fichiers/', 'f_fic');

dispatch_post('/fichiers', 'post_fichier');

dispatch('/donnees_perso/', 'f_donnees');

dispatch_post('/donnees_perso', 'post_donnees');

run();

?>