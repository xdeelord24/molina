<?php
// db.php should contain your database connection logic
include 'includes/db_connect.php';

// Initialize variables to hold form data
$firstName = $lastName = $mobileNumber = $homeAddress = $province = "";
$city = $dateOfBirth = $gender = $nationality = $firstDose = $secondDose = $firstBooster = $secondBooster = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assign form data to variables
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $mobileNumber = $_POST['mobileNumber'];
    $homeAddress = $_POST['homeAddress'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $firstDose = $_POST['firstDose'];
    $secondDose = $_POST['secondDose'];
    $firstBooster = $_POST['firstBooster'];
    $secondBooster = $_POST['secondBooster'];

    // Prepare an SQL statement to insert the new record
    $stmt = $conn->prepare("INSERT INTO vaccinated_records (firstName, lastName, mobileNumber, homeAddress, province, city, dateOfBirth, gender, nationality, firstDose, secondDose, firstBooster, secondBooster) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the SQL statement
    $stmt->bind_param("sssssssssssss", $firstName, $lastName, $mobileNumber, $homeAddress, $province, $city, $dateOfBirth, $gender, $nationality, $firstDose, $secondDose, $firstBooster, $secondBooster);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo 'New record created successfully
        <div>
            <a href="index.php" class="btn btn-info btn-sm">Home</a>
            <br /><br />
        </div>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>