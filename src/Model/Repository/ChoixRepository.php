<?php

namespace NDI2023\Model\Repository;

use NDI2023\Configuration\ConnexionBaseDeDonnee;
use NDI2023\Model\DataObject\Choix;

class ChoixRepository extends AbstractRepository
{
    /** @return array de dataobject Choix */
    public function getChoix(int $q): array
    {
        $sql = "SELECT * FROM Choix WHERE idQuestion = $q";
        $res = ConnexionBaseDeDonnee::getPdo()->query($sql);
        $reponses = [];
        foreach ($res as $row)
            $reponses[] = $this->construireDepuisTableau($row);
        return $reponses;
    }

    protected function construireDepuisTableau(array $objetFormatTableau): Choix
    {
        return new Choix(
            $objetFormatTableau["idChoix"],
            $objetFormatTableau["idQuestion"],
            $objetFormatTableau["nomChoix"],
            $objetFormatTableau["estBonneReponse"],
        );
    }

    protected function getNomClePrimaire(): string
    {
        return "idChoix";
    }

    protected function getNomTable(): string
    {
        return "Choix";
    }

    protected function getNomsColonnes(): array
    {
        return array(
            "idChoix",
            "idQuestion",
            "nomChoix",
            "estBonneReponse",
        );
    }

    protected function getNomClefPrimaire(): string
    {
        return "idChoix";
    }
}