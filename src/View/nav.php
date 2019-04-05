<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #222629;" id="mainNav">
    <div class="container">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chapitres">Chapitres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact">Contact</a>
                </li>

                <?php if(isset($_SESSION['pseudo'])) : ?>

                <li class="nav-item">
                    <a class="nav-link" href="admin-liste-chapitres">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-nouveau-chapitre">Ajouter un chapitre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-signalement">Commentaires signalés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-moderation">Commentaires modérés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-deconnexion">Déconnexion</a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="admin-connexion">Connexion</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>