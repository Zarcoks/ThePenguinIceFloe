<?php

namespace NDI2023\Model\DataObject;

use NDI2023\Model\Repository\ChoixRepository;

class Question extends AbstractDataObject
{
    private int $idQuestion;
    private string $nomQuestion;
    private string $explicationQuestion;
    private string $sourceQuestion;

    public function __construct(int $idQuestion, string $nomQuestion, string $explicationQuestion, string $sourceQuestion)
    {
        $this->idQuestion = $idQuestion;
        $this->nomQuestion = $nomQuestion;
        $this->explicationQuestion = $explicationQuestion;
        $this->sourceQuestion = $sourceQuestion;
    }

    /** @return array de dataobject Choix */
    public function getReponsesPossibles(): array
    {
        return (new ChoixRepository())->getChoix($this->idQuestion);
    }

    public function formatTableau(): array
    {
        return array(
            "idQuestionTag" => $this->idQuestion,
            "nomQuestionTag" => $this->nomQuestion,
            "explicationQuestionTag" => $this->explicationQuestion
        );
    }

    public function getIdQuestion(): int
    {
        return $this->idQuestion;
    }

    public function setIdQuestion(int $idQuestion): void
    {
        $this->idQuestion = $idQuestion;
    }

    public function getNomQuestion(): string
    {
        return $this->nomQuestion;
    }

    public function setNomQuestion(string $nomQuestion): void
    {
        $this->nomQuestion = $nomQuestion;
    }

    public function getSourceQuestion(): string
    {
        return $this->sourceQuestion;
    }

    public function setSourceQuestion(string $sourceQuestion): void
    {
        $this->sourceQuestion = $sourceQuestion;
    }

    public function getExplicationQuestion(): string
    {
        return $this->explicationQuestion;
    }

    public function setExplicationQuestion(string $explicationQuestion): void
    {
        $this->explicationQuestion = $explicationQuestion;
    }


    public function __toString()
    {
        return "tostring question";
    }
}