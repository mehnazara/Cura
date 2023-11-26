@extends('layout')

@section('title','Nurse Schedule')
@section('content')
<div class="container">
    <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>PHP Calendar</title>
            <style>

                body {
                    background-color: black;
                    color: white;
                    font-family: Arial, sans-serif;
                }
                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-top: 20px;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: center;
                }

                th {
                    background-color: darkgreen;
                }
                td {
                    background-color: black;
                }

                form {
                    margin-top: 20px;
                }

                input[type="date"],
                input[type="text"],
                input[type="submit"] {
                    padding: 10px;
                    margin-bottom: 10px;
                }

                input[type="submit"] {
                    background-color: lightgreen;
                    color: black;
                    cursor: pointer;
                }
            </style>
        </head>
        <body>
            <?php
                // get the name of the month
                function getMonthName($month) {
                    $months = [
                        1 => 'January', 2 => 'February', 3 => 'March',
                        4 => 'April', 5 => 'May', 6 => 'June',
                        7 => 'July', 8 => 'August', 9 => 'September',
                        10 => 'October', 11 => 'November', 12 => 'December'
                    ];
                    return $months[$month];
                }

                // Get the current month and year
                $currentMonth = date('n');
                $currentYear = date('Y');

                // Get the first day of the month and the total number of days
                $firstDay = strtotime("1-$currentMonth-$currentYear");
                $totalDays = date('t', $firstDay);
                $monthName = getMonthName($currentMonth);

                // Get the day of the week for the first day
                $dayOfWeek = date('N', $firstDay);

                // Create the calendar table
                echo "<h2>$monthName $currentYear</h2>";
                echo "<table>";
                echo "<tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>";

                // Display the days of the month
                echo "<tr>";
                for ($i = 1; $i < $dayOfWeek; $i++) {
                    echo "<td></td>";
                }

                for ($day = 1; $day <= $totalDays; $day++) {
                    echo "<td>$day</td>";

                    if ($dayOfWeek == 7) {
                        echo "</tr><tr>";
                        $dayOfWeek = 0;
                    }

                    $dayOfWeek++;
                }

                echo "</tr>";
                echo "</table>";
            ?>

            <!-- Event Form -->
            <form action="" method="post">
                <label for="eventDate">Event Date:</label>
                <input type="date" name="eventDate" required>
                
                <label for="eventName">Event Name:</label>
                <input type="text" name="eventName" required>

                <input type="submit" value="Add Event">
            </form>

            <?php
                // Process the form data
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $eventDate = $_POST['eventDate'];
                    $eventName = $_POST['eventName'];

                    echo "<p>Event added: $eventName on $eventDate</p>";
                }
            ?>
        </body>
        </html>
</div>
@endsection

