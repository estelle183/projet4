<?php
ob_start();
?>

<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Tous les contacts</h2>
    </div>
    <div class="admin-table responsive-table-line table table-striped" style="margin:10px 2%;">
        <table class="table table-bordered table-condensed table-body-center" >
        <tr>
            <th scope="col">Date d'envoi</th>
            <th scope="col">Nom</th>
            <th scope="col">Mail</th>
            <th scope="col">Sujet</th>
            <th scope="col">Lire</th>
            <th scope="col">Traitement</th>
        </tr>

        <?php foreach ($contacts as $co) : ?>



                <tr>
                    <td><?= htmlspecialchars($co->getDateSend ()); ?></td>
                    <td><?= htmlspecialchars($co->getName ()); ?></td>
                    <td><?= htmlspecialchars($co->getEMail ()); ?></td>
                    <td><?= htmlspecialchars($co->getSubject ()); ?></td>
            <td align="center"><a class="btn btn-admin btn-info btn-xs" href="admin-mail&id=<?= $co->getId(); ?>"><i class="fas fa-envelope-open-text"></i></td>
                    <td align="center"><?php if ($co->getProcessed() == 0) : ?><a class="btn btn-admin btn-info btn-xs" href="adminProcessedMail&id=<?= $co->getId(); ?>"><i class="fas fa-folder-open"></i></a>
                <?php else: ?>Mail classé</td>
                </tr>

            <?php endif; ?>
        <?php endforeach; ?>
    </table>

</div>

<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>
