<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #00657b;" id="mainNav">
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
                    <a class="nav-link" href="admin-accueil">Accueil Administrateur</a>
                </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestion des chapitres<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="admin-liste-chapitres" title="Lien 2.1">Liste des chapitres</a></li>
                            <li><a href="admin-nouveau-chapitre" title="Lien 2.2">Nouveau chapitre</a></li>
                        </ul>
                    </li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-signalement">Commentaires signalés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-moderation">Commentaires modérés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-gestion-contacts">Gestion des contacts</a>
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
</nav>

