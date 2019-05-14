<?php
ob_start();
?>

<div class="container">
    <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
        <img src="public/images/heading.jpg" class="heading-logo" width="100px">
        <h2 class="heading-title">Gestion des contacts</h2>
    </div>
    <div class="admin-table responsive-table-line table table-striped">
        <table class="table table-bordered table-condensed table-body-center" >
        <tr>
            <th scope="col">Date d'envoi</th>
            <th scope="col" class="d-none d-lg-table-cell">Nom</th>
            <th scope="col" class="d-none d-sm-table-cell">Mail</th>
            <th scope="col">Sujet</th>
            <th scope="col">Lire</th>
            <th scope="col">Classer</th>
        </tr>

        <?php foreach ($contacts as $co) : ?>

            <?php if ($co->getProcessed() == 0) : ?>

                <tr>
                    <td><?= $co->getDateSend (); ?></td>
                    <td class="d-none d-lg-table-cell"><?= htmlspecialchars($co->getName ()); ?></td>
                    <td class="d-none d-sm-table-cell"><?= htmlspecialchars($co->getEMail ()); ?></td>
                    <td><?= htmlspecialchars($co->getSubject ()); ?></td>
                    <td align="center"><a class="btn btn-admin btn-info btn-xs" href="admin-mail&id=<?= $co->getId(); ?>"><i class="fas fa-envelope-open-text"></i></td>
                    <td align="center"><a class="btn btn-admin btn-info btn-xs" href="adminProcessedMail&id=<?= $co->getId(); ?>"><i class="fas fa-folder-open"></i></a></td>
                </tr>

            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <a class="btn btn-primary float-right" href=admin-vue-contacts>Voir tous les mails</a><br/>
</div>

<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>
