<?php

namespace NDI2023\Model\Repository;

use NDI2023\Configuration\ConnexionBaseDeDonnee;
use NDI2023\Model\DataObject\AbstractDataObject;
use NDI2023\Model\DataObject\BonnesPratiques;

class BonnesPratiquesRepository extends AbstractRepository
{

    public function recupererListe(): array
    {
        $sql = "Select titre FROM BonnesPratiques";
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->query($sql);
        $pratiques = [];
        foreach ($pdoStatement as $pratiqueFormatTableau) {
            $pratiques[] = $pratiqueFormatTableau["titre"];
        }
        return $pratiques;
    }

    protected function getNomClefPrimaire(): string
    {
        return "titre";
    }

    protected function getNomTable(): string
    {
        return "BonnesPratiques";
    }

    protected function getNomsColonnes(): array
    {
        return array("titre",
            "description",
            "image");
    }

    protected function construireDepuisTableau(array $objetFormatTableau): AbstractDataObject
    {
        return new BonnesPratiques($objetFormatTableau["titre"], $objetFormatTableau["description"], $objetFormatTableau["image"]);
    }
}

?>