<?php

namespace NDI2023\Controleurs;

class ControleurDebunk extends ControleurMain
{
    public static function afficherVueDebunk()
    {
        self::afficherVueDansCorps("Debunk", 'debunk/vueDebunk.php');
    }
}