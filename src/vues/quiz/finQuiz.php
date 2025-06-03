<section class="container-lg mb-5 bg-white shadow" style="padding: 2% 2% 5% 2%">
    <h2 class="text-center mb-3">Quiz terminé !</h2>
    <h4 class="mb-5 text-center">Score final: <?= $score ?> / <?= $nbQuestions ?> </h4>

    <?php if ($score > 6): ?>
        <p class="text-center">Vu que vous avez eu une bonne note, on vous donne un easter egg : mettez une action
            inconnue dans l'URL ;)</p>
    <?php endif; ?>

    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0"
         aria-valuemax="100">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
    </div>
</section>
