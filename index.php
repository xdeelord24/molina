<?php
// Include the get_record.php script to handle the search logic.
include 'get_record.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid 19 Vaccinated Records</title>
    <!-- Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Covid 19 Vaccinated Records</h2>
        <div class="row mb-2">
            <form class="form-inline w-100" method="get" action="">
                <div class="col">
                    <input class="form-control" name="searchQuery" type="search" placeholder="Search">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Province</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dynamically generated part from server-side script -->
                <?php if (!empty($searchResults)): ?>
                    <?php foreach ($searchResults as $index => $record): ?>
                        <tr>
                            <td>
                                <?php echo $index + 1; ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($record['id']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($record['firstName']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($record['lastName']); ?>
                            </td>
                            <td>
                                <?php
                                $dateOfBirth = $record['dateOfBirth'];
                                $today = new DateTime();
                                $birthdate = new DateTime($dateOfBirth);
                                $age = $today->diff($birthdate);
                                echo $age->y;
                                ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($record['province']); ?>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($record['city']); ?>
                            </td>
                            <td>
                                <a href="view.php?id=<?php echo $record['id']; ?>" class="btn btn-info btn-sm">View</a>
                                <a href="update.php?id=<?php echo $record['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="delete.php?id=<?php echo $record['id']; ?>" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7">No records found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div>
            <a href="add.php" class="btn btn-info btn-sm">Add Record</a>
            <a href="report.php" class="btn btn-primary btn-sm">Show Reports</a>
            <br /><br />
        </div>
        <!-- Pagination logic here -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>