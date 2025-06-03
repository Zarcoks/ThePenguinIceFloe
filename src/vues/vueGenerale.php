<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Penguin Ice Floe - <?= $pageTitle ?></title>
    <link rel="icon" type="image/png" href="../assets/images/site_logo2.png"/>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body id="Argument" style="min-height: 100vh; display: flex; flex-direction: column;">
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
    <div class="container-fluid">
        <div>
            <a class="navbar-brand" href="?">
                The Penguin Ice Floe
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Bonnes Pratiques
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"
                               href="?controleur=BonnesPratiques&action=afficherPratique&titre=Consommer local">Consommer
                                Local</a></li>
                        <li><a class="dropdown-item"
                               href="?controleur=BonnesPratiques&action=afficherPratique&titre=Ne pas gaspiller">Ne pas
                                Gaspiller</a></li>
                        <li><a class="dropdown-item"
                               href="?controleur=BonnesPratiques&action=afficherPratique&titre=Privilégier les transports en commun, la trottinette, le vélo ou la marche à pied">Transport
                                écologique</a></li>
                        <li><a class="dropdown-item"
                               href="?controleur=BonnesPratiques&action=afficherPratique&titre=Propagander les bonnes pratiques">Partager
                                les bonnes pratiques</a></li>
                        <li><a class="dropdown-item"
                               href="?controleur=BonnesPratiques&action=afficherPratique&titre=Recycler les déchets">Recycler
                                les déchets</a></li>
                        <li><a class="dropdown-item"
                               href="?controleur=BonnesPratiques&action=afficherPratique&titre=Éviter de prendre l’avion">Eviter
                                de prendre l'avion</a></li>
                        <li><a class="dropdown-item"
                               href="?controleur=BonnesPratiques&action=afficherPratique&titre=Éviter de surconsommer">Eviter
                                de Surconsommer</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controleur=Debunk&action=afficherVueDebunk">Debunking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controleur=Quiz&action=afficherQuizIndex">Quiz</a>
                </li>
            </ul>
            <form method="post" action='?controleur=Main&action=gererRecherche' class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search"
                       name="recherche">
                <button class="btn btn-outline-success" type="submit">OK</button>
            </form>
        </div>
    </div>
</nav>

<main>

    <?php
    /** @var string[][] $messagesFlash */
    foreach ($messagesFlash as $type => $messagesFlashPourUnType) {
        // $type est l'une des valeurs suivantes : "success", "info", "warning", "danger"
        // $messagesFlashPourUnType est la liste des messages flash d'un type
        foreach ($messagesFlashPourUnType as $messageFlash) {
            echo <<< HTML
            <div class="alert alert-$type mt-3 container-md">
               $messageFlash
            </div>
            HTML;
        }
    }
    ?>

    <div id="video-container-glace">
        <video autoplay loop muted id="video-glace" style="min-height: 100vh">
            <source src="../assets/videos/banquise.mp4" type="video/mp4">
            Votre navigateur ne prend pas en charge la balise vidéo.
        </video>
    </div>

    <?php require __DIR__ . "/$chemin"; ?>
</main>

<footer class="bg-dark p-5 footer mt-auto text-light d-flex justify-content-between container-fluid align-items-center mt-auto">
    <img class="d-none d-md-block" src="../assets/images/logo.png" alt="pingouin" width="250px" height="300px"
         style="margin-right: 30px">
    <article class="text-start text-secondary container-lg">
        <h2 class="text-center text-light">À propos</h2>
        <p>Le pingouin est un animal qui vit dans les régions arctiques. Il est très mignon et il est en voie de
            disparition à cause du réchauffement climatique.</p>
        <p class="text-start">
            Le but de ce site web est de vous éduquer sur le climat et les menaces qu'il rencontre tous les jours, mais
            aussi les bon gestes à avoir afin de limiter ces menaces.
        </p>
        <p>
            Fait pour la Nuit de l'info 2023 par les Pingouins <a
                    style="text-decoration: none; color: inherit; cursor: text" href="../assets/images/charlie.png">(All
                rights reserved)</a>
        </p>
        <p class="fst-italic">
            Fait par : Enzo Guilhot, Mattéo Tordeux, Raphaël Izoret, Rayane Smaïli, Victor Jost, Ilias Ouchman, Noé Fuertes-Torredemé
        </p>
    </article>
</footer>

<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/popups.js"></script>

</body>
</html>
