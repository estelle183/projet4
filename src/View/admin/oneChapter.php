<?php
ob_start();
if(isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
}
?>

<h1><?= $result->getTitle(); ?></h1>
<p><?= $result->getCreationDate(); ?></p>
<p><?= $result->getContent(); ?></p>

<?php foreach ($result->getComments() as $co) : ?>
    <h2><?= $co->getAuthor(); ?></h2>
    <h3><?= $co->getComment();  ?></h3>
    <p><?= $co->getCommentDate(); ?></p>
    <?php if($co->getReported() == 0) : ?>
        <a href="reportedComment&id_chapter=<?= $result->getId();?>&id=<?= $co->getId();?>"> Reporter</a>
    <?php else : ?>
        <p>Ce commentaire est signalé</p>
    <?php endif; ?>
<?php endforeach; ?>



<?php
$content = ob_get_clean();
require('src/View/template.php');
?>
