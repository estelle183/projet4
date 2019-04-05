<?php
ob_start ();
?>

    <div class="container">
        <div class="row">

                <?php foreach ($chapters as $chapter) : ?>
            <div class="col-lg-4">
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
                        <?php if($chapter->getUpdateDate() != 0 ) : ?>
                            <p class="post-meta">Modifié le <?= $chapter->getUpdateDate();  ?></p>
                        <?php endif; ?>
                    </div>

                    <hr>
            </div>
                <?php endforeach; ?>

                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="chapitres">Tous les chapitres&rarr;</a>
                </div>

            </div>
        </div>


    <hr>


<?php
$content = ob_get_clean();
require('src/View/template.php');
?>