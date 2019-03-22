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

    <?php if ($co->getModerate() == 1) : ?>
        <p>Ce commentaire est modéré par l'administrateur</p>
        <?php else :?>
        <p><?= $co->getComment();  ?></p>
    <?php endif; ?>
    <p><?= $co->getCommentDate(); ?></p>
    <?php if($co->getReported() == 0 && $co->getModerate() != 1) : ?>
    <a href="reportedComment&id_chapter=<?= $result->getId();?>&id=<?= $co->getId();?>" onclick="return confirm('Etes-vous sûr de vouloir signaler ce commentaire ?')"> Signaler</a>
    <?php endif; ?>
<?php endforeach; ?>

    <form action="addComment&id=<?= $result->getId()?>" method="post">
        <p>
            <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" required/><br />
            <label for="message">Message</label> :  <textarea name="message" id="message" required></textarea><br />

            <input type="submit" value="Envoyer" />
        </p>
    </form>


<?php
$content = ob_get_clean();
require('src/View/template.php');
?>