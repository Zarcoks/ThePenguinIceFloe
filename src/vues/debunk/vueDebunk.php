<section class="container-sm d-flex mb-5 flex-column align-items-center bg-white shadow" style="padding: 2% 2% 2% 2%">
    <h1 class="fw-bold text-center mb-5" style="width: 60%;">Mettons fin aux idées reçues sur le réchauffement
        climatique !</h1>

    <h4 class="container-sm mb-5 fst-italic">Nous avons tous des opinions et des préjugés sur le réchauffement
        climatique, mais saviez-vous que beaucoup
        de choses que l'on peut entendre dans les médias et qu'on a pour nombre d'entre nous pris pour acquises
        ne sont que des fausses croyances ?</h4>

    <h3 class="container-md">Voyons ensembles quelques idées reçues sur le dérèglement climatique parmi les plus
        communes :</h3>
    <div>
        <h2>Numéro 1</h2>
        <button class="open" onclick="openPopup('popup1')"> Le réchauffement climatique est tout à fait normal</button>
        <div id="popup1" class="overlay">
            <div class="popup">
                <img src="../assets/images/evolution-climat.png" alt="Graphique d'évolution du climat">
                <p>Beaucoup de gens croient que le réchauffement climatique est un phénomène naturel et donc qu'il n'y a
                    pas
                    lieu de s'inquiéter. Mais jettons un oeil à ce graphique, nous voyons bien qu'il existe des cycles
                    naturels
                    alternants entre période de réchauffement et de refroidissement indiqués par le taux de dioxyde de
                    carbone et de méthane
                    dans l'air. Or, on remarque bien que parmi toutes ces périodes, aucune n'atteint une telle
                    augmentation de ces particules que
                    le réchauffement actuel. Donc, bien que ce cycle de réchauffement soit normal, une augmentation
                    aussi rapide est fort alarmante.</p>
                <h6 class="fst-italic">Source: Maxicours</h6>
                <button class="close" onclick="closePopup('popup1')">Fermer</button>
            </div>
        </div>

        <h2>Numéro 2</h2>
        <button class="open" onclick="openPopup('popup2')"> Les voitures électriques sont la solution miracle</button>
        <div id="popup2" class="overlay">
            <div class="popup">
                <div style="display:flex; flex-direction: row; justify-content: center">
                    <div style="display: flex; flex-direction: column">
                        <img src="../assets/images/electric-car.png" alt="Voiture électrique">
                        <h6>Source: Pixabay</h6>
                    </div>
                    <div style="display:flex; flex-direction: column">
                        <img src="../assets/images/bilan-carbone.png"
                             alt="Bilan carbone de la fabrication d'une voiture électrique">
                        <h6>Source: Le Parisien</h6>
                    </div>
                </div>
                <p>Plus le temps passe, plus les gens préfèrent acheter des voitures électriques (22% des ventes en
                    France en 2022) plutôt que des voitures thermiques,
                    utilisant l'argument de ne rejeter aucun CO2 en roulant. Sur ce point là, l'électrique marque un
                    point, mais
                    ces voitures sont-elles vraiment la solution à la pollution automobile ? </p>
                <p>Fabriquer une voiture électrique émet 1,75x plus de CO2 que fabriquer une voiture thermique (essence
                    ou diesel), et on ne compte même pas
                    le CO2 rejeté pour recharger la batterie au cours de la vie de la voiture.</p>
                <button class="close" onclick="closePopup('popup2')">Fermer</button>
            </div>
        </div>

        <h2>Numéro 3</h2>
        <button class="open" onclick="openPopup('popup3')"> Le nucléaire contribue au réchauffement climatique</button>
        <div id="popup3" class="overlay">
            <div class="popup">
                <img src="../assets/images/centrale.jpg" alt="Centrale nucléaire">
                <h6>Source: Pixabay</h6>
                <p>Une idée largement répandue consiste en le fait que le nucléaire contribuerait au réchauffement
                    climatique au
                    même titre que les hydrocarbures (gaz, pétrole et charbon). C'est faux, les centrales nucléaires
                    rejettent seulement de la vapeur d'eau,
                    et non du dioxyde de carbone et du méthane, elles ne contribuent donc pas au réchauffement
                    climatique. En revanche, les centrales nucléaires
                    sont quand même polluantes au niveau des déchets matériels radioactifs qu'elles rejettent, mais cela
                    est un autre problème.</p>
                <img src="../assets/images/dechets.jpg" alt="Déchets nucléaires">
                <h6>Source: Pixabay</h6>
                <button class="close" onclick="closePopup('popup3')">Fermer</button>
            </div>
        </div>

        <h2>Numéro 4</h2>
        <button class="open" onclick="openPopup('popup4')"> On ne peut rien faire à notre échelle</button>
        <div id="popup4" class="overlay">
            <div class="popup">
                <img src="../assets/images/recyclage.jpg" alt="Recyclage">
                <h6>Source: Pixabay</h6>
                <p>Beaucoup d'entre nous se découragent d'agir contre le réchauffement climatique, pensant que seuls les
                    détenteurs du pouvoir peuvent agir.
                    Mais c'est à cause de cette mentalité que l'on a du mal à avancer, si chacun ne ferait ne serait-ce
                    que quelques petits gestes au quotidien,
                    on avancerait considérablement. Pour un individu, cela paraît ridicule, mais n'oublions pas que nous
                    sommes 8 milliards sur Terre.</p>
                <button class="close" onclick="closePopup('popup4')">Fermer</button>
            </div>
        </div>

        <h2>Numéro 5</h2>
        <button class="open" onclick="openPopup('popup5')"> Il faut tout remplacer par des énergies renouvelables
        </button>
        <div id="popup5" class="overlay">
            <div class="popup">
                <img src="../assets/images/manifestation.jpg" alt="Manifestation contre les énergies fossiles">
                <h6>Source: Reuters</h6>
                <p>Manifestations en Allemagne pour protester contre les centrales au charbon</p>
                <p>Les énergies renouvelables sont une alternative intéressante aux énergies fossiles, polluantes et
                    limitées.
                    Il est tout à fait envisageable de remplacer une grande partie des centrales aux hydrocarbures par
                    des centrales hydrauliques ou des éoliennes,
                    mais l'inconvénient de celles-ci est qu'elles dépendent des aléas de la nature, c'est pourquoi il
                    est indispensable d'avoir des énergies fossiles au
                    cas où on ne peut pas utiliser d'énergies renouvelables. Il n'est donc pas concevable de supprimer
                    totalement les centrales fossiles.</p>
                <button class="close" onclick="closePopup('popup5')">Fermer</button>
            </div>
        </div>
    </div>
</section>