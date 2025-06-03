<?php

namespace NDI2023\Lib;

use Exception;
use NDI2023\Configuration\WebsiteConfiguration;

class Session
{
    private static ?Session $instance = null;

    /**
     * @throws Exception
     */
    private function __construct()
    {
        if (session_start() === false) {
            throw new Exception("La session n'a pas réussi à démarrer.");
        }
    }

    public static function getInstance(): Session
    {
        if (is_null(Session::$instance))
            Session::$instance = new Session();
        self::verifierDerniereActivite();
        return Session::$instance;
    }

    public static function verifierDerniereActivite(): void
    {
        if (isset($_SESSION['derniereActivite'])) {
            if (isset($_SESSION["_utilisateurConnecte"])) {
                $time = time() - $_SESSION['derniereActivite'];
                if ($time > WebsiteConfiguration::sessionUpTime) {
                    session_unset();     // unset $_SESSION variable for the run-time
                    MessageFlash::ajouter("info", "Vous avez été déconnecté(e) : $time secondes");
                }
            }
        }
        $_SESSION['derniereActivite'] = time(); // update last activity time stamp
    }

    public function contient($name): bool
    {
        return isset($_SESSION[$name]);
    }

    public function enregistrer(string $name, mixed $value): void
    {
        $_SESSION[$name] = $value;
    }

    public function lire(string $name)
    {
        return $_SESSION[$name];
    }

    public function detruire(): void
    {
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
        Cookie::supprimer(session_name()); // deletes the session cookie
        self::$instance = null;
    }

    public function supprimer($name): void
    {
        unset($_SESSION[$name]);
    }
}
