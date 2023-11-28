<?php
// Include database connection
include 'includes/db_connect.php';

// Check if the 'id' GET parameter is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare a delete statement
    $stmt = $conn->prepare("DELETE FROM vaccinated_records WHERE id = ?");
    
    // Bind the 'id' parameter
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the home page or display a success message
        header("Location: index.php");
        exit();
    } else {
        // Handle errors, perhaps log them and display an error message
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to home page or display an error message if 'id' parameter is not set
    echo "Invalid request. No record specified for deletion.";
}
?>
