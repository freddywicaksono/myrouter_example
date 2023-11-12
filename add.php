<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Mahasiswa Data</title>
</head>
<body>
    <h2>Insert Mahasiswa Data</h2>
    <div id="responseMessage"></div>
    <form id="FormAdd" action="insert" method="post">
        <input id="formType" type="hidden" value="ADD">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br>
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>
        
        <label for="jk">Jenis Kelamin:</label>
        <select id="jk" name="jk" required>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select><br>

        <label for="prodi">Prodi:</label>
        <select id="prodi" name="prodi" required>
            <option value="TIF">Teknik Informatika</option>
            <option value="IND">Teknik Industri</option>
            <option value="PET">Peternakan</option>
        </select><br>
        
        <button id="submitButton">Submit</button>

        
    </form>

    
</body>
</html>