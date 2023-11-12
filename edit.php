<?php
include('config.php');

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mahasiswa Data</title>
</head>
<body>
    <h2>Update Mahasiswa Data</h2>
    <div id="responseMessage"></div>
    <form id="FormEdit" action="/jsdemo/mahasiswa/update" method="post">
        <input id="formType" type="hidden" value="EDIT">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?php echo $nim; ?>" required><br>
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required><br>
        
        <label for="jk">Jenis Kelamin:</label>
        <select id="jk" name="jk" required>
            <option value="L" <?php echo ($jk == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
            <option value="P" <?php echo ($jk == 'P') ? 'selected' : ''; ?>>Perempuan</option>
        </select><br>

        <label for="prodi">Program Studi:</label>
        <input type="text" id="prodi" name="prodi" value="<?php echo $prodi; ?>" required><br>
        
        <input type="submit" value="Update">
    </form>

    

    
</body>
</html>