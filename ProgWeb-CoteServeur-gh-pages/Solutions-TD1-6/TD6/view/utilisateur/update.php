<div>
    <form method="get" action="">
        <fieldset>
            <legend>Mon formulaire :</legend>
            <p>
                <label for="login_id">Login</label> :
                <input type="text" value="<?php echo $loginHTML; ?>" placeholder="Ex : 256AB34" name="login" id="login_id" <?php echo $primary_property; ?>>
            </p>
            <p>
                <label for="prenom_id">Prenom</label> :
                <input type="text" value="<?php echo $prenomHTML; ?>" placeholder="Ex : Renault" name="prenom" id="prenom_id"  required>
            </p>
            <p>
                <label for="nom_id">Nom</label> :
                <input type="text" value="<?php echo $nomHTML; ?>" placeholder="Ex : Bleu" name="nom" id="nom_id"  required>
            </p>
            <input type='hidden' name='action' value='<?php echo $next_action; ?>'>
            <input type='hidden' name='controller' value='<?php echo $controller; ?>'>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset> 
    </form>
</div>
