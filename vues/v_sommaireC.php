    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    
        <h2>
    
</h2>
    
      </div>  
        <ul id="menuList">
			<li >
				Comptable :<br>
				<?php echo $_SESSION['prenom']."  ".$_SESSION['nom']  ?>
			</li>
			<li class="smenu">
				<a href="index.php?uc=gererFrais&action=estValider" title="Est valider fiche de frais ">Voir fiche de frais</a>
			</li>
			<li class="smenu">
<<<<<<< HEAD
				<a href="index.php?uc=etatFrais&action=selectionnerUtilisateur" title="Consultation des fiches de frais">Fiche de frais validée</a>
=======
				<a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation des fiches de frais">Fiche de frais validée</a>
>>>>>>> 993a171e33bb9e7127610d83bc2b711ba0abf126
			</li>
			<li class="smenu">
				<a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
			</li>
         </ul>
        
    </div>
    