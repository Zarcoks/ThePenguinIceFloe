<?php

namespace NDI2023\Model\DataObject;

class BonnesPratiques extends AbstractDataObject
{
    private string $titre;
    private string $description;
    private string $image; //A changer

    /**
     * @param string $titre
     * @param string $description
     * @param string $image
     */
    public function __construct(string $titre, string $description, string $image)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->image = $image;
    }

    public function __toString()
    {
        return $this->getTitre() . " : " . $this . $this->getDescription();
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function formatTableau(): array
    {
        return array("titre" => $this->getTitre(),
            "description" => $this->getDescription(),
            "image" => $this->getImage());
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}