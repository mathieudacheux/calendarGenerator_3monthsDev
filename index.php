<?php
    // Vérification si les variables du formulaire
    // existent bien et contiennent une valeur non vide
    if (isset($_GET['month']) && isset($_GET['year'])) {
        $month = $_GET['month'];
        $year = $_GET['year'];
        $daysArray = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    
        // Variable de jours
        $numbersOfDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $firstDayOfMonth = date('l', mktime(0, 0, 0, date($month), 1, date($year)));

        // Compteur
        $counter = 1;
        $counterDays = 1;
    } else {
        echo 'zofzjfz';
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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Calendrier Generator</title>
    <meta name="description" content="">
</head>
<body>
    <header>
        <nav>

        </nav>
    </header>


    <main class="w-full place-content-center">
        <!-- Formulaire de sélection du mois et de l'année -->
    
        <form action="./index.php" method="get">
            <!-- Input des différents mois -->
            <label for="month">Mois :</label>
            <select name="month" id="month" required>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select>
    
            <!-- Input manuel des années -->
            <label for="year">Année :</label>
            <input type="number" name="year" id="year" required>
    
            <!-- Button d'envoi -->
            <button type="submit">Envoyer</button>
        </form>
    
        <!-- Calendrier -->

        <?php
            if(isset($_GET['month']) && isset($_GET['year'])) { ?>
                <table class="table-fixed">
                    <tr>
                        <th>Lundi</th>
                        <th>Mardi</th>
                        <th>Mercredi</th>
                        <th>Jeudi</th>
                        <th>Vendredi</th>
                        <th>Samedi</th>
                        <th>Dimanche</th>
                    </tr>
                    <tr>
                        <?php
                            $i = 0;
                            for ($counter; $counter <= 7; $counter++) {
                                if ($firstDayOfMonth != $daysArray[$i]) {
                                    echo '<td>NUL</td>';
                                    $i++;
                                } else {
                                    echo '<td>'.$counterDays.'</td>';
                                    $counterDays++;
                                }
                            }
                        ?>
                    </tr>
                    <tr>
                        <?php
                            for ($counter; $counter <= 14; $counter++) {
                                echo '<td>'.$counterDays.'</td>';
                                $counterDays++;
                            };
                        ?>
                    </tr>
                    <tr>
                        <?php
                            for ($counter; $counter <= 21; $counter++) {
                                echo '<td>'.$counterDays.'</td>';
                                $counterDays++;
                            };
                        ?>
                    </tr>
                    <tr>
                        <?php
                            for ($counter; $counter <= 28; $counter++) {
                                echo '<td>'.$counterDays.'</td>';
                                $counterDays++;
                            };
                        ?>
                    </tr>
                    <tr>
                        <?php
                            for ($counter; $counter <= 35 ; $counter++) {
                                if ($counterDays <= $numbersOfDays) {
                                    echo '<td>'.$counterDays.'</td>';
                                    $counterDays++;
                                } else {
                                    echo '<td>NUL</td>';
                                }
                            };
                        ?>
                    </tr>
                    <tr>
                        <?php
                            for ($counter; $counter <= 42 ; $counter++) {
                                if ($counterDays <= $numbersOfDays) {
                                    echo '<td>'.$counterDays.'</td>';
                                    $counterDays++;
                                } else {
                                    echo '<td>NUL</td>';
                                }
                            };
                        ?>
                    </tr>
                </table>
             <?php } ?>
    </main>
</body>
</html>