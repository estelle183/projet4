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

<?php

foreach ($result->getComments() as $co) {

    ?>
    <h2><?= $co->getAuthor(); ?></h2>
    <h3><?= $co->getComment();  ?></h3>
    <p><?= $co->getCommentDate(); ?></p>
    <input action="reportedComment&id=<? $result->getId()?>" type="submit" value="Reporter" />
    <input type="submit" value="Modérer" />
    <?php
}
?>

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