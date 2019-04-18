<?php
ob_start();
?>

<div class="container">
    <table class="table">
        <tr>
            <th scope="col">Date d'envoi</th>
            <th scope="col">Nom</th>
            <th scope="col">Mail</th>
            <th scope="col">Sujet</th>
            <th scope="col">Lire</th>
            <th scope="col">Traitement</th>
        </tr>

        <?php foreach ($contacts as $co) : ?>

            <?php if ($co->getProcessed() == 0) : ?>

                <tr>
                    <td><?= $co->getDateSend (); ?></td>
                    <td><?= $co->getName (); ?></td>
                    <td><?= $co->getEMail (); ?></td>
                    <td><?= $co->getSubject (); ?></td>
                    <td><a href="admin-mail&id=<?= $co->getId(); ?>"><?= substr ($co->getMessage (), 0, 10); ?>...</td>
                    <td><a href="adminProcessedMail&id=<?= $co->getId(); ?>">Mail traité</a></td>
                </tr>

            <?php endif; ?>
        <?php endforeach; ?>
    </table>
</div>

<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>
