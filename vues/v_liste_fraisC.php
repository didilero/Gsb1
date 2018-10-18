<div id="contenu">
      <h2>Les fiches de frais de l'utilisateur imatriculer : <?php echo $_SESSION['lutil'] ?></h2>
         
      <form method="POST"  action="index.php?uc=etatFrais&action=validerFForfait">
		<div class="corpsForm">
		<fieldset>
            <legend>Eléments forfaitisés
            </legend>
			<?php
				foreach ($lesFrais as $unFrais)
				{
					$idFrais = $unFrais['idfrais'];
					$libelle = $unFrais['libelle'];
					$quantite = $unFrais['quantite'];
			?>
					<p>
						<label for="idFrais"><?php echo $libelle ?></label>
						<input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" >
					</p>
			<?php
				}
			?>
			<p>
				<input name="ok" type="submit" value="Valider" size="20" />
				<input name="ok" type="submit" value="Refuser" size="20" />
			</p>
          </fieldset>
		  
      </div>
	  </form>
</div>