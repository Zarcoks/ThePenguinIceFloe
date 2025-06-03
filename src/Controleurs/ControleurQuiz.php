<?php

namespace NDI2023\Controleurs;

use NDI2023\Lib\MessageFlash;
use NDI2023\Lib\Session;
use NDI2023\Model\Repository\ChoixRepository;
use NDI2023\Model\Repository\QuestionRepository;

class ControleurQuiz extends ControleurMain
{
    //-------------AFFICHAGE
    public static function afficherQuizIndex(): void
    {
        self::afficherVueDansCorps("Quiz !", "quiz/quizIndex.php");
    }

    public static function premiereQuestion(): void
    {
        $questions = (new QuestionRepository())->getListeDataObjects();
        shuffle($questions);
        Session::getInstance()->enregistrer("questions", $questions);
        self::afficherQuestion();
    }

    //-------------FACTORY

    public static function afficherQuestion(): void
    {
        if (!isset($_POST['questionNumber']))
            MessageFlash::erreurFlashRetourArriere("Problème serveur (rafraîchir le site)", "danger");

        $questionId = $_POST['questionNumber'];

        $score = $_POST['score'];

        $listeQuestions = Session::getInstance()->lire("questions");

        $nbQuestions = count($listeQuestions);

        if ($questionId >= $nbQuestions) {
            $score = $_POST['score'];
            self::afficherVueDansCorps("Quiz terminé !", 'quiz/finQuiz.php', [
                'score' => $score,
                'nbQuestions' => $nbQuestions
            ]);
        } else {
            $question = $listeQuestions[$questionId];
            self::afficherVueDansCorps("Question", "quiz/question.php", [
                'question' => $question,
                'score' => $score,
                'numQuestion' => $questionId,
                'nbQuestions' => $nbQuestions
            ]);
        }
    }

    public static function validerQuestion(): void
    {
        if (!isset($_POST['questionNumber']))
            MessageFlash::erreurFlashRetourArriere("Problème serveur (rafraîchir le site)", "danger");

        $questionId = $_POST['questionNumber'];
        $score = $_POST['score'];
        $question = Session::getInstance()->lire("questions")[$questionId];

        if (!isset($_POST['choix'])) { //si pas de choix, on recommence le question actuelle
            //self::afficherWarning("Il faut.");
            MessageFlash::ajouter("warning", "Il faut faire un choix.");
            self::afficherQuestion();
        } else {
            $choixId = $_POST['choix'];
            //TODO: cook un total avec session
            //Session::getInstance()->

            $choix = (new ChoixRepository())->getObjetParClefPrimaire($choixId);
            $bonneRep = $choix->getEstBonneReponse();
            $couleurMessage = "red";

            if ($bonneRep) {
                $score++;
                $couleurMessage = "green";
            }

            self::afficherVueDansCorps("Réponse", "quiz/reponse.php", [
                'bonneRep' => $bonneRep,
                'question' => $question,
                'numQuestion' => $questionId,
                'score' => $score,
                'couleurMessage' => $couleurMessage
            ]);
        }
    }
}
