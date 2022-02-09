<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <div>
          <form method="get" action="testDelPassager.php">
                <fieldset>
                    <legend>Supprimer un passager d'un trajet :</legend>
                    <p>
                        <label for="trajet_id">Identifiant du trajet</label> :
                        <input type="text" placeholder="Ex : 13" name="trajet_id" id="trajet_id" required/>
                    </p>
                    <p>
                        <label for="login">Votre login</label> :
                        <input type="text" placeholder="Ex : zuckerberg" name="login" id="login" required/>
                    </p>
                    <p>
                        <input type="submit" value="Envoyer" />
                    </p>
                </fieldset> 
            </form>
        </div>
    </body>
</html>
