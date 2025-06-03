<?php

namespace NDI2023\Model\DataObject;

class Choix extends AbstractDataObject
{
    private int $idChoix;
    private int $idQuestion;
    private string $nomChoix;
    private bool $estBonneReponse;

    public function __construct(int $idChoix, int $idQuestion, string $nomChoix, bool $estBonneReponse)
    {
        $this->idChoix = $idChoix;
        $this->idQuestion = $idQuestion;
        $this->nomChoix = $nomChoix;
        $this->estBonneReponse = $estBonneReponse;
    }

    public function formatTableau(): array
    {
        return array(
            "idChoixTag" => $this->idChoix,
            "questionIdTag" => $this->idQuestion,
            "nomChoixTag" => $this->nomChoix,
            "estBonneReponseTag" => $this->estBonneReponse
        );
    }

    public function getIdChoix(): int
    {
        return $this->idChoix;
    }

    public function setIdChoix(int $idChoix): void
    {
        $this->idChoix = $idChoix;
    }

    public function getIdQuestion(): int
    {
        return $this->idQuestion;
    }

    public function setIdQuestion(int $idQuestion): void
    {
        $this->idQuestion = $idQuestion;
    }

    public function getNomChoix(): string
    {
        return $this->nomChoix;
    }

    public function setNomChoix(string $nomChoix): void
    {
        $this->nomChoix = $nomChoix;
    }

    public function getEstBonneReponse(): bool
    {
        return $this->estBonneReponse;
    }

    public function setEstBonneReponse(bool $estBonneReponse): void
    {
        $this->estBonneReponse = $estBonneReponse;
    }


    public function __toString()
    {
        return $this->nomChoix;
    }
}