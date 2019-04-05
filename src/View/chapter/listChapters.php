<?php
ob_start();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php foreach ($chapters as $chapter) : ?>
            <div class="post-preview">
                <a href="chapitre&id=<?= $chapter->getId(); ?>">
                    <h2 class="post-title">
                        <?= $chapter->getTitle(); ?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?= $chapter->getSubtitle(); ?>
                    </h3>
                    <p class="post-content"><?=substr ($chapter->getContent(), 0, 50); ?>...</p>
                </a>
                <p class="post-meta">Ajouté le <?= $chapter->getCreationDate();  ?></p>
                <?php if($chapter->getUpdateDate() != NULL ) : ?>
                <p class="post-meta">Modifié le <?= $chapter->getUpdateDate();  ?></p>
                <?php endif; ?>
            </div>

            <hr>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<hr>


<?php
$content = ob_get_clean();
require('src/View/template.php');
?>

