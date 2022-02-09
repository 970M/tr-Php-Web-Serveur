<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <div>
          <form method="get" action="testFindUtil.php">
                <fieldset>
                    <legend>Chercher les passagers d'un trajet :</legend>
                    <p>
                        <label for="trajet_id">Identifiant du trajet</label> :
                        <input type="text" placeholder="Ex : 13" name="trajet_id" id="trajet_id" required/>
                    </p>
                    <p>
                        <input type="submit" value="Envoyer" />
                    </p>
                </fieldset> 
            </form>
        </div>
    </body>
</html>
