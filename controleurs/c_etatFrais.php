<?php
if($_SESSION['role'] == 0){
	include("vues/v_sommaireV.php");
	$action = $_REQUEST['action'];
	$idVisiteur = $_SESSION['idVisiteur'];
	switch($action){
		case 'selectionnerMois':{
			$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
			// Afin de sélectionner par défaut le dernier mois dans la zone de liste
			// on demande toutes les clés, et on prend la première,
			// les mois étant triés décroissants
			$lesCles = array_keys( $lesMois );
			$moisASelectionner = $lesCles[0];
			include("vues/v_listeMois.php");
			break;
		}
		case 'voirEtatFrais':{
			$leMois = $_REQUEST['lstMois']; 
			$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
			$moisASelectionner = $leMois;
			include("vues/v_listeMois.php");
			$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
			$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
			$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
			$numAnnee =substr( $leMois,0,4);
			$numMois =substr( $leMois,4,2);
			$libEtat = $lesInfosFicheFrais['libEtat'];
			$montantValide = $lesInfosFicheFrais['montantValide'];
			$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
			$dateModif =  $lesInfosFicheFrais['dateModif'];
			$dateModif =  dateAnglaisVersFrancais($dateModif);
			include("vues/v_etatFrais.php");
		}
	}
}
else{
	include("vues/v_sommaireC.php");
	$action = $_REQUEST['action'];
	$idVisiteur = $_SESSION['idVisiteur'];
	//Script de gestion des cloture de fiche de frais du mois precedent
	$liste = $pdo->getVisiteur();
	$lstCL = array();
	$i = 0;
	foreach($liste as $key=>$valeur){
		$mois = $pdo->dernierMoisSaisi($valeur['id']);
		$reponse = $pdo->estPremierFraisMois($valeur['id'],$mois);
		$etat = $pdo->getLesInfosFicheFrais($valeur['id'],$mois);
		if(!empty($mois) && $mois!=$pdo->getMois() && !$reponse && $etat['idEtat'] =='CR'){
			$pdo->majEtatFicheFrais($valeur['id'],$mois,'CL');
		}
		if($etat['idEtat'] == 'CL'){
			$lstCL[$i] = array($valeur['id'],$valeur['login'],$mois);
			$i+=1;
		}
	}
	echo "<script>get_color(".$_SESSION['role'].");</script>";
	
	switch($action){
		case 'selectionnerUtilisateur':{
			include("vues/v_gestionC.php");
			break;
		}
		case 'etatFrais':{
			if(isset($_POST['lstUtil']) && !empty($_POST['lstUtil'])){
				$lutil=$_POST['lstUtil'];
				$_SESSION['lutil']=$lutil;
				$rs = rechercheUtilLeMois($lutil,$lstCL);
				$lesFrais = $pdo->getLesFraisForfait($lutil,$rs);
				echo "<p>".var_dump($lesFrais)."</p>";
				if(!empty($lesFrais)){
					include("vues/v_gestionC.php");
					include("vues/v_liste_fraisC.php");
					break;
				}else{
					include("vues/v_gestionC.php");
					include("vues/v_pas2frais.php");
					break;
				}
				echo "<script>get_color(".$_SESSION['role'].");</script>";
			} 
			echo "<script>get_color(".$_SESSION['role'].");</script>";
		}
		case 'validerFForfait':{
			echo "<script>get_color(".$_SESSION['role'].");</script>";
			$pdo->validerFrais($_SESSION['lutil']);
			include("vues/v_liste_fraisC.php");
			break;
		}
	}
}
?>