<?php
ob_start();
?>

<div class="container">
<h1>Gestion des chapitres</h1><br/>

<a href=admin-nouveau-chapitre>Nouveau chapitre</a><br/>

<div class="responsive-table-line" style="margin:10px 2%;">
    <table class="table table-bordered table-condensed table-body-center" >
    <tr>
    <th scope="col">Date de création</th>
        <th scope="col">Date de modification</th>
    <th scope="col">Titre</th>
        <th scope="col">Sous-titre</th>
    <th scope="col">Contenu</th>
    <th scope="col">Modification</th>
        <th scope="col">Suppression</th>
    </tr>

    <?php foreach ($chapters as $chapter) : ?>
    <tr>

        <td><?= $chapter->getCreationDate();  ?></td>
        <td><?= $chapter->getUpdateDate(); ?></td>
        <td><?= $chapter->getTitle(); ?></td>
        <td><?= $chapter->getSubtitle(); ?></td>
        <td><?=substr ($chapter->getContent(), 0, 20); ?>...</td>
        <td><a href="admin-modification-chapitre&id=<?= $chapter->getId(); ?>">Modifier</a</td>
        <td><a href="admin-suppression-chapitre&id=<?= $chapter->getId(); ?>">Supprimer</a></td>

    </tr>
    <?php endforeach; ?>

</table>
</div>
</div>




<?php
$content = ob_get_clean();
require('src/View/template.php');
?>

