<?php
ob_start();
?>



<div class="form-group">
<form action="admin-connexion-check" method="post">

    <label for="pseudo">Votre identifiant</label>
    <input type="text" name="pseudo" required>
    <label for="password">Votre mot de passe</label>
    <input type="password" name="password" required>
    <button type="submit">Valider</button>

</form>
</div>


<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>