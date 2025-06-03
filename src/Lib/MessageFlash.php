<?php

namespace NDI2023\Lib;

use JetBrains\PhpStorm\NoReturn;
use NDI2023\Controleurs\ControleurMain;

class MessageFlash
{
    // Les messages sont enregistrés en session associée à la clé suivante
    private static string $cleFlash = "_messagesFlash";

    // $type parmi "success", "info", "warning" ou "danger"

    public static function lireTousMessages(): array
    {
        return array(
            "success" => self::lireMessages("success"),
            "info" => self::lireMessages("info"),
            "warning" => self::lireMessages("warning"),
            "danger" => self::lireMessages("danger")
        );
    }

    public static function lireMessages(string $type): array
    {
        if (self::contientMessage($type)) {
            $m = Session::getInstance()->lire($type . self::$cleFlash);
            Session::getInstance()->supprimer($type . self::$cleFlash);
            return array($m);
        }
        return array();
    }

    // Attention : la lecture doit détruire le message

    public static function contientMessage(string $type): bool
    {
        return Session::getInstance()->contient($type . self::$cleFlash);
    }

    #[NoReturn] public static function afficherWarning(string $message, $controleur = "", $action = ""): void
    {
        self::afficherMessage($message, "warning", $controleur, $action);
    }

    /**
     * @param string $message
     * @param string $type
     * @param string $controleur
     * @param string $action
     * @return void
     * Cette fonction affiche un message flash et redirige vers une page
     */
    #[NoReturn] public static function afficherMessage(string $message, string $type, string $controleur = "", string $action = ""): void
    {
        self::ajouter($type, $message);
        $url = "../web/controleurFrontal.php";
        if ($controleur != "" && $action != "") $url .= "?controleur=$controleur&action=$action";
        ControleurMain::redirectionVersURL($url);
    }

    public static function ajouter(string $type, string $message): void
    {
        Session::getInstance()->enregistrer($type . self::$cleFlash, $message);
    }

    #[NoReturn] public static function afficherSuccess(string $message, $controleur = "", $action = ""): void
    {
        self::afficherMessage($message, "success", $controleur, $action);
    }

    #[NoReturn] public static function afficherInfo(string $message, $controleur = "", $action = ""): void
    {
        self::afficherMessage($message, "info", $controleur, $action);
    }

    #[NoReturn] public static function erreurFlashRetourArriere(string $message, string $type): void
    {
        self::ajouter($type, $message);
        if (isset($_SERVER["HTTP_REFERER"])) {
            ControleurMain::redirectionVersURL($_SERVER["HTTP_REFERER"]);
        } else {
            self::afficherDanger("Action non autorisée", "Main", "afficherAccueil");
        }
    }

    #[NoReturn] public static function afficherDanger(string $message, $controleur = "", $action = ""): void
    {
        self::afficherMessage($message, "danger", $controleur, $action);
    }
}
