<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array( $visiteur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
		else{
			#recuperation dans le tableau visiteur renvoyer par la requete, de la valeur a la clef id
			$id = $visiteur['id']; 
			#recuperation dans le tableau visiteur renvoyer par la requete, de la valeur a la clef nom
			$nom =  $visiteur['nom'];
			#recuperation dans le tableau visiteur renvoyer par la requete, de la valeur a la clef prenom
			$prenom = $visiteur['prenom'];
			#recuperation dans le tableau visiteur renvoyer par la requete, de la valeur a la clef role
			$role = $visiteur['role'];
			#création des variable de session de la personne qui se connecte
			connecter($id,$nom,$prenom,$role); 
			# on verifie maintenant si c'est un visiteru ou un comptable qui se connecte
			if($role == 0){ #role = 0 correspond a un visiteur
				include("vues/v_sommaireV.php");
			}else{
				include("vues/v_sommaireC.php");
				echo "<script>get_color(".$_SESSION['role'].");</script>";
			}
		}
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>