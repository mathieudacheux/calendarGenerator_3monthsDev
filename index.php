<?php
    // Récupération des fonctions créées dans functions.php
    include './public/php/functions.php';

    // Récupération de la date d'aujourd'hui
    $dateNow = new DateTime();
    $yearNow = $dateNow->format('Y');
    $monthNow = $dateNow->format('n');
    $numbersOfDays = $dateNow->format('t');
    $firstDayOfMonth = $dateNow->format('N');
    $monthBefore = $monthNow - 1;
    $numbersOfDaysBefore = cal_days_in_month(CAL_GREGORIAN, $monthBefore, $yearNow);
    
    // Tableau de comparaison
    $monthsArray = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    $displayMonthNow = $monthsArray[$monthNow - 1];

    // Compteurs
    $counter = 1;  
    $counterDays = 1;
    $counterFuturMonths = 1;

    // Vérification si les variables du formulaire existent
    if (isset($_GET['month']) && isset($_GET['year'])) {
        // Récupération des variables $_GET du formulaire
        $month = array_search($_GET['month'], $monthsArray) + 1;
        $year = $_GET['year'];
        $date = new DateTime("$year-$month-1");

        // Tableau de comparaison
        $displayMonth = $monthsArray[$month - 1];
    
        // Récupération du nombres de jours et le premier jours calendaire du mois
        $numbersOfDays = $date->format('t');
        $firstDayOfMonth = $date->format('N');

        // Affichage des jours précédants le mois
        if ($month >= 2) {
            $monthBefore = $month - 1;
            $dateBefore = new DateTime("$year-$monthBefore-1");
            $dateBeforeNumbersOfDays = $dateBefore->format('t');
        } else if ($month == 1) {
            $monthBefore = 12;
            $yearBefore = $year - 1;
            $dateBefore = new DateTime("$yearBefore-$monthBefore-1");
            $dateBeforeNumbersOfDays = $dateBefore->format('t');
        }

        $counterDaysBeforeMonths = $dateBeforeNumbersOfDays;
    };
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/assets/icons/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./public/css/style.css">
    <script src="./public/js/script.js"></script>
    <title>Le calendrier</title>
</head>
<body>
    <header>
        <nav>
            <h1>Le calendrier</h1>
        </nav>
    </header>


    <main>
        <section id="form">

        <!-- Création du formulaire -->

            <form action="./index.php" method="get">

                <!-- Input des mois -->

                <label for="month">Mois :</label>
                <select name="month" id="month" required>
                    <?php
                        createOptionMonths($displayMonth, $displayMonthNow, $monthsArray);
                    ?>
                </select>
        
                <!-- Input des années -->

                <label for="year">Année :</label>
                <select name="year" id="year" required>
                    <?php
                        createOptionYears($year, $yearNow);
                    ?>
                </select>
        
                <!-- Button d'envoi -->

                <button type="submit">Envoyer</button>
            </form>
        </section>
    
        <section id="calendar">
        <!-- Création de Calendar si les GET sont effectuées -->

        <?php
            if (isset($_GET['month']) && isset($_GET['year'])) {
                createTableFromInput($counter, $counterDays, $numbersOfDays, $firstDayOfMonth, $counterFuturMonths, $displayMonth, $year, $counterDaysBeforeMonths);
            } else {
                createTableFromInput($counter, $counterDays, $numbersOfDays, $firstDayOfMonth, $counterFuturMonths, $displayMonthNow, $yearNow, $numbersOfDaysBefore);
            };
        ?>
        </section>
    <script src="https://kit.fontawesome.com/d067b7d25c.js" crossorigin="anonymous"></script>
    </main>
</body>
</html>