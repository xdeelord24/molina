<?php
// Include your database connection file here
include 'includes/db_connect.php'; // Update the path to your database connection file

// Function to execute query and return the count
function getCount($conn, $query)
{
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

$currentDate = date('Y-m-d');

// Database query to fetch the required information
$totalRecords = getCount($conn, "SELECT COUNT(*) as total FROM vaccinated_records");
$adultsCount = getCount($conn, "SELECT COUNT(*) as total FROM vaccinated_records WHERE TIMESTAMPDIFF(YEAR, dateOfBirth, '$currentDate') >= 18");
$minorsCount = getCount($conn, "SELECT COUNT(*) as total FROM vaccinated_records WHERE TIMESTAMPDIFF(YEAR, dateOfBirth, '$currentDate') < 18");
$foreignersCount = getCount($conn, "SELECT COUNT(*) as total FROM vaccinated_records WHERE nationality != 'Local'");

// Function to get count for each vaccine and dose
function getVaccineCount($conn, $doseColumn, $vaccineName)
{
    $query = "SELECT COUNT(*) as total FROM vaccinated_records WHERE $doseColumn = '$vaccineName'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

$vaccineTypes = ['Pfizer-BioNTech', 'Moderna (mRNA-1273)', 'Oxford/AstraZeneca', 'J&J', 'Sinopharm', 'Sinovac', 'COVAXIN', 'Covovax'];

// Collecting vaccine counts
$vaccineCounts = [];
foreach ($vaccineTypes as $vaccine) {
    $vaccineCounts[$vaccine] = [
        'firstDose' => getVaccineCount($conn, 'firstDose', $vaccine),
        'secondDose' => getVaccineCount($conn, 'secondDose', $vaccine),
        'firstBooster' => getVaccineCount($conn, 'firstBooster', $vaccine),
        'secondBooster' => getVaccineCount($conn, 'secondBooster', $vaccine)
    ];
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Report Page</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #444;
        }

        .summary-box {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 10px;
            display: inline-block;
            width: calc(25% - 20px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .summary-box:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .summary-box h2 {
            margin-top: 0;
            font-size: 1.5em;
        }

        #vaccinationChart {
            max-width: 100%;
            height: auto;
            margin-top: 30px;
        }

        /* Color themes for summary boxes */
        .total-records {
            background-color: lightblue;
        }

        .adults {
            background-color: lightcoral;
        }

        .minors {
            background-color: lightgoldenrodyellow;
        }

        .foreigners {
            background-color: lightgreen;
        }
    </style>
</head>

<body>
    <a href="index.php" class="btn btn-primary btn-sm">Back</a>

    <h1>Admin Report Page</h1>

    <!-- Summary Boxes -->
    <div id="summary">
        <div class="summary-box total-records">
            <h2>Total Records</h2>
            <p id="totalRecords">
                <?php echo $totalRecords; ?>
            </p>
        </div>
        <div class="summary-box adults">
            <h2>Adults</h2>
            <p id="adultsCount">
                <?php echo $adultsCount; ?>
            </p>
        </div>
        <div class="summary-box minors">
            <h2>Minors</h2>
            <p id="minorsCount">
                <?php echo $minorsCount; ?>
            </p>
        </div>
        <div class="summary-box foreigners">
            <h2>Foreigners</h2>
            <p id="foreignersCount">
                <?php echo $foreignersCount; ?>
            </p>
        </div>
    </div>

    <!-- Graph Container -->
    <canvas id="vaccinationChart" width="400" height="200"></canvas>

    <script>
        // Pass PHP variables to JavaScript
        const vaccineCounts = <?php echo json_encode($vaccineCounts); ?>;

        // Render the vaccination chart
        const ctx = document.getElementById('vaccinationChart').getContext('2d');
        const vaccinationChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['First Dose', 'Second Dose', 'First Booster', 'Second Booster'],
                datasets: Object.keys(vaccineCounts).map((vaccine) => ({
                    label: vaccine,
                    data: [
                        vaccineCounts[vaccine].firstDose,
                        vaccineCounts[vaccine].secondDose,
                        vaccineCounts[vaccine].firstBooster,
                        vaccineCounts[vaccine].secondBooster
                    ],
                    // Add appropriate backgroundColor, borderColor, etc.
                }))
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>