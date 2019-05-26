<?php $title = "Commentaires modérés"; ?>
<?php
ob_start ();
?>
<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Commentaires modérés</h2>
    </div>
    <div class="admin-table responsive-table-line table table-striped">
        <table class="table table-bordered table-condensed table-body-center" >
    <tr>
        <th scope="col">Date de création</th>
        <th scope="col">Auteur</th>
        <th scope="col">Contenu</th>
        <th scope="col">Annuler la modération</th>
    </tr>

<?php foreach ($comments as $co) : ?>

    <?php if ($co->getModerate() == 1) : ?>

        <tr>
            <td><?= $co->getCommentDate (); ?></td>
            <td><?= htmlspecialchars($co->getAuthor ()); ?></td>
            <td><?= htmlspecialchars($co->getComment ()); ?></td>
            <td align="center"><a <a class="btn btn-admin  btn-danger btn-xs" href="adminCancelModerate&id=<?= $co->getId(); ?>" onclick="return confirm('Etes-vous sûr de vouloir annuler la modération du commentaire ?')"><i class="far fa-stop-circle"></i></a>

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