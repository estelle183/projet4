<?php
ob_start ();
?>

<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Commentaires signalés</h2>
    </div>
    <div class="admin-table responsive-table-line table table-striped">
        <table class="table table-bordered table-condensed table-body-center" >
    <tr>
        <th scope="col">Date de création</th>
        <th scope="col">Auteur</th>
        <th scope="col">Contenu</th>
        <th scope="col">Annuler le signalement</th>
        <th scope="col">Modérer le commentaire</th>
    </tr>

<?php foreach ($comments as $co) : ?>

    <?php if (($co->getReported() == 1) && ($co->getModerate() == 0)) : ?>

        <tr>
            <td><?= $co->getCommentDate (); ?></td>
            <td><?= htmlspecialchars($co->getAuthor ()); ?></td>
            <td><?= htmlspecialchars($co->getComment ()); ?></td>
            <td align="center"><a class="btn btn-admin btn-info btn-xs" href="adminCancelReport&id=<?= $co->getId(); ?>"><i class="fas fa-play"></i></a>
            <td align="center"><?php if($co->getModerate() == 0) : ?><a class="btn btn-admin  btn-danger btn-xs" href="adminModerate&id=<?= $co->getId(); ?>"><i class="far fa-stop-circle"></i></a>

                <?php endif; ?></td>
        </tr>

    <?php endif; ?>
<?php endforeach; ?>
    </table>
</div>
</div>

<?php
$content = ob_get_clean ();
require ('src/View/template.php');
?>