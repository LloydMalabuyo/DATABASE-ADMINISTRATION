<?php
    include 'connect.php';

    $query = "SELECT * FROM flights"; 
    $result = executeQuery($query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['flight_number']}</td>
                <td>{$row['departure']}</td>
                <td>{$row['arrival']}</td>
                <td>{$row['departure_date']}</td>
                <td>{$row['arrival_date']}</td>
                <td>{$row['duration']}</td>
                <td>{$row['airline']}</td>
                <td>{$row['aircraft']}</td>
                <td>{$row['passengers']}</td>
                <td>{$row['ticket_price']}</td>
                <td>{$row['pilot']}</td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='11'>No data available</td></tr>";
    }
?>
