<?php
ob_start();
?>
<h1>Page Admin</h1>

<?php foreach ($chapters as $chapter) : ?>


    <h2><?= $chapter->getTitle(); ?></h2>
    <p><?= $chapter->getCreationDate();  ?></p>
    <p><?=substr ($chapter->getContent(), 0, 50); ?>...</p>
    <em><a href="adminChapter&id=<?= $chapter->getId(); ?>">Suite</a></em>
<?php endforeach; ?>

<?php
$content = ob_get_clean();
require('src/View/template.php');
?>

