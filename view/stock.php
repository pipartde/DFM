<?php
?>


<!doctype html>
<html lang="fr">

<?php include('include/head.php') ?>

<body>

<div class="box">

    <?php include('include/nav.php'); ?>

    <div class="stock">

        <div class="header">
            <h1 class="text-header">Gestion de stock</h1>
            <span class="text-info">Affinez votre tri afin de mieux visualiser votre stock</span>
        </div>

        <div class="searchBar">
            <div class="inlign-searchBar">
                <svg version="1.1" id="Calque_1" class="svg svg-search" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 344.5 338" style="enable-background:new 0 0 344.5 338;" xml:space="preserve">
                    <g>
                        <path d="M53.1,69.2C23.8,69.2,0,93,0,122.3s23.8,53.1,53.1,53.1s53.1-23.8,53.1-53.1S82.4,69.2,53.1,69.2z M53.1,143.3
		c-11.5,0-20.9-9.4-20.9-20.9s9.4-20.9,20.9-20.9S74,110.8,74,122.3S64.7,143.3,53.1,143.3z"/>
                        <path d="M291.3,338c-8.9,0-16.1-7.2-16.1-16.1V93.4c0-8.9,7.2-16.1,16.1-16.1c8.9,0,16.1,7.2,16.1,16.1v228.6
		C307.4,330.8,300.2,338,291.3,338z"/>
                        <path d="M172.2,188.3c-29.3,0-53.1,23.8-53.1,53.1s23.8,53.1,53.1,53.1s53.1-23.8,53.1-53.1S201.5,188.3,172.2,188.3z
		 M172.2,262.4c-11.5,0-20.9-9.4-20.9-20.9c0-11.5,9.4-20.9,20.9-20.9c11.5,0,20.9,9.4,20.9,20.9C193.2,253,183.8,262.4,172.2,262.4
		z"/>
                        <path d="M291.3,0c-29.3,0-53.1,23.8-53.1,53.1s23.8,53.1,53.1,53.1c29.3,0,53.1-23.8,53.1-53.1S320.6,0,291.3,0z
		 M291.3,74c-11.5,0-20.9-9.4-20.9-20.9s9.4-20.9,20.9-20.9c11.5,0,20.9,9.4,20.9,20.9S302.9,74,291.3,74z"/>
                        <path d="M172.2,188.3c5.6,0,11,0.9,16.1,2.5V25.8c0-8.9-7.2-16.1-16.1-16.1s-16.1,7.2-16.1,16.1v165.1
		C161.2,189.2,166.6,188.3,172.2,188.3z"/>
                        <path d="M172.2,294.6c-5.6,0-11-0.9-16.1-2.5v29.9c0,8.9,7.2,16.1,16.1,16.1s16.1-7.2,16.1-16.1v-29.9
		C183.2,293.7,177.8,294.6,172.2,294.6z"/>
                        <path d="M69.2,71.7v-46c0-8.9-7.2-16.1-16.1-16.1S37,16.9,37,25.8v46c5.1-1.6,10.5-2.5,16.1-2.5S64.1,70.1,69.2,71.7z"
                        />
                        <path d="M37,172.9v149c0,8.9,7.2,16.1,16.1,16.1s16.1-7.2,16.1-16.1v-149c-5.1,1.6-10.5,2.5-16.1,2.5
		S42.1,174.6,37,172.9z"/>
                    </g>
                </svg>
                <h2>
                    Recherche
                </h2>
            </div>

            <form action="" method="get" class="form-tri view">
                <select class="choix" id="get_value_category" name="category">
                    <option value="">Catégorie</option>
                    <option value="Catégo1">Catégorie 1</option>
                </select>
                <select class="choix" id="get_value_type" name="type">
                    <option value="">Type</option>
                    <option value="Type1">Type 1</option>
                </select>
                <select class="choix" id="get_value_marque" name="marque">
                    <option value="">Marque</option>
                    <option value="Marque1">Marque 1</option>
                </select>
                <select class="choix" id="get_value_name" name="name">
                    <option value="">Nom</option>
                    <option value="Nom1">Nom1</option>
                </select>
                <select class="choix" id="get_value_status" name="status">
                    <option value="">Statut</option>
                    <option value="///">///</option>
                </select>
                <select class="choix" id="get_value_project" name="project">
                    <option value="">Projet</option>
                    <option value="///">///</option>
                </select>
            </form>

            <div class="inline-selector">
                <span class="selected">
                    Valeur(s) choisie(s) :
                </span>
                <span class="selected" id="select_value_category">
                    <strong></strong>
                </span>
                <span class="selected" id="select_value_type">
                    <strong></strong>
                </span>
                <span class="selected" id="select_value_marque">
                    <strong></strong>
                </span>
                <span class="selected" id="select_value_name">
                    <strong></strong>
                </span>
                <span class="selected" id="select_value_status">
                    <strong></strong>
                </span>
                <span class="selected" id="select_value_project">
                    <strong></strong>
                </span>
            </div>
        </div>

        <div class="result">

            <div class="inlign-resultat">

                <div class="logo-print" onclick="callPrintCss();">
                    <a href="#">
                        <svg version="1.1" id="Capa_1" class="svg svg-print" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"
                             x="0px" y="0px"
                             viewBox="0 0 248.1 228.8" style="enable-background:new 0 0 248.1 228.8;"
                             xml:space="preserve">

                        <g>
                            <path d="M230.6,52.9h-27.8V7.5c0-4.1-3.4-7.5-7.5-7.5H52.8c-4.1,0-7.5,3.4-7.5,7.5v45.4H17.5C7.9,52.9,0,60.7,0,70.4v96.2
                    c0,9.6,7.9,17.5,17.5,17.5h27.8v37.2c0,4.1,3.4,7.5,7.5,7.5h142.5c4.1,0,7.5-3.4,7.5-7.5v-37.2h27.8c9.6,0,17.5-7.9,17.5-17.5V70.4
                    C248.1,60.7,240.2,52.9,230.6,52.9z M60.3,15h127.5v37.9H60.3V15z M187.8,213.8H60.3v-74.4h127.5V213.8z M233.1,166.6
                    c0,1.4-1.1,2.5-2.5,2.5h-27.8v-37.2c0-4.1-3.4-7.5-7.5-7.5H52.8c-4.1,0-7.5,3.4-7.5,7.5v37.2H17.5c-1.4,0-2.5-1.1-2.5-2.5V70.4
                    c0-1.4,1.1-2.5,2.5-2.5h35.3h142.5h35.3c1.4,0,2.5,1.1,2.5,2.5L233.1,166.6L233.1,166.6z"/>
                            <circle cx="195.3" cy="96.1" r="10.7"/>
                            <path d="M158.2,154.2H89.9c-4.1,0-7.5,3.4-7.5,7.5s3.4,7.5,7.5,7.5h68.2c4.1,0,7.5-3.4,7.5-7.5
                    C165.7,157.5,162.3,154.2,158.2,154.2z"/>
                            <path d="M158.2,184H89.9c-4.1,0-7.5,3.4-7.5,7.5s3.4,7.5,7.5,7.5h68.2c4.1,0,7.5-3.4,7.5-7.5S162.3,184,158.2,184z"/>
                        </g>
                     </svg>
                    </a>
                </div>

                <svg version="1.1" id="Layer_1" class="svg svg-box" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 318 299.4" style="enable-background:new 0 0 318 299.4;" xml:space="preserve">

                    <g>
                        <path class="st1" d="M318,10.8c0.1-1.3,0-2.7-0.5-4C316.1,2.7,312.3,0,308,0H90c-2.2,0-4.3,0.7-6.1,2.1l-80,61.4c-0.1,0-0.1,0.1-0.1,0.1
                        c-0.1,0.1-0.2,0.1-0.3,0.2c-0.1,0.1-0.3,0.3-0.4,0.4c-0.1,0.1-0.1,0.1-0.2,0.2c-0.2,0.2-0.3,0.3-0.5,0.5c0,0.1-0.1,0.1-0.1,0.2
                        c-0.2,0.2-0.4,0.5-0.5,0.7c0,0.1-0.1,0.1-0.1,0.2c-0.1,0.2-0.2,0.4-0.3,0.5c-0.1,0.1-0.1,0.2-0.2,0.3C1,66.9,1,67.1,0.9,67.3
                        c-0.1,0.1-0.1,0.2-0.2,0.4c-0.1,0.2-0.1,0.3-0.2,0.5c0,0.1-0.1,0.2-0.1,0.3c-0.1,0.3-0.1,0.5-0.2,0.8c0,0.1,0,0.2-0.1,0.3
                        c0,0.2-0.1,0.4-0.1,0.6c0,0.1,0,0.2,0,0.3c0,0.2,0,0.5,0,0.7c0,0,0,0.1,0,0.1v218c0,5.5,4.5,10,10,10h218c0,0,0,0,0,0
                        c0.3,0,0.6,0,0.9,0c0.1,0,0.2,0,0.3,0c0.2,0,0.4-0.1,0.6-0.1c0.1,0,0.3,0,0.4-0.1c0.2,0,0.3-0.1,0.5-0.1c0.1,0,0.3-0.1,0.4-0.1
                        c0.2-0.1,0.4-0.1,0.6-0.2c0.2-0.1,0.3-0.1,0.5-0.2c0.2-0.1,0.4-0.2,0.5-0.3c0.1-0.1,0.2-0.1,0.3-0.2c0.2-0.1,0.3-0.2,0.5-0.3
                        c0.1-0.1,0.2-0.1,0.3-0.2c0.1-0.1,0.2-0.1,0.2-0.2l80-60c2.5-1.9,4-4.9,4-8v-218C318,11.2,318,11,318,10.8z M224.6,61.4h-77
                        L199.1,20h79.4L224.6,61.4z M102,84h44v42.2l-20.9-3.4c-0.4-0.1-0.8-0.1-1.1-0.1s-0.8,0-1.1,0.1l-20.9,3.4V84z M93.4,20h73.8
                        l-51.4,41.4H39.5L93.4,20z M20,81.4h68v53.1c0,2.1,0.9,4,2.5,5.3c1.6,1.3,3.6,1.9,5.7,1.6l27.9-4.6l27.9,4.6
                        c0.4,0.1,0.8,0.1,1.1,0.1c1.6,0,3.3-0.6,4.5-1.7c1.6-1.3,2.5-3.3,2.5-5.3V81.4h58v198h-58V217c0-3-1.4-5.9-3.7-7.8
                        c-2.3-1.9-5.4-2.6-8.3-2l-27,5.6l-27-5.6c-2.9-0.6-6,0.1-8.3,2c-2.3,1.9-3.7,4.7-3.7,7.8v62.4H20V81.4z M102,279v-49.7l17,3.5
                        c1.3,0.3,2.7,0.3,4.1,0l17-3.5V279H102z M298,224.4l-60,45v-193l60-45V224.4z"/>
                        <path class="st1"
                              d="M282,88c2.8,0,5-2.2,5-5V65c0-2.8-2.2-5-5-5s-5,2.2-5,5v18C277,85.8,279.2,88,282,88z"/>
                        <path class="st1"
                              d="M282,181c2.8,0,5-2.2,5-5v-66.6c0-2.8-2.2-5-5-5s-5,2.2-5,5V176C277,178.8,279.2,181,282,181z"/>
                    </g>
                </svg>

                <h2>
                    Résultats |<span id="nbrResult" class="text-info"> </span><span class="text-info"> résultat(s) trouvé(s)</span>
                </h2>

            </div>


            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nbr</th>
                    <th>Catégorie</th>
                    <th>Type</th>
                    <th>Marque</th>
                    <th>Nom</th>
                    <th>Garantie</th>
                    <th>Statut</th>
                    <th>Cible</th>
                    <th>Projet</th>
                </tr>
                </thead>
                <tbody id="checkNumber">
                <tr class="tr">
                    <td data-label="ID">0001</td>
                    <td data-label="Nbr">100</td>
                    <td data-label="Catégorie">Ordinateur</td>
                    <td data-label="Type">Portable</td>
                    <td data-label="Marque">Fujitsu</td>
                    <td data-label="Nom">HDC70 - Celsius Pro</td>
                    <td data-label="Garantie">20-11-2020</td>
                    <td data-label="Statut">Disponible</td>
                    <td data-label="Cible">En stock</td>
                    <td data-label="Projet">Réparation</td>
                </tr>
                <tr class="tr">
                    <td data-label="ID">0001</td>
                    <td data-label="Nbr">100</td>
                    <td data-label="Catégorie">Ordinateur</td>
                    <td data-label="Type">Portable</td>
                    <td data-label="Marque">Fujitsu</td>
                    <td data-label="Nom">HDC70 - Celsius Pro</td>
                    <td data-label="Garantie">20-11-2020</td>
                    <td data-label="Statut">Disponible</td>
                    <td data-label="Cible">En stock</td>
                    <td data-label="Projet">Réparation</td>
                </tr>
                <tr class="tr">
                    <td data-label="ID">0001</td>
                    <td data-label="Nbr">100</td>
                    <td data-label="Catégorie">Ordinateur</td>
                    <td data-label="Type">Portable</td>
                    <td data-label="Marque">Fujitsu</td>
                    <td data-label="Nom">HDC70 - Celsius Pro</td>
                    <td data-label="Garantie">20-11-2020</td>
                    <td data-label="Statut">Disponible</td>
                    <td data-label="Cible">En stock</td>
                    <td data-label="Projet">Réparation</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../ressources/js/jquery.selectric.js"></script>
<script src="../ressources/js/fonctions.js"></script>

</body>
</html>