<html>
 <head>
 <title>Les contacts</title>
 </head>
 <body>
  <h1>Les Contacts</h1>
  <div id="contact">
    <h3> <?php	echo $nbre_contact ?> contacts : </h3>
      <?php
      //Affichage des contacts
      foreach ($t_contacts AS $contact) {
        echo '<p>'.$contact['Numero'].' - '.$contact['Nom'];
      }    ?>
    
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="ajoutcontact">
    <input type="text" name="nom" value="Votre nom"><br />
    <input type="text" name="prenom" value="Votre prenom"><br />
    <input type="text" name="email" value="Votre email"><br />
    <textarea name="commentaire" rows="5" cols="20">Saisissez votre commentaire</textarea>
	<br />
    <input type="submit" name="submit" value="Envoyer">
  </form>
  </div>
</body> </html>

