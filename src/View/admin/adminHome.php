<?php
ob_start();
?>

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>

        <div class="row" >
            <div class="col-lg-3 col-sm-6">
                <div class="circle-tile">
                    <a href="#">
                        <div class="circle-tile-heading dark-blue">
                            <i class="fa fa-book fa-fw fa-2x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content dark-blue">
                        <div class="circle-tile-description text-faded">
                            Chapitres
                        </div>
                        <div class="circle-tile-number text-faded">
                            <?= $nbChapters; ?>
                            <span id="sparklineA"></span>
                        </div>
                        <a href="admin-liste-chapitres" class="circle-tile-footer"><i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="circle-tile">
                    <a href="#">
                        <div class="circle-tile-heading orange">
                            <i class="fa fa-bell fa-fw fa-2x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content orange">
                        <div class="circle-tile-description text-faded">
                            Commentaires signalés
                        </div>
                        <div class="circle-tile-number text-faded">
                            <?= $nbReports; ?>
                        </div>
                        <a href="admin-signalement" class="circle-tile-footer"><i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="circle-tile">
                    <a href="#">
                        <div class="circle-tile-heading red">
                            <i class="fa fa-comment-slash fa-fw fa-2x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content red">
                        <div class="circle-tile-description text-faded">
                            Commentaires modérés
                        </div>
                        <div class="circle-tile-number text-faded">
                            <?= $nbModerate; ?>
                            <span id="sparklineC"></span>
                        </div>
                        <a href="admin-moderation" class="circle-tile-footer"><i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="circle-tile">
                    <a href="#">
                        <div class="circle-tile-heading blue">
                            <i class="fa fa-envelope fa-fw fa-2x"></i>
                        </div>
                    </a>
                    <div class="circle-tile-content blue">
                        <div class="circle-tile-description text-faded">
                            Messages
                        </div>
                        <div class="circle-tile-number text-faded">
                            <?= $nbProcessed; ?>
                            <span id="sparklineB"></span>
                        </div>
                        <a href="admin-gestion-contacts" class="circle-tile-footer"><i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="tile tile-img tile-time morning">
                    <p class="time-widget">
                        <span class="time-widget-heading">Nous sommes le </span>
                        <br>
                        <strong><span id="date"></span></strong><br/>
                        <strong><span id="time"></span></strong>
                    </p>
                </div>
            </div>


    </div>
</div>

    <script>
        function horloge()
        {
            Today = new Date();
            tab_jour = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
            tab_mois = new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
            var h=Today.getHours();
            if (h<10) {h = "0" + h}
            var m=Today.getMinutes();
            if (m<10) {m = "0" + m}
            var s=Today.getSeconds();
            if (s<10) {s = "0" + s}
            document.getElementById("date").innerHTML=tab_jour[Today.getDay()] + " " + Today.getDate() + " " + tab_mois[Today.getMonth()] + " " +  Today.getFullYear();
            document.getElementById("time").innerHTML= h + ":" + m + ":" + s;
        }

        setInterval("horloge()",1000);
    </script>
<?php
$content=ob_get_clean ();
require('src/View/template.php');
?>
