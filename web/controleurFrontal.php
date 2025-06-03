<?php

require_once __DIR__ . '/../src/Lib/Psr4AutoloaderClass.php';

// initialisation
$loader = new NDI2023\Lib\Psr4AutoloaderClass();
$loader->register();
// enregistrement d'une association "namespace" → "dossier"
$loader->addNamespace('NDI2023', __DIR__ . '/../src');

use NDI2023\Controleurs\ControleurMain;

if (isset($_GET['controleur'])) {
    $controleur = ucfirst($_GET["controleur"]);
} else {
    $controleur = "Main";
}

if (isset($_GET['action'])) {
    $action = lcfirst($_GET["action"]);
} else {
    $action = "afficherAccueil";
}

$nomClassecontroleur = "NDI2023\Controleurs\Controleur$controleur";

if (class_exists($nomClassecontroleur)) {
    if (in_array($action, get_class_methods($nomClassecontroleur))) {
        $nomClassecontroleur::$action();
    } else
        ControleurMain::afficherTetris();
} else
    ControleurMain::afficherTetris();
