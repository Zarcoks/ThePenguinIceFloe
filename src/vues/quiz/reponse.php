<section class="container-lg mb-5 bg-white shadow" style="padding: 2% 2% 5% 2%">
    <h2 class="mb-5 text-center">Question <?= $numQuestion + 1 ?></h2>

    <div class="progress mb-5" role="progressbar" aria-label="Animated striped example" aria-valuenow="75"
         aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?= $_POST['val'] ?>%"></div>
    </div>


    <h3 style="color: <?= $couleurMessage ?>">Réponse <?= $bonneRep ? "correcte !" : "fausse..." ?></h3>

    <p>Explication : <?= $question->getExplicationQuestion() ?></p>

    <form method="post" action="?controleur=Quiz&action=afficherQuestion">
        <input type="hidden" name="questionNumber" value="<?= $numQuestion + 1 ?>">
        <input type="hidden" name="score" value="<?= $score ?>">

        <input type="submit" class="btn btn-outline-primary mb-5" value="Question Suivante">
    </form>

    <p>Source : <a href="<?= $question->getSourceQuestion() ?>" target="_blank"
                   rel="noopener noreferrer"><?= $question->getSourceQuestion() ?></a></p>
</section>