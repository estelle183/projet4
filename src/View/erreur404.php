<?php
ob_start ();

?>

<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Fausse route...</h2>
    </div>
<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>404</h1>
        </div>
        <h2>Oops, La page demandée n'est pas trouvée !</h2>
        <a class="btn btn-primary" href="#"><span class="arrow"></span>Retourner à l'accueil</a>
    </div>
</div>
</div>


<?php
$content = ob_get_clean ();
require ('src/View/template.php');
?>