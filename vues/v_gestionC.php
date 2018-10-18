<div id="contenu">
      <h2>Fiches de frais des visiteurs</h2>
      <h3>Utilisateur à sélectionner : </h3>
	  <form action="index.php?uc=etatFrais&action=etatFrais" method="post">
      <div class="corpsForm">
         
      <p>
	  <label for="lstUtilisateur" accesskey="n">Utilisateurs : </label>
        <select id="lstUtilisateur" name="lstUtil">
		<?php
			for($i=0;$i<sizeOf($lstCL);$i++){
				echo $lstCL[$i][1];
            //0 correspond a l'id et 1 au login 
		   ?> 
		   <option selected value="<?php echo $lstCL[$i][0] ?>"><?php echo  $lstCL[$i][1] ?> </option>
		   <?php 
			}
		   ?>
		 </select>
      </p>
      </div>
      <div class="piedForm">
      <p>
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p> 
      </div>
        
      </form>