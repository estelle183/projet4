<?php
ob_start();
?>
<div class="container">

    <h1><?= $result->getTitle(); ?></h1>
    <h2><?= $result->getSubtitle(); ?></h2>
    <p>Ajouté le <?= $result->getCreationDate(); ?></p>
<?php if ($result->getUpdateDate () != NULL) : ?>
    <p>Modifié le <?= $result->getUpdateDate (); ?></p>
<?php endif; ?>
    <p><?= $result->getContent(); ?></p>

    <a href="deleteChapter&id=<?= $result->getId();?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce chapitre ?')"> Supprimer</a>

</div>

<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>