<?php

namespace NDI2023\Controleurs;

use NDI2023\Model\Repository\BonnesPratiquesRepository;

class ControleurBonnesPratiques extends ControleurMain
{
    public static function afficherPratique()
    {
        $pratique = (new BonnesPratiquesRepository())->getObjetParClefPrimaire($_GET['titre']);
        self::afficherVueDansCorps($pratique->getTitre(), "pratiques/vueAfficherPratique.php", ["pratique" => $pratique]);
    }

}