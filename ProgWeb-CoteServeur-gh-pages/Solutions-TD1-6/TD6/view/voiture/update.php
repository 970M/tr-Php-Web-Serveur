<div>
    <form method="get" action="">
        <fieldset>
            <legend>Mon formulaire :</legend>
            <p>
                <label for="immat_id">Immatriculation</label> :
                <!-- Le short tag ">?=" équivaut à ">?php echo"  (remplacer > par <) -->
                <!-- cf https://www.php.net/manual/en/language.basic-syntax.phptags.php -->
                <input type="text" value="<?= $immatHTML; ?>" placeholder="Ex : 256AB34" name="immatriculation" id="immat_id" <?= $primary_property; ?>>
            </p>
            <p>
                <label for="marque_id">Marque</label> :
                <input type="text" value="<?= $marqueHTML; ?>" placeholder="Ex : Renault" name="marque" id="marque_id"  required>
            </p>
            <p>
                <label for="couleur_id">Couleur</label> :
                <input type="text" value="<?= $couleurHTML; ?>" placeholder="Ex : Bleu" name="couleur" id="couleur_id"  required>
            </p>
            <input type='hidden' name='action' value='<?= $next_action; ?>'>
            <input type='hidden' name='controller' value='<?= $controller; ?>'>
            <p>
                <input type="submit" value="Envoyer" />
            </p>
        </fieldset> 
    </form>
</div>
