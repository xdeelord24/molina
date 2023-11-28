<?php
// get_record.php

// Include the database connection file
include 'includes/db_connect.php';

// Initialize variables to hold search results and query
$searchResults = [];
$searchQuery = "";

// Set a default search query or leave it empty to display all records
$defaultSearchQuery = ''; // You can set a default value or leave it as an empty string.

// Check if a search query is provided, otherwise use the default
$searchQuery = isset($_GET['searchQuery']) ? $_GET['searchQuery'] : $defaultSearchQuery;

// Prepare an SQL statement to search for the record
// If the search query is empty, select all records
$sql = $searchQuery 
    ? "SELECT * FROM vaccinated_records WHERE firstName LIKE ? OR lastName LIKE ? OR city LIKE ?"
    : "SELECT * FROM vaccinated_records";

$stmt = $conn->prepare($sql);

// If there's a search query, bind the parameters
if ($searchQuery) {
    $searchParam = "%{$searchQuery}%";
    $stmt->bind_param("sss", $searchParam, $searchParam, $searchParam);
}

// Execute the statement
if ($stmt->execute()) {
    $result = $stmt->get_result();

    // Fetch all matching records
    $searchResults = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
?>
