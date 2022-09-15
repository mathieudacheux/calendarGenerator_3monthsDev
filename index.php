<?php
    // Vérification si les variables du formulaire existent
    if (isset($_GET['month']) && isset($_GET['year'])) {
        // Récupération des variables $_GET du formulaire
        $month = $_GET['month'];
        $year = $_GET['year'];
        $date = new DateTime("$year-$month-1");
    
        // Récupération du nombres de jours et le premier jours calendaire du mois
        $numbersOfDays = $date->format('t');
        $firstDayOfMonth = $date->format('N');

        // Compteurs
        $counter = 1;
        $counterDays = 1;
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
    <meta name="description" content="">
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
        </section>
    
        <section id="calendar">

        <!-- Création de Calendar si les GET sont effectuées -->

        <?php
            if(isset($_GET['month']) && isset($_GET['year'])) { ?>
                <table>
                    <tr>
                        <th><p class="title">Lun.</p></th>
                        <th><p class="title">Mar.</p></th>
                        <th><p class="title">Mer.</p></th>
                        <th><p class="title">Jeu.</p></th>
                        <th><p class="title">Ven.</p></th>
                        <th><p class="title">Sam.</p></th>
                        <th><p class="title">Dim.</p></th>
                    </tr>
                    <tr>
                    <?php
                        while ($firstDayOfMonth != $counter) {
                            echo '<td class="emptyTD"></td>';
                            $counter++ ;
                        }
                        for ($counter; $counter <= 7; $counter++) {
                            echo '<td><p>'.$counterDays.'</p></td>';
                            $counterDays++;
                        }
                    ?>
                    </tr>
                    <tr>
                    <?php
                        for ($counter; $counter <= 14; $counter++) {
                            echo '<td><p>'.$counterDays.'</p></td>';
                            $counterDays++;
                        };
                    ?>
                    </tr>
                    <tr>
                    <?php
                        for ($counter; $counter <= 21; $counter++) {
                            echo '<td><p>'.$counterDays.'</p></td>';
                            $counterDays++;
                        };
                    ?>
                    </tr>
                    <tr>
                    <?php
                        for ($counter; $counter <= 28; $counter++) {
                            echo '<td><p>'.$counterDays.'</p></td>';
                            $counterDays++;
                        };
                    ?>
                    </tr>
                    <tr>
                    <?php
                        for ($counter; $counter <= 35 ; $counter++) {
                            if ($counterDays <= $numbersOfDays) {
                                echo '<td><p>'.$counterDays.'</p></td>';
                                $counterDays++;
                            } else {
                                echo '<td class="emptyTD"></td>';
                            }
                        };
                    ?>
                    </tr>
                    <tr>
                    <?php
                        for ($counter; $counter <= 42; $counter++) {
                            if ($counterDays <= $numbersOfDays) {
                                echo '<td><p>'.$counterDays.'</p></td>';
                                $counterDays++;
                            } else {
                                echo '<td class="emptyTD"></td>';
                            }
                        };
                    ?>
                    </tr>
                </table>
            <?php } ?>
        </section>
    <script src="https://kit.fontawesome.com/d067b7d25c.js" crossorigin="anonymous"></script>
    </main>
</body>
</html>