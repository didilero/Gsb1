<?php
  //Fonction permettant une connexion à la base contacts
  function dbconnect() {
	$connect = new PDO('mysql:host=localhost;dbname=contact', 'root', '');
    mysql_select_db('contact');
    return $connect;
  }
  
  //Fonction permettant de récupérer l'ensemble des contacts
  function get_contacts() {
	$bdd = dbconnect();
	$req = $bdd->query("SELECT * FROM contact");
	$result = array();
	while ($comment = $req->fetch() ) {
      $result[] = $comment;
    }

    return $result;
  }
  
  //Fonction permettant de récupérer le nombre de contacts
  function get_nbcontacts() {
	//$bdd = dbconnect();
    $req = dbconnect()->query("SELECT count(*) as nb FROM contact");
    $nbcontact = $req->fetch();
    return $nbcontact['nb'];
	
  }
	
	function insert_contact($contact) {
	$bdd = dbconnect();
	
	$st = $bdd->prepare("insert into contact values (null,?,?,?,?)");
	$st->bindParam(1,$contact['nom']);
	$st->bindParam(2,$contact['prenom']);
	$st->bindParam(3,$contact['email']);
	$st->bindParam(4,$contact['commentaire']);
	$st->execute();
  }

?>
