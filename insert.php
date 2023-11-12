<?php
include 'config.php';

// Get data from the form
$nim = $_POST["nim"];
$nama = $_POST["nama"];
$jk = $_POST["jk"];
$prodi = $_POST["prodi"];

// Prepare and execute the SQL query
$sql = "INSERT INTO mahasiswa (nim, nama, jk, prodi) VALUES ('$nim', '$nama', '$jk', '$prodi')";

if ($conn->query($sql) === TRUE) {
    $response = ["status" => "success", "message" => "Data inserted successfully"];
} else {
    $response = ["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error];
}

// Close the database connection
$conn->close();

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>