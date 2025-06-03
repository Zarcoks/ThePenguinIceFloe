<?php

/** @var \NDI2023\Model\DataObject\BonnesPratiques $pratique */
echo "
    <section class='container-md mb-5 d-flex flex-column align-items-center bg-white shadow' style='padding: 2% 2% 2% 2%'>
        <h1 class='text-center'>{$pratique->getTitre()}</h1>
        <p>{$pratique->getDescription()}</p>
";
if ($pratique->getImage() != null) echo '<img style="width: 50%;" src="../assets/images/' . $pratique->getImage() . '" alt=' . $pratique->getImage() . '">';
echo "</section>";
