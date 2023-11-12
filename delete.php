<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kampus";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch Mahasiswa data based on ID
    $sql = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nim = $row['nim'];
        $nama = $row['nama'];
        $jk = $row['jk'];
        $prodi = $row['prodi'];
    } else {
        // Handle error or redirect if no data is found
        echo "No Mahasiswa data found for ID: $id";
        exit;
    }

    $conn->close();
} else {
    $id = '';
    $nim = '';
    $nama = '';
    $jk = '';
    $prodi = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Mahasiswa Data</title>
</head>
<body>
    <h2>Delete Mahasiswa Data</h2>
    <div id="responseMessage"></div>
    <form id="FormDelete" action="" method="post">
        <input id="formType" type="hidden" value="DELETE">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo $nim; ?>" readonly><br>
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" readonly><br>
        
        <label for="jk">Jenis Kelamin:</label>
        <input type="text" id="jk" name="jk" value="<?php echo $jk; ?>" readonly><br>

        <label for="prodi">Program Studi:</label>
        <input type="text" id="prodi" name="prodi" value="<?php echo $prodi; ?>" readonly><br>
        
        <input type="submit" value="Delete">
    </form>

    <div id="responseMessage"></div>

    <script src="Mahasiswa.js"></script>
</body>
</html>