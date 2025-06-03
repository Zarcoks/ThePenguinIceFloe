<section class='container-lg bg-white shadow mb-5' style='padding: 2% 2% 3% 2%'>
    <h2 class="mb-3 text-center">Question <?= $numQuestion + 1 ?></h2>
    <h4 class="text-center mb-5">Score : <?= $_POST['score'] ?></h4>
    <div class="progress mb-5" role="progressbar" aria-label="Animated striped example" aria-valuenow="75"
         aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar progress-bar-striped progress-bar-animated"
             style="width: <?php
             $val = $numQuestion * (100 / $nbQuestions);
             echo $val ?>%"></div>
    </div>

    <h3><?= $question->getNomQuestion() ?></h3>
    <form method="post" action="?controleur=Quiz&action=validerQuestion">
        <div class="d-flex container justify-content-evenly mt-4">
            <div style="margin-right: 40px">
                <?php
                foreach ($question->getReponsesPossibles() as $rep) {
                    echo "
                <input type='radio' id='choix" . $rep->getIdChoix() . "' name='choix' value='" . $rep->getIdChoix() . "'>
                <label for='choix" . $rep->getIdChoix() . "'>" . $rep->getNomChoix() . "</label>
                <br>
            ";
                }
                ?>
            </div>

            <input type="submit" class="btn btn-outline-primary" value="Confirmer">

        </div>


        <input type="hidden" name="val" value="<?= $val ?>">
        <input type="hidden" name="questionNumber" value="<?= $numQuestion ?>">
        <input type="hidden" name="score" value="<?= $score ?>">

    </form>

</section>
