<?php
ob_start ();

?>

<div class="container">
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>404</h1>
        </div>
        <h2>Oops, La page demandée n'est pas trouvée !</h2>
        <a href="#"><span class="arrow"></span>Retourner à l'accueil</a>
    </div>
</div>
</div>


<?php
$content = ob_get_clean ();
require ('src/View/template.php');
?>