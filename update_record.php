<?php
// Include database connection
include 'includes/db_connect.php';
$id = '';
$firstName = $lastName = $mobileNumber = $homeAddress = $province = "";
$city = $dateOfBirth = $gender = $nationality = $firstDose = $secondDose = $firstBooster = $secondBooster = "";

// Check if the 'id' GET parameter is set
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record's current data from the database
    $stmt = $conn->prepare("SELECT * FROM vaccinated_records WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $firstName = $row['firstName'];
        $lastName = $row['lastName'];
        $mobileNumber = $row['mobileNumber'];
        $homeAddress = $row['homeAddress'];
        $province = $row['province'];
        $city = $row['city'];
        $dateOfBirth = $row['dateOfBirth'];
        $gender = $row['gender'];
        $nationality = $row['nationality'];
        $firstDose = $row['firstDose'];
        $secondDose = $row['secondDose'];
        $firstBooster = $row['firstBooster'];
        $secondBooster = $row['secondBooster'];
        // Assign other fields as necessary
    } else {
        echo "Record not found.";
        exit;
        // Handle the error or redirect
    }
    $stmt->close();
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // Get the ID from POST data

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
    // other fields as necessary

    // Prepare an SQL statement to update the record
    // $stmt = $conn->prepare("UPDATE vaccinated_records SET firstName = ?, lastName = ? WHERE id = ?");
    // $stmt->bind_param("ssi", $firstName, $lastName, $id);

    $updateQuery = "UPDATE vaccinated_records SET firstName = ?, lastName = ?, mobileNumber = ?, homeAddress = ?, province = ?, city = ?, dateOfBirth = ?, gender = ?, nationality = ?, firstDose = ?, secondDose = ?, firstBooster = ?, secondBooster = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);

    // Bind parameters to the SQL statement
    $stmt->bind_param("sssssssssssssi", $firstName, $lastName, $mobileNumber, $homeAddress, $province, $city, $dateOfBirth, $gender, $nationality, $firstDose, $secondDose, $firstBooster, $secondBooster, $id);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo 'Record updated successfully
        <div>
            <a href="index.php" class="btn btn-info btn-sm">Home</a>
            <br /><br />
        </div>';
        // Redirect or inform the user of success
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>