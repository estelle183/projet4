<?php
ob_start();
?>

<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Mail de <?= $result->getName(); ?></h2>
    </div>
    <div class="post-preview"></div>
    <h2 class="post-title"><?= $result->getSubject(); ?></h2>
    <p class="post-meta">Envoyé le <?= $result->getDateSend(); ?></p>
    <p class="lead"><?= $result->getMessage(); ?></p>
    <a class="btn btn-primary float-left" href=admin-gestion-contacts>Retour aux contacts</a><br/>

</div>


</div>

<?php
$content = ob_get_clean ();
require ('src/View/template.php');
?>
