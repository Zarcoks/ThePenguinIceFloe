<section class="container-lg d-flex flex-column align-items-center bg-white shadow"
         style="padding: 2% 2% 2% 2%; margin-bottom: 50px">
    <h2 class="text-center mb-5 ">Bienvenue sur le Quiz !</h2>

    <p>Ce quiz a pour but de tester vos connaissances sur le réchauffement climatique.</p>
    <p>Vous aurez plusieurs questions avec plusieurs choix.</p>
    <p>Seule une réponse est correcte pour chaque question.</p>
    <p class="mt-4">Bonne chance !</p>
    <p class="fst-italic">ps : une surprise à la fin pour les meilleurs...</p>


    <form class="mt-5" method="post" action="?controleur=Quiz&action=premiereQuestion">
        <input type="hidden" name="questionNumber" value="0">
        <input type="hidden" name="score" value="0">
        <input type="submit" class="btn btn-outline-primary" value="Démarrer le quiz">
    </form>

</section>
