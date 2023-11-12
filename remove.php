<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kampus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$jk = $_POST["jk"];
$prodi = $_POST["prodi"];

$sql = "DELETE FROM mahasiswa WHERE nim='$nim'";

if ($conn->query($sql) === TRUE) {
    $response = ["status" => "success", "message" => "Data deleted successfully"];
} else {
    $response = ["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error];
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
