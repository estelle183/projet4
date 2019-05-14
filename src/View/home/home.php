<?php $title = "Billet simple pour l'Alaska"; ?>

<?php
ob_start ();
?>

<?php require ('src/View/header.php'); ?>

    <div class="container">
            <div class="col-lg-12">
                <p class="text-justify">Bonjour, <br/>Je suis Jean Forteroche, écrivain. Je me lance dans une nouvelle aventure en vous présentant mon nouveau roman "Billet simple pour l'Alaska" entièrement sur ce site internet. Un nouveau chapitre sera publié chaque semaine.</p>
            </div>
        </div>
<div class="container">
            <div class="row">

                <?php foreach ($chapters as $chapter) : ?>
            <div class="col-lg-4">
                    <div class="post-preview">
                        <a href="chapitre&id=<?= $chapter->getId(); ?>">
                            <h2 class="post-title">
                                <?= htmlspecialchars ($chapter->getTitle()); ?>
                            </h2>
                            <h3 class="post-subtitle">
                                <?= htmlspecialchars ($chapter->getSubtitle()); ?>
                            </h3>
                            <p class="post-content"><?=substr ($chapter->getContent(), 0, 50); ?>...</p>
                        </a>
                        <p class="post-meta">Ajouté le <?= $chapter->getCreationDate();  ?></p>
                        <?php if($chapter->getUpdateDate() != 0 ) : ?>
                            <p class="post-meta">Modifié le <?= $chapter->getUpdateDate();  ?></p>
                        <?php endif; ?>
                    </div>


            </div>

                <?php endforeach; ?>
                <hr>
        </div>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="chapitres">Tous les chapitres &rarr;</a>
                </div>

            </div>


<?php
$content = ob_get_clean();
require('src/View/template.php');
?>