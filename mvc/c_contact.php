<?php
  require ('m_contact.php');		// On commence par inclure le modèle
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Insertion d'un nouveau contact suite au remplissage du formulaire
    insert_contact($_POST);
    header("location: {$_SERVER['PHP_SELF']}");
    exit;
  } else {  //Sinon affichage des contacts en appelant les fonctions
     $nbre_contact = get_nbcontacts();
	 
	 $t_contacts = get_contacts();
 
	require ('v_contact.php'); 	// Affichage de la vue résultat
  }
?>
