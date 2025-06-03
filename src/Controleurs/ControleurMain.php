<?php

namespace NDI2023\Controleurs;

use JetBrains\PhpStorm\NoReturn;
use NDI2023\Lib\MessageFlash;

class ControleurMain
{
    public static function gererRecherche(): void
    {
        if ($_POST["recherche"] == "Pingouin") {
            self::afficherEasterEgg();
        } else {
            self::afficherAccueil();
        }
    }

    public static function afficherEasterEgg(): void
    {
        self::afficherVueDansCorps("Easter Egg", "vueEasterEgg.php");
    }

    protected static function afficherVueDansCorps(string $pageTitle, string $vuePath, array $parameters = []): void
    {
        $cssPath = str_replace('vue', 'style', $vuePath);
        $cssPath = str_replace('.php', '.css', $cssPath);
        self::afficherVue("vueGenerale.php", array_merge(
            [
                'pageTitle' => $pageTitle,
                'chemin' => $vuePath,
                'secondaryCSSchemin' => $cssPath
            ],
            $parameters
        ));
    }

    private static function afficherVue(string $vuePath, array $parameters = []): void
    {
        extract($parameters);
        $messagesFlash = MessageFlash::lireTousMessages();
        require __DIR__ . "/../vues/$vuePath"; // Charge la vue
    }

    public static function afficherAccueil(): void
    {
        self::afficherVueDansCorps("Accueil", "vueAccueil.php");
    }

    public static function afficherErreur(string $error): void
    {
        self::afficherVueDansCorps("Error", 'vueErreur.php', [
            'errorStr' => $error
        ]);

    }

    public static function afficherTetris()
    {
        self::afficherVue('/tetris/tetris.php');
    }

    /*
        public static function twitterTetris(): void
        {
            $score = 3;
            $tweetText = "Mon score est de $score à tetris ! #Tetris #Ranked";

            $encodedText = urlencode($tweetText);

            header("Location: https://twitter.com/intent/tweet?text=$encodedText");
        }
    */
    #[NoReturn] public static function redirectionVersURL(string $url): void
    {
        header("Location: $url");
        exit();
    }
}
