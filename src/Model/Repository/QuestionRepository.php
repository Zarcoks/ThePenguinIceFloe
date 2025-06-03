<?php

namespace NDI2023\Model\Repository;

use NDI2023\Model\DataObject\Question;

class QuestionRepository extends AbstractRepository
{
    protected function getNomClefPrimaire(): string
    {
        return "idQuestion";
    }

    protected function getNomTable(): string
    {
        return "Questions";
    }

    protected function getNomsColonnes(): array
    {
        return array(
            "idQuestion",
            "nomQuestion",
            "explicationQuestion",
            "sourceQuestion"
        );
    }

    protected function construireDepuisTableau(array $objetFormatTableau): Question
    {
        return new Question(
            $objetFormatTableau["idQuestion"],
            $objetFormatTableau["nomQuestion"],
            $objetFormatTableau["explicationQuestion"],
            $objetFormatTableau["sourceQuestion"]
        );
    }
}