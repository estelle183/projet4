<?php
ob_start ();

?>

    <div class="container">

        <div class="row section-heading shadow p-3 mb-5 bg-white rounded">
            <img src="public/images/heading.jpg" class="heading-logo" width="100px">
            <h2 class="heading-title"><?= $result->getTitle (); ?></h2>

        </div>

        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-12">
                <div class="post-preview">

                <h3 class="post-subtitle"><?= $result->getSubtitle (); ?></h3>

                <hr>

                <!-- Date/Time -->
                <p class="post-meta">Ajouté le <?= $result->getCreationDate (); ?></p>
                <?php if ($result->getUpdateDate () != NULL) : ?>
                    <p class="post-meta">Modifié le <?= $result->getUpdateDate (); ?></p>
                <?php endif; ?>
                <hr>


                <!-- Post Content -->
                <p class="lead"><?= $result->getContent (); ?></p>

                <hr>

                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Laissez un commentaire:</h5>
                    <div class="card-body">
                        <form action="addComment&id=<?= $result->getId () ?>" method="post">
                            <div class="form-group">
                                <label for="pseudo">Pseudo</label> :
                                <input type="text" name="pseudo" id="pseudo" class="form-control" required/><br/>
                                <label for="message">Message</label> :
                                <textarea name="message" id="message" class="form-control" required></textarea><br/>
                            </div>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
                </div>

                <!-- Single Comment -->

                <h2 class="page-comment-header">Commentaires</h2>
                <?php foreach ($result->getComments () as $co) : ?><br/>
                    <section class="comment-list">
                    <!-- First Comment -->
                    <article class="row">

                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default left">
                                <div class="panel-body">
                                    <header class="comment-header">
                                        <div class="comment-user"><i class="fa fa-user"></i><?php if ($co->getModerate () == 1) : ?>
                                                Utilisateur supprimé
    <?php else : ?><?= $co->getAuthor (); ?>

                                            <?php endif; ?>
                                        </div>
                                        <time class="comment-date"><i
                                                    class="far fa-clock"></i> <?= $co->getCommentDate (); ?></time>
                                    </header>
                                    <div class="comment-post">
                                        <?php if ($co->getModerate () == 1) : ?>
                                            <p class="comment-moderate">Ce commentaire est modéré par l'administrateur</p>
                                        <?php else : ?>
                                            <p><?= $co->getComment (); ?></p>
                                        <?php endif; ?>

                                    </div>

                                    <p class="comment-moderate"><?php if ($co->getReported () == 0 && $co->getModerate () != 1) : ?>
                                            <button class="btn-outline-danger btn-sm" href="reportedComment&id_chapter=<?= $result->getId (); ?>&id=<?= $co->getId (); ?>"
                                               onclick="return confirm('Etes-vous sûr de vouloir signaler ce commentaire ?')">
                                                Signaler</button>
                                        <?php endif; ?></p>
                                </div>
                            </div>
                        </div>

                    </article>
                    </section><?php endforeach; ?>
                <div class="alert-success" id="ancre"><?php if (isset($_SESSION['flash'])) {
                    echo $_SESSION['flash'];
                    unset($_SESSION['flash']);
                    } ?></div>


            </div>


        </div>
    </div>

    <!-- /.container -->

<?php
$content = ob_get_clean ();
require ('src/View/template.php');
?>