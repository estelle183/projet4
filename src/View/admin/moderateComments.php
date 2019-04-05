<?php
ob_start ();
?>

    <table class="table">
    <tr>
        <th scope="col">Date de création</th>
        <th scope="col">Auteur</th>
        <th scope="col">Contenu</th>
        <th scope="col">Modification</th>
    </tr>

<?php foreach ($comments as $co) : ?>

    <?php if ($co->getModerate() == 1) : ?>

        <tr>
            <td><?= $co->getCommentDate (); ?></td>
            <td><?= $co->getAuthor (); ?></td>
            <td><?= $co->getComment (); ?></td>
            <td><a href="adminCancelModerate&id=<?= $co->getId(); ?>">Annuler la modération</a>

        </tr>

    <?php endif; ?>
<?php endforeach; ?>

<?php
$content = ob_get_clean ();
require ('src/View/template.php');
?>