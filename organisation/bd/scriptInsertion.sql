CREATE
OR
REPLACE TABLE Questions (
    idQuestion INT PRIMARY KEY,
    nomQuestion VARCHAR(255) NOT NULL,
    explicationQuestion TEXT,
    sourceQuestion TEXT
);

CREATE
OR
REPLACE TABLE Choix (
    idChoix INT PRIMARY KEY,
    idQuestion INT,
    nomChoix VARCHAR(255) NOT NULL,
    estBonneReponse BOOLEAN NOT NULL,
    FOREIGN KEY (idQuestion) REFERENCES Questions(idQuestion)
ON
DELETE CASCADE
    );

-- Questions
INSERT INTO Questions (idQuestion, nomQuestion, explicationQuestion, sourceQuestion)
VALUES (1, 'Qu''est-ce que le changement climatique ?',
        'Le changement climatique est un réchauffement de la planète dû principalement aux activités humaines, notamment par le biais des émissions de gaz à effet de serre.',
        'https://www.ipcc.ch/report/ar6/syr/downloads/report/IPCC_AR6_SYR_SPM.pdf'),
       (2, 'Quelle est la principale cause du réchauffement climatique ?',
        'Les activités humaines, notamment les émissions de gaz à effet de serre, sont la principale cause du réchauffement climatique.',
        'https://www.un.org/fr/climatechange/science/causes-effects-climate-change'),
       (3, 'Quelle affirmation est fausse concernant les solutions au changement climatique ?',
        'Toutes ces affirmations sont fausses. Les énergies renouvelables sont efficaces, la technologie seule ne peut pas résoudre le problème, et l''action individuelle est nécessaire.',
        'https://www.ipcc.ch/report/ar6/syr/downloads/report/IPCC_AR6_SYR_SPM.pdf'),
       (4, 'Qu''est-ce que l''écologie ?',
        'L''écologie comprend l''étude des organismes dans leur environnement et la promotion de la conservation de la nature.',
        'https://www.nationalgeographic.fr/environnement/les-solutions-pour-lutter-contre-le-changement-climatique-existent-deja'),
       (5, 'Quel est le rôle des écologistes ?',
        'Les écologistes étudient le comportement des organismes vivants et promeuvent des attitudes pro-écologiques.',
        'https://www.products.pcc.eu/fr/blog/quest-ce-que-lecologie-tout-ce-que-tu-as-besoin-de-savoir/'),
       (6, 'Quelle est la principale solution pour lutter contre le changement climatique ?',
        'La principale solution pour lutter contre le changement climatique est de réduire les émissions de gaz à effet de serre.',
        'https://www.ipcc.ch/report/ar6/syr/downloads/report/IPCC_AR6_SYR_SPM.pdf'),
       (7, 'Quelle est la principale menace pour la biodiversité ?',
        'Le changement climatique et la surpopulation sont deux des principales menaces pour la biodiversité.',
        'https://www.ecologie.gouv.fr/sites/default/files/ONERC_Panneaux_expo_CCC_MAJ-2019_800x1100_DEFweb.pdf'),
       (8, 'La croissance économique est-elle compatible avec la protection de l''environnement ?',
        'La compatibilité entre la croissance économique et la protection de l''environnement dépend de la manière dont la croissance économique est gérée.',
        'https://www.millenaire3.com/content/download/587/5533'),
       (9, 'Quelle est la principale source d''émissions de gaz à effet de serre ?',
        'Les transports, l''agriculture et l''industrie sont toutes des sources majeures d''émissions de gaz à effet de serre.',
        'https://blog.helios.do/activites-humaines-responsables-rechauffement-climatique/'),
       (10, 'Quelle est la principale conséquence du changement climatique ?',
        'L''augmentation des températures mondiales et la montée du niveau de la mer sont deux des principales conséquences du changement climatique.',
        'https://www.ipcc.ch/report/ar6/syr/downloads/report/IPCC_AR6_SYR_SPM.pdf');

-- Choix
INSERT INTO Choix (idChoix, idQuestion, nomChoix, estBonneReponse)
VALUES
    -- Question 1
    (1, 1, 'Un phénomène naturel sans conséquences', FALSE),
    (2, 1, 'Un réchauffement de la planète dû principalement aux activités humaines', TRUE),
    (3, 1, 'Une théorie non prouvée', FALSE),
    (4, 1, 'Un refroidissement de la planète', FALSE),

    -- Question 2
    (5, 2, 'L''activité solaire', FALSE),
    (6, 2, 'Les éruptions volcaniques', FALSE),
    (7, 2, 'Les activités humaines', TRUE),
    (8, 2, 'Les mouvements tectoniques', FALSE),

    -- Question 3
    (9, 3, 'Les énergies renouvelables ne sont pas assez efficaces', FALSE),
    (10, 3, 'La technologie seule peut résoudre le problème', FALSE),
    (11, 3, 'Il n''est pas nécessaire d''agir à titre individuel', FALSE),
    (12, 3, 'Toutes les réponses ci-dessus sont fausses', TRUE),

    -- Question 4
    (13, 4, 'L''étude des organismes dans leur environnement', FALSE),
    (14, 4, 'La promotion de la conservation de la nature', FALSE),
    (15, 4, 'Les deux réponses ci-dessus', TRUE),
    (16, 4, 'Aucune des réponses ci-dessus', FALSE),

    -- Question 5
    (17, 5, 'Étudier le comportement des organismes vivants', FALSE),
    (18, 5, 'Promouvoir des attitudes pro-écologiques', FALSE),
    (19, 5, 'Les deux réponses ci-dessus', TRUE),
    (20, 5, 'Aucune des réponses ci-dessus', FALSE),

    -- Question 6
    (21, 6, 'Réduire les émissions de gaz à effet de serre', TRUE),
    (22, 6, 'Augmenter la production de gaz à effet de serre', FALSE),
    (23, 6, 'Ignorer le problème', FALSE),
    (24, 6, 'Aucune des réponses ci-dessus', FALSE),

    -- Question 7
    (25, 7, 'Le changement climatique', FALSE),
    (26, 7, 'La surpopulation', FALSE),
    (27, 7, 'Les deux réponses ci-dessus', TRUE),
    (28, 7, 'Aucune des réponses ci-dessus', FALSE),

    -- Question 8
    (29, 8, 'Oui', FALSE),
    (30, 8, 'Non', FALSE),
    (31, 8, 'Cela dépend de la manière dont la croissance économique est gérée', TRUE),
    (32, 8, 'Aucune des réponses ci-dessus', FALSE),

    -- Question 9
    (33, 9, 'Les transports', FALSE),
    (34, 9, 'L''agriculture', FALSE),
    (35, 9, 'L''industrie', FALSE),
    (36, 9, 'Toutes les réponses ci-dessus', TRUE),

    -- Question 10
    (37, 10, 'L''augmentation des températures mondiales', FALSE),
    (38, 10, 'La montée du niveau de la mer', FALSE),
    (39, 10, 'Les deux réponses ci-dessus', TRUE),
    (40, 10, 'Aucune des réponses ci-dessus', FALSE);