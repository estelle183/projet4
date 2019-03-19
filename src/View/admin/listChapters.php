<?php
ob_start();
?>
<h1>Page Admin</h1>

<a href=admin-nouveau-chapitre>Nouveau chapitre</a>

<table class="table">
    <tr>
    <th scope="col">Date de création</th>
    <th scope="col">Titre</th>
    <th scope="col">Contenu</th>
    <th scope="col">Modification</th>
    </tr>

    <?php foreach ($chapters as $chapter) : ?>
    <tr>

        <td><?= $chapter->getCreationDate();  ?></td>
        <td><?= $chapter->getTitle(); ?></td>
        <td><?=substr ($chapter->getContent(), 0, 20); ?>...</td>
        <td>ddd</td>

    </tr>
    <?php endforeach; ?>

</table>





<?php
$content = ob_get_clean();
require('src/View/template.php');
?>

