<?php $title = "Supression d'un chapitre"; ?>
<?php
ob_start();
?>
<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Supprimer un chapitre</h2>
    </div>
<div class="post-preview">
    <h1 class="post-title"><?= htmlspecialchars($result->getTitle()); ?></h1>
    <h2 class="post-subtitle"><?= htmlspecialchars($result->getSubtitle()); ?></h2>
    <p class="post-meta">Ajouté le <?= $result->getCreationDate(); ?></p>
<?php if ($result->getUpdateDate () != NULL) : ?>
    <p class="post-meta">Modifié le <?= $result->getUpdateDate (); ?></p>
<?php endif; ?>
    <p class="lead"><?= $result->getContent(); ?></p>

    <a class="btn btn-danger" href="deleteChapter&id=<?= $result->getId();?>" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce chapitre ?')"> Supprimer</a>

</div>
</div>

<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>