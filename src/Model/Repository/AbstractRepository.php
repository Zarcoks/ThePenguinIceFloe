<?php

namespace NDI2023\Model\Repository;

use NDI2023\Configuration\ConnexionBaseDeDonnee;
use NDI2023\Model\DataObject\AbstractDataObject;

abstract class AbstractRepository
{
    public function getListeDataObjects(): ?array
    {
        $sql = 'SELECT * FROM ' . $this->getNomTable();
        $pdo = ConnexionBaseDeDonnee::getPdo()->query($sql);
        return $this->dataObjectsDepuisPdoStatement($pdo);
    }

    protected abstract function getNomTable(): string;

    protected function dataObjectsDepuisPdoStatement(\PDOStatement $pdoStatement): array
    {
        $listObject = array();
        foreach ($pdoStatement as $item) {
            $listObject[] = $this->construireDepuisTableau($item);
        }
        return $listObject;
    }

    protected abstract function construireDepuisTableau(array $objetFormatTableau): AbstractDataObject;

    public function getListeIds(): array
    {
        $sql = 'SELECT * FROM ' . $this->getNomTable();
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->query($sql);
        $listObject = array();
        foreach ($pdoStatement as $item)
            $listObject[] = $item[$this->getNomClefPrimaire()];
        return $listObject;
    }

    protected abstract function getNomClefPrimaire(): string;

    public function getObjetParClefPrimaire($primKeyValue): ?AbstractDataObject
    {
        $sql = "SELECT * FROM " . $this->getNomTable() . " WHERE " . $this->getNomClefPrimaire() . "=:Tag ";
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $values = array("Tag" => $primKeyValue);
        $pdoStatement->execute($values);
        $object = $pdoStatement->fetch();
        if (!$object)
            return null;
        return $this->construireDepuisTableau($object);
    }

    public function creerObjet(AbstractDataObject $object): void
    {
        $fields = "";
        $values = "";
        $tags = array();
        foreach ($this->getNomsColonnes() as $nomColonne) {
            if ($nomColonne != $this->getNomsColonnes()[0]) {
                $fields .= ", ";
                $values .= ", ";
            }
            $fields .= $nomColonne;
            $values .= ":" . $nomColonne . "Tag";
            $tags[$nomColonne . "Tag"] = $object->formatTableau()[$nomColonne];
        }
        $sql = "INSERT INTO " . $this->getNomTable() . " ($fields) VALUES ($values);";

        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $pdoStatement->execute($tags);
    }

    // ----- CRUD -----

    protected abstract function getNomsColonnes(): array;

    public function creerObjetSiAutoIncrement(AbstractDataObject $object): void
    {
        $clePrim = $this->getNomClefPrimaire();
        $fields = "";
        $values = "";
        $tags = array();
        foreach ($this->getNomsColonnes() as $nomColonne) {
            if ($nomColonne != $clePrim) {
                $fields .= "$nomColonne, ";
                $values .= ":" . $nomColonne . "Tag, ";
                $tags[$nomColonne . "Tag"] = $object->formatTableau()[$nomColonne];
            }
        }
        $fields = substr($fields, 0, -2);
        $values = substr($values, 0, -2);
        $sql = "INSERT INTO " . $this->getNomTable() . " ($fields) VALUES ($values);";

        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $pdoStatement->execute($tags);
    }

    /*
        public function majObjet(AbstractDataObject $object): void
        {
            $sql = "UPDATE " . $this->getNomTable() . " SET ";
            $tags = array();
            foreach ($this->getNomsColonnes() as $nomColonne) {
                if ($nomColonne != $this->getNomsColonnes()[0])
                    $sql .= ", ";
                $sql .= "$nomColonne = :$nomColonne" . "Tag";
                $tags[$nomColonne . "Tag"] = $object->formatTableau()[$nomColonne];
            }
            $clePrim = $this->getNomClefPrimaire();
            $sql .= " WHERE $clePrim = :$clePrim" . "Tag;";

            if (!isset($tags["{$clePrim}Tag"]))
                $tags["{$clePrim}Tag"] = $object->getPrimKeyValue();
            $pdoStatement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
            $pdoStatement->execute($tags);
        }
    */
    public function supprimerObjet($primKeyValue): void
    {
        $sql = "DELETE FROM " . $this->getNomTable() . " WHERE " . $this->getNomClefPrimaire() . "=:Tag ";
        $pdoStatement = ConnexionBaseDeDonnee::getPdo()->prepare($sql);
        $values = array("Tag" => $primKeyValue);
        $pdoStatement->execute($values);
    }

}