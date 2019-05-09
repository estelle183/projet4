<?php
ob_start();
?>

<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Gestion des chapitres</h2>
    </div>


<div class="admin-table responsive-table-line table table-striped" style="margin:10px 2%;">
    <table class="table table-bordered table-condensed table-body-center" >
    <tr>
    <th scope="col">Date de création /modification</th>
    <th scope="col">Titre / Sous-titre</th>
    <th scope="col">Contenu</th>
    <th scope="col">Modification</th>
        <th scope="col">Suppression</th>
    </tr>

    <?php foreach ($chapters as $chapter) : ?>
    <tr>

        <td><?= $chapter->getCreationDate();  ?><br/><?= $chapter->getUpdateDate(); ?></td>
        <td><?= $chapter->getTitle(); ?><br/><?= $chapter->getSubtitle(); ?></td>
        <td><?=substr ($chapter->getContent(), 0, 20); ?>...</td>
        <td align="center"><a class="btn btn-admin btn-info btn-xs" href="admin-modification-chapitre&id=<?= $chapter->getId(); ?>"><i class="fas fa-pencil-alt"></i></a></td>

        <td align="center"><a class="btn btn-admin btn-danger btn-xs"href="admin-suppression-chapitre&id=<?= $chapter->getId(); ?>"><i class="fas fa-trash-alt"></i></a></td>

    </tr>
    <?php endforeach; ?>

</table>

        <a class="btn btn-primary float-right" href=admin-nouveau-chapitre>Nouveau chapitre</a><br/>

</div>
</div>




<?php
$content = ob_get_clean();
require('src/View/template.php');
?>

