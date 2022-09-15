<?php
    // Fonction qui permet de créer les options dans le select Month
    function createOptionMonths($displayMonth, $displayMonthNow, $monthsArray) {
        for($counterMonth = 0; $counterMonth <= 11; $counterMonth++) {
            if (isset($_GET['month'])) {
                if ($displayMonth != $monthsArray[$counterMonth]) {
                    echo '<option>'.$monthsArray[$counterMonth].'</option>';
                } else {
                    echo '<option selected>'.$displayMonth.'</option>';
                }
            } else {
                if ($displayMonthNow != $monthsArray[$counterMonth]) {
                    echo '<option>'.$monthsArray[$counterMonth].'</option>';
                } else {
                    echo '<option selected>'.$displayMonthNow.'</option>';
                }
            }
        }
    }

    // Fonction qui permet de créer les options dans le select Year
    function createOptionYears($year, $yearNow) {
        for($counterYear = 2034; $counterYear >= 1970; $counterYear--) {
            if (isset($_GET['year'])) {
                if ($year != $counterYear) {
                    echo '<option>'.$counterYear.'</option>';
                } else {
                    echo '<option selected>'.$year.'</option>';
                }
            } else {
                if ($yearNow != $counterYear) {
                    echo '<option>'.$counterYear.'</option>';
                } else {
                    echo '<option selected>'.$yearNow.'</option>';
                }
            }
        }
    }

    // Fonction qui créer le tableau
    function createTableFromInput($counter, $counterDays, $numbersOfDays, $firstDayOfMonth, $counterFuturMonths, $displayMonth, $year, $counterDaysBeforeMonths) {
            echo '<table>
                    <caption>Calendrier de '.$displayMonth.' '.$year.'</caption>
                    <tr>
                        <th><p class="title">Lun.</p></th>
                        <th><p class="title">Mar.</p></th>
                        <th><p class="title">Mer.</p></th>
                        <th><p class="title">Jeu.</p></th>
                        <th><p class="title">Ven.</p></th>
                        <th><p class="title">Sam.</p></th>
                        <th><p class="title">Dim.</p></th>
                    </tr>';
            echo '<tr>';
            $counterDaysBeforeMonths = $counterDaysBeforeMonths - $firstDayOfMonth + 2;
            while ($firstDayOfMonth != $counter) {
                echo '<td class="emptyTD">
                        <p class="emptyParagraph">'.$counterDaysBeforeMonths.'</p>
                     </td>';
                $counter++;
                $counterDaysBeforeMonths++;
            }
            for ($counter; $counter <= 42; $counter++) {
                if ($counter < 7) {
                    echo '<td>
                            <p>'.$counterDays.'</p>
                        </td>';
                    $counterDays++;
                } else if ($counter == 7) {
                    echo '<td>
                            <p>'.$counterDays.'</p>
                        </td>
                        </tr>';
                    $counterDays++;
                } else if ($counter < 14) {
                    echo '<td>
                            <p>'.$counterDays.'</p>
                        </td>';
                    $counterDays++;
                } else if ($counter == 14) {
                    echo '<td>
                            <p>'.$counterDays.'</p>
                        </td>
                        </tr>';
                    $counterDays++;
                } else if ($counter < 21) {
                    echo '<td>
                            <p>'.$counterDays.'</p>
                        </td>';
                    $counterDays++;
                } else if ($counter == 21) {
                    echo '<td>
                            <p>'.$counterDays.'</p>
                        </td>
                        </tr>';
                    $counterDays++;
                } else if ($counter < 28) {
                    echo '<td>
                            <p>'.$counterDays.'</p>
                        </td>';
                    $counterDays++;
                } else if ($counter == 28) {
                    echo '<td>
                            <p>'.$counterDays.'</p>
                        </td>
                        </tr>';
                    $counterDays++;
                } else if ($counter < 35) {
                    if ($counterDays <= $numbersOfDays) {
                        echo '<td>
                                <p>'.$counterDays.'</p>
                            </td>';
                        $counterDays++;
                    } else {
                        echo '<td class="emptyTD">
                                <p class="emptyParagraph">'.$counterFuturMonths.'</p>
                            </td>
                            </td>';
                        $counterFuturMonths ++;
                    }
                } else if ($counter == 35) {
                    if ($counterDays <= $numbersOfDays) {
                        echo '<td>
                                <p>'.$counterDays.'</p>
                            </td></tr>';
                        $counterDays++;
                    } else {
                        echo '<td class="emptyTD">
                                <p class="emptyParagraph">'.$counterFuturMonths.'</p>
                            </td>
                            </tr>';
                        $counterFuturMonths ++;
                    }
                } else if ($counter < 42) {
                    if ($counterDays <= $numbersOfDays) {
                        echo '<td>
                                <p>'.$counterDays.'</p>
                            </td>';
                        $counterDays++;
                    } else {
                        echo '<td class="emptyTD">
                                <p class="emptyParagraph">'.$counterFuturMonths.'</p>
                            </td>
                            </td>';
                        $counterFuturMonths ++;
                    }
                } else if ($counter == 42) {
                    if ($counterDays <= $numbersOfDays) {
                        echo '<td>
                                <p>'.$counterDays.'</p>
                            </td></tr>';
                        $counterDays++;
                    } else {
                        echo '<td class="emptyTD">
                                <p class="emptyParagraph">'.$counterFuturMonths.'</p>
                            </td>
                            </tr>';
                        $counterFuturMonths ++;
                    }
                }
            }
            echo '</table>';
        }
?>