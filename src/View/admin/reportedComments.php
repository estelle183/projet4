<?php
ob_start ();
?>

    <table class="table">
    <tr>
        <th scope="col">Date de création</th>
        <th scope="col">Auteur</th>
        <th scope="col">Contenu</th>
        <th scope="col">Modification</th>
        <th scope="col">Modération</th>
    </tr>

<?php foreach ($comments as $co) : ?>

    <?php if (($co->getReported() == 1) || ($co->getModerate() == 1)) : ?>

        <tr>
            <td><?= $co->getCommentDate (); ?></td>
            <td><?= $co->getAuthor (); ?></td>
            <td><?= $co->getComment (); ?></td>
            <td><?php if($co->getReported() == 0) : ?><p>Signalement annulé</p><?php else : ?><a href="adminCancelReport&id=<?= $co->getId(); ?>">Annuler le signalement</a><?php endif; ?>
            <td><?php if($co->getModerate() == 0) : ?><a href="adminModerate&id=<?= $co->getId(); ?>">Modérer le commentaire</a><?php else : ?><a href="adminCancelModerate&id=<?= $co->getId(); ?>">Annuler la modération</a>

                <?php endif; ?></td>
        </tr>

    <?php endif; ?>
<?php endforeach; ?>

<?php
$content = ob_get_clean ();
require ('src/View/template.php');
?>