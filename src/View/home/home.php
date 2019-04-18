<?php $title = "Billet simple pour l'Alaska"; ?>

    <header class="masthead" style="background-image: url('public/images/home.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        <h1>Man must explore, and this is exploration at its greatest</h1>
                        <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                        <span class="meta">Posted by
              <a href="#">Start Bootstrap</a>
              on August 24, 2019</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

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
        </div>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href="chapitres">Tous les chapitres &rarr;</a>
                </div>

            </div>



    <hr>


<?php
$content = ob_get_clean();
require('src/View/template.php');
?>